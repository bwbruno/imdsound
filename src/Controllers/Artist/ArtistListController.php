<?php

namespace IMDSound\Controllers\Artist;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoArtistRepository;
use IMDSound\Database\PdoUserRepository;
use IMDSound\Models\User;

class ArtistListController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $repository;
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->repository = new PdoArtistRepository($this->pdo);
    }

    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('artists/artists.php', [
            'artists' => $this->repository->allArtists(),
            'title' => 'Artistas'
        ]);
    }
}
