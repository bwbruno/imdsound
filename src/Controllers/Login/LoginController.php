<?php

namespace IMDSound\Controllers\Login;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoArtistRepository;
use IMDSound\Infra\PdoUserRepository;

class LoginController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $userRepository;
    private $artistRepository;
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->userRepository = new PdoUserRepository($this->pdo);
        $this->artistRepository = new PdoArtistRepository($this->pdo);
    }
   
    public function processaRequisicao(): void
    {
        $inputs = [
            'email' => FILTER_SANITIZE_EMAIL,
            'password' => FILTER_SANITIZE_STRING,
        ];

        $filteredInputs = filter_input_array(INPUT_POST, $inputs);
        $password = $filteredInputs['password'] . $_ENV['SALT'];

        $user = $this->userRepository->findByEmail($filteredInputs['email']);
        $artist = $this->artistRepository->findByEmail($filteredInputs['email']);

        if (is_null($user) || !$user->validatePassword($password)) {
            $_SESSION['tipo_mensagem'] = 'danger';
            $_SESSION['mensagem'] = "E-mail ou senha inválidos";
            header('Location: /home');
            return;
        }

        $_SESSION['login'] = true;
        $_SESSION['email'] = $user->email();
        $_SESSION['name'] = $user->name();

        if (is_null($artist->user_email())) {
            header('Location: /home');
            return;
        }

        $_SESSION['artista'] = true;

        header('Location: /home');
    }
}
