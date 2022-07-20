<?php

namespace IMDSound\Controllers\MusicGenre;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoMusicGenreRepository;
use IMDSound\Models\MusicGenre;

class MusicGenreUpdateController extends ControllerComHtml implements InterfaceControladorRequisicao
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
            'oldGenero' => FILTER_SANITIZE_STRING,
            'newGenero' => FILTER_SANITIZE_STRING,
        ];

        $filteredInputs = filter_input_array(INPUT_POST, $inputs);

        $newMusicGenre = new MusicGenre(
            $filteredInputs['newGenero']
        );

        $oldMusicGenre = new MusicGenre(
            $filteredInputs['oldGenero']
        );

        $this->pdo->beginTransaction();
        try {
            $this->repository->update($oldMusicGenre, $newMusicGenre);
            $this->pdo->commit();
        } catch(\PDOException $e) {
            echo $e->getMessage();
            $this->pdo->rollBack();
        }

        header('Location: /music_genre/list', true, 302);
    }
}