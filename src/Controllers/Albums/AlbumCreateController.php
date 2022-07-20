<?php

namespace IMDSound\Controllers\Albums;

use IMDSound\Controllers\ControllerComHtml;
use IMDSound\Controllers\InterfaceControladorRequisicao;
use IMDSound\Database\ConnectionCreator;
use IMDSound\Database\PdoAlbumRepository;
use IMDSound\Database\PdoArtistRepository;
use IMDSound\Database\PdoMusicGenreRepository;
use IMDSound\Models\Album;
use IMDSound\Models\MusicGenre;

class AlbumCreateController extends ControllerComHtml implements InterfaceControladorRequisicao
{

    private $artistRepository;
    private $albumRepository;
    private $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionCreator::createConnection();
        $this->albumRepository = new PdoAlbumRepository($this->pdo);
        $this->artistRepository = new PdoArtistRepository($this->pdo);
    }

    public function processaRequisicao(): void
    {

        $inputs = [
            'name' => FILTER_SANITIZE_STRING,
        ];

        $filteredInputs = filter_input_array(INPUT_POST, $inputs);

        $album = new Album();
        $album->setName($filteredInputs['name']);
        $album->setPicture($this->uploadCapa());

        $this->pdo->beginTransaction();
        try {
            $this->albumRepository->insert($album);
            $this->pdo->commit();
        } catch(\PDOException $e) {
            echo $e->getMessage();
            $this->pdo->rollBack();
        }

        header('Location: /my-albums', true, 302);
    }

    /* FROM https://www.w3schools.com/php/php_file_upload.asp */
    private function uploadCapa() {
        $target_dir = "/var/www/public/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $uploadOk = 1;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            // echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            return null;
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                return $_FILES["image"]["name"];
            } else {
                return null;
            }
        }
    }
}
