<?php

namespace IMDSound\Controllers\User;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoUserRepository;
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

        $inputs = [
            'email' => FILTER_SANITIZE_EMAIL,
            'password' => FILTER_SANITIZE_STRING,
            'name' => FILTER_SANITIZE_STRING,
            'country'=> FILTER_SANITIZE_STRING,
            'phone_number'=> FILTER_SANITIZE_STRING
        ];

        $filteredInputs = filter_input_array(INPUT_POST, $inputs);
        $securePassword = password_hash($filteredInputs['password'] . $_ENV['SALT'], PASSWORD_DEFAULT);

        $user = new User(
            $filteredInputs['email'],
            $securePassword,
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

        header('Location: /users', true, 302);
    }
}
