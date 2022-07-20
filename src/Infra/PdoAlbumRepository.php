<?php

namespace IMDSound\Infra;

use IMDSound\Models\Album;
use PDO;

class PdoAlbumRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function save(Album $album): bool
    {
        //TODO

        return true;
    }

    public function insert(Album $album): int
    {

        $insertQuery =
            'INSERT INTO list (name, picture) ' .
            'VALUES (:name, :picture);';
        $stmt = $this->connection->prepare($insertQuery);
        $success = $stmt->execute([
            ':name' => $album->getName(),
            ':picture' => $album->getPicture(),
        ]);

        $id = $this->connection->lastInsertId();

        $insertQuery =
            'INSERT INTO album (list_id_list) ' .
            'VALUES (:id);';
        $stmt = $this->connection->prepare($insertQuery);
        $success = $stmt->execute([
            ':id' => $id,
        ]);

        $insertQuery =
            'INSERT INTO artist_cadastra_album (artist_user_email, album_list_id_list) ' .
            'VALUES (:artist_user_email, :album_list_id_list);';
        $stmt = $this->connection->prepare($insertQuery);
        $stmt->bindValue(':artist_user_email', $_SESSION["email"], PDO::PARAM_STR);
        $stmt->bindValue(':album_list_id_list', $id, PDO::PARAM_INT);
        $success = $stmt->execute();

        return $success;
    }

    private function update(Album $album): bool
    {
        //TODO

        return true;
    }

    public function remove(Album $album): bool
    {
        //TODO

        return true;
    }

    public function hydrateAlbum($albumData) : Album
    {
        $album = new Album();
        $album->fillWithRow($albumData);

        return $album;
    }

    private function hydrateAlbumList(\PDOStatement $stmt): array
    {
        $albumDataList = $stmt->fetchAll();
        $list = [];

        foreach ($albumDataList as $albumData) {
            $list[] = $this->hydrateAlbum($albumData);
        }

        return $list;
    }

    public function all(): array
    {
        $sqlQuery = 'SELECT * FROM artist_cadastra_album aca
            JOIN album a ON aca.album_list_id_list = a.list_id_list 
            JOIN list l ON a.list_id_list = l.id_list ';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateAlbumList($stmt);
    }

    public function findByArtist($artist_email): array
    {
        $sqlQuery = '
            SELECT * FROM artist_cadastra_album aca
            JOIN album a ON aca.album_list_id_list = a.list_id_list 
            JOIN list l ON a.list_id_list = l.id_list 
            WHERE artist_user_email = :artist_email;';
        $stmt = $this->connection->query($sqlQuery);
        $stmt->bindValue(':artist_email', $artist_email);

        return $this->hydrateAlbumList($stmt);
    }
}
