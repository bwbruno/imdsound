<?php

namespace IMDSound\Controllers\Features;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoFeaturesRepository;

class FeaturesListController extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $featuresRepository;

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->featuresRepository = new PdoFeaturesRepository($pdo);
    }

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('feature/featList.php', [
            'featsList' => $this->featuresRepository->allFeatures(),
            'titulo' => 'Lista de Ano',
            'titulo2' => 'Lista de2',
        ]);
    }
}