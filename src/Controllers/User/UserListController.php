<?php

namespace IMDSound\Controllers\User;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoUserRepository;
use IMDSound\Models\User;

class UserListController extends ControllerComHtml implements InterfaceControladorRequisicao
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
        echo $this->renderizaHtml('users/list-users.php', [
            'usuarios' => $this->userRepository->usersWithArtist(),
            'title' => 'Usuários'
        ]);
    }
}
