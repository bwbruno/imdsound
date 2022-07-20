<?php

namespace IMDSound\Controllers\Artist;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoArtistRepository;
use IMDSound\Database\PdoUserRepository;
use IMDSound\Models\Artist;

class ArtistPromotionController extends ControllerComHtml implements InterfaceControladorRequisicao
{
    private $repository;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->repository = new PdoArtistRepository($this->pdo);
    }

    public function processaRequisicao(): void
    {

        $inputs = [
            'email' => FILTER_SANITIZE_EMAIL,
        ];

        $filteredInputs = filter_input_array(INPUT_POST, $inputs);

        $artist = new Artist(
            $filteredInputs['email'],
            1
        );

        $this->pdo->beginTransaction();
        try {
            $this->repository->insert($artist);
            $this->pdo->commit();
        } catch(\PDOException $e) {
            echo $e->getMessage();
            $this->pdo->rollBack();
        }

        header('Content-Type: application/json', true, 200);
        echo json_encode($artist);
    }
}