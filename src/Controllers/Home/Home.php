<?php

namespace IMDSound\Controllers\Home;

use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoUserRepository;
use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;

class Home extends ControllerComHtml implements InterfaceControladorRequisicao
{

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
    }

   
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('/home/home.php', [
            'titulo' => 'Lista de Ano'
        ]);
    }
}
