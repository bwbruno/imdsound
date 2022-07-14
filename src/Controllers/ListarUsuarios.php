<?php

namespace IMDSound\Controllers;

use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoUserRepository;

class ListarUsuarios extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $repositorioDeUsuarios;

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->repositorioDeUsuarios = new PdoUserRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('users/listar-usuarios.php', [
            'usuarios' => $this->repositorioDeUsuarios->allUsers(),
            'titulo' => 'Lista de Ano',
            'titulo2' => 'Lista de2',
        ]);
    }
}
