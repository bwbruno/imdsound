<?php

namespace IMDSound\Controllers\Music_genre;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoMusicGenreRepository;
use IMDSound\Models\Music_genre;

class ListMusicGenreController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $music_genreRepository;
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->music_genreRepository = new PdoMusicGenreRepository($this->pdo);
    }

   
    public function processaRequisicao(): void
    {
        echo $this->renderizaHtml('music_genre/music_genre.php', [
            'music_genres' => $this->music_genreRepository->allMusic_genre(),
            'title' => 'Genero de Musica'
        ]);
    }
}
