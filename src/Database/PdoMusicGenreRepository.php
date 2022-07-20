<?php

namespace IMDSound\Database;

use IMDSound\Models\MusicGenre;
use PDO;

class PdoMusicGenreRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function allMusicGenre(): array
    {
        $sqlQuery = 'SELECT * FROM music_genre;';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateMusicGenreList($stmt);
    }

    private function hydrateMusicGenreList(\PDOStatement $stmt): array
    {
        $music_genreDataList = $stmt->fetchAll();
        $music_genreList = [];

        foreach ($music_genreDataList as $music_genreData) {
            $music_genreList[] = $this->hydrateMusicGenre($music_genreData);
        }

        return $music_genreList;
    }


    public function insert(MusicGenre $music_genre): bool
    {
        $insertQuery =
            'INSERT INTO music_genre (name) ' .
            'VALUES (:name);';

        $stmt = $this->connection->prepare($insertQuery);
        
        $success = $stmt->execute([
            ':name' => $music_genre->name(),
        ]);

        return $success;
    }

    public function update(MusicGenre $oldMusic_genre, MusicGenre $newMusic_genre): bool
    {
        $insertQuery =
            'UPDATE music_genre SET name=:newName WHERE name=:oldName';

        $stmt = $this->connection->prepare($insertQuery);
        
        $success = $stmt->execute([
            ':newName' => $newMusic_genre->name(),
            ':oldName' => $oldMusic_genre->name(),
        ]);

        return $success;
    }

    public function remove(MusicGenre $music_genre): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM music_genre WHERE name = ?;');
        $stmt->bindValue(1, $music_genre->name(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function hydrateMusicGenre($music_genreData) : MusicGenre
    {
        return new MusicGenre(
            $music_genreData['name']
        );
    }

    public function findByName(string $name): ?MusicGenre
    {

        $stmt = $this->connection->prepare('SELECT * FROM music_genre WHERE name = ?');
        $stmt->bindParam(1, $name);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row) {
            return new MusicGenre(
                $row['name']
            );
        }

        return null;
    }
}