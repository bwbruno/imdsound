<?php

namespace IMDSound\Controllers\Albums;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoAlbumRepository;

class AlbumItemController extends ControllerComHtml implements InterfaceControladorRequisicao
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

        $inputs = [
            'id' => FILTER_SANITIZE_NUMBER_INT,
        ];

        $filteredInputs = filter_input_array(INPUT_GET, $inputs);

        $album = $this->repository->findById($filteredInputs['id']);

        echo $this->renderizaHtml('albums/album.php', [
            'album' => $album,
        ]);
    }
}
