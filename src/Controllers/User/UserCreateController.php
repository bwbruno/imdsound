<?php

namespace IMDSound\Controllers\Home;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoUserRepository;
use IMDSound\Models\User;

class UserCreate extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $userRepository;

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->userRepository = new PdoUserRepository($pdo);
    }

   
    public function processaRequisicao(): void
    {
        

        $email = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );


        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        $user = new User($id, $name);


        if (!is_null($id) && $id !== false) {
            $user->setId($id);
            $this->entityManager->merge($user);
            $_SESSION['mensagem'] = 'Curso atualizado com sucesso';
        } else {
            $this->entityManager->persist($user);
            $_SESSION['mensagem'] = 'Curso inserido com sucesso';
        }
        $_SESSION['tipo_mensagem'] = 'success';

        $this->entityManager->flush();

        header('Location: /', true, 302);
    }
}
