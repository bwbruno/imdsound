<?php

namespace IMDSound\Controllers\Home;

use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoUserRepository;
use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;

class HomeController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->userRepository = new PdoUserRepository($pdo);

    }

   
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('home/home.php', [
            'titulo' => 'Lista de Ano',
            'usuarios' => $this->userRepository->allUsers()
        ]);
    }
}
