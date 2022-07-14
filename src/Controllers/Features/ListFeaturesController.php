<?php

namespace IMDSound\Controllers\Features;

use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoUserRepository;

class ListFeaturesController extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $featuresRepository;

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->featuresRepository = new PdoUserRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('users/listar-usuarios.php', [
            'usuarios' => $this->featuresRepository->allUsers(),
            'titulo' => 'Lista de Ano',
            'titulo2' => 'Lista de2',
        ]);
    }
}