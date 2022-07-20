<?php

namespace IMDSound\Controllers\Albums;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoAlbumRepository;

class AlbumListController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $repository;
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->repository = new PdoAlbumRepository($this->pdo);
    }

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('albums/list-albums.php', [
            'albums' => $this->repository->all(),
            'title' => 'Todos os álbuns'
        ]);
    }
}
