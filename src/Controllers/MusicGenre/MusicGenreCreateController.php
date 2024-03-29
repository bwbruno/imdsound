<?php

namespace IMDSound\Controllers\MusicGenre;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoMusicGenreRepository;
use IMDSound\Models\MusicGenre;

class MusicGenreCreateController extends ControllerComHtml implements InterfaceControladorRequisicao
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

        $inputs = [
            'genero' => FILTER_SANITIZE_STRING,
        ];

        $filteredInputs = filter_input_array(INPUT_POST, $inputs);

        $musicGenre = new MusicGenre(
            $filteredInputs['genero']
        );

        $this->pdo->beginTransaction();
        try {
            $this->repository->insert($musicGenre);
            $this->pdo->commit();
        } catch(\PDOException $e) {
            echo $e->getMessage();
            $this->pdo->rollBack();
        }

        header('Location: /music_genre/list', true, 302);
    }
}
