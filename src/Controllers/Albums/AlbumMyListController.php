<?php

namespace IMDSound\Controllers\Albums;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Infra\ConnectionCreator;
use IMDSound\Infra\PdoAlbumRepository;

class AlbumMyListController extends ControllerComHtml implements InterfaceControladorRequisicao
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

        if(isset($_SESSION["artista"])) {
            echo $this->renderizaHtml('albums/my-albums.php', [
                'albums' => $this->repository->all(),
                'title' => 'Meus álbuns'
            ]);
        }

        $_SESSION['tipo_mensagem'] = 'danger';
        $_SESSION['mensagem'] = "Você não tem permissão para acessar my-albums";

        header('Location: /home');
    }
}
