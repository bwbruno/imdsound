<?php

namespace IMDSound\Infra;

use IMDSound\Models\Music_genre;
use IMDSound\Repository\Music_genreRepository;
use PDO;

class PdoMusicGenreRepository implements Music_genreRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function allMusic_genre(): array
    {
        $sqlQuery = 'SELECT * FROM music_genre;';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateMusic_genreList($stmt);
    }

    private function hydrateMusic_genreList(\PDOStatement $stmt): array
    {
        $music_genreDataList = $stmt->fetchAll();
        $music_genreList = [];

        foreach ($music_genreDataList as $music_genreData) {
            $music_genreList[] = $this->hydrateMusic_genre($music_genreData);
        }

        return $music_genreList;
    }

    public function save(Music_genre $music_genre): bool
    {
           
        return $this->insert($music_genre);
        //return $this->update($user);
    }

    private function insert(Music_genre $music_genre): bool
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

    public function remove(Music_genre $music_genre): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM music_genre WHERE name = ?;');
        $stmt->bindValue(1, $music_genre->name(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function hydrateMusic_genre($music_genreData) : Music_genre
    {
        return new Music_genre(
            $music_genreData['name']
        );
    }

    public function findByName(string $name): Music_genre{
        //TODO IMPLEMENT
        return new Music_genre(
            'nome'
        );
    }
}