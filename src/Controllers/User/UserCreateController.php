<?php

namespace IMDSound\Controllers\User;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoUserRepository;
use IMDSound\Models\User;

class UserCreateController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $userRepository;
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->userRepository = new PdoUserRepository($this->pdo);
    }

   
    public function processaRequisicao(): void
    {

        error_reporting(E_ALL);
        ini_set('display_errors', '1');
        
        $inputs = [
            'email' => FILTER_SANITIZE_EMAIL,
            'password' => FILTER_SANITIZE_STRING,
            'name' => FILTER_SANITIZE_STRING,
            'country'=> FILTER_SANITIZE_STRING,
            'phone_number'=> FILTER_SANITIZE_STRING
        ];

        $filteredInputs = filter_input_array(INPUT_POST, $inputs);
        $sha1Password = sha1($filteredInputs['password'] . 'teste');        
        $user = new User(
            $filteredInputs['email'], 
            $filteredInputs['password'],
            $filteredInputs['name'], 
            $filteredInputs['country'], 
            $filteredInputs['phone_number']
        );
              

        $this->pdo->beginTransaction();
        try {
            $this->userRepository->save($user);
            $this->pdo->commit();
        } catch(\PDOException $e) {
            echo $e->getMessage();
            $this->pdo->rollBack();
        }

        exit();

        header('Location: /', true, 302);
    }
}
