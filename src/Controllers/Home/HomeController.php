<?php

namespace IMDSound\Controllers\Home;

use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoAlbumRepository;
use IMDSound\Database\PdoUserRepository;
use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;

class HomeController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    public function __construct()
    {
        $pdo = ConnectionCreator::createConnection();
        $this->albumsRepository = new PdoAlbumRepository($pdo);

    }

   
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('home/home.php', [
            'albums_chunked' => array_chunk($this->albumsRepository->all(), 5)
        ]);
    }
}
