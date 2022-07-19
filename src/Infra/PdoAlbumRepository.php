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

    public function insert(Album $album): bool
    {

        //TODO

        return true;
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
        return new Album(
            $albumData['id_list'],
            $albumData['name'],
            $albumData['num_likes'],
            $albumData['duration_time'],
            $albumData['picture'],
            new \DateTimeImmutable($albumData['data_cadastro'])
        );
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
