<?php

namespace IMDSound\Controllers\TypeSubs;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoTypeSubsRepository;
use IMDSound\Models\TypeSubs;

class TypeSubsController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $typeSubsRepository;
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->typeSubsRepository = new PdoTypeSubsRepository($this->pdo);
    }

   
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('typeSubs/typeSubs.php', [
            'typeSubs' => $this->typeSubsRepository->allTypes(),
            'title' => 'Tipos de subscriptions'
        ]);
    }
}
