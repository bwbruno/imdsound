<?php

namespace IMDSound\Controllers\MusicGenre;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoMusicGenreRepository;

class MusicGenreListController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $repository;
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->repository = new PdoMusicGenreRepository($this->pdo);
    }
   
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('music-genre/list-music-genre.php', [
            'music_genres' => $this->repository->allMusicGenre(),
            'title' => 'Gêneros Musicais'
        ]);
    }
}
