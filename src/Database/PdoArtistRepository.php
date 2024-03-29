<?php

namespace IMDSound\Database;

use IMDSound\Models\Artist;
use IMDSound\Models\User;
use IMDSound\Repository\UserRepository;
use PDO;

class PdoArtistRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function allArtists(): array
    {
        $sqlQuery = 'SELECT * FROM artist;';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateListArtist($stmt);
    }

    public function save(Artist $artist): bool {
        $oldArtist = $this->findByEmail($artist->user_email());

        if($oldArtist->user_email() == null) {
            return $this->insert($artist);
        }

        return $this->update($artist);
    }

    public function insert(Artist $artist): bool
    {
        $insertQuery =
            'INSERT INTO artist (user_email, name, description, admin_id_admin) ' .
            'VALUES (:user_email, :name, :description, :admin_id_admin);';

        $stmt = $this->connection->prepare($insertQuery);

        $success = $stmt->execute([
            ':user_email' => $artist->user_email(),
            ':name' => $artist->name(),
            ':description' => $artist->description(),
            ':admin_id_admin' => $artist->admin_id_admin(),
        ]);

        return $success;
    }

    public function update(Artist $artist): bool
    {
        $updateQuery = 'UPDATE artist SET name = :name, description = :description WHERE user_email = :user_email;';
        $stmt = $this->connection->prepare($updateQuery);
        $stmt->bindValue(':name', $artist->name());
        $stmt->bindValue(':description', $artist->description());
        $stmt->bindValue(':user_email', $artist->user_email(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function remove(Artist $artist): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM users WHERE id = ?;');
        $stmt->bindValue(1, $artist->email(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function findByEmail(string $email): Artist
    {
        $stmt = $this->connection->prepare("SELECT * FROM artist WHERE user_email = ? LIMIT 1");
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        return $this->hydrateArtist($row);
    }

    public function hydrateArtist($data) : Artist
    {
        return new Artist(
            $data['user_email'],
            $data['name'],
            $data['description'],
            $data['admin_id_admin']
        );
    }

    private function hydrateListArtist(\PDOStatement $stmt): array
    {
        $dataList = $stmt->fetchAll();
        $list = [];

        foreach ($dataList as $data) {
            $list[] = $this->hydrateArtist($data);
        }

        return $list;
    }

}
