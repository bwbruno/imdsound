<?php

namespace IMDSound\Infra;

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

    private function update(User $user): bool
    {
        $updateQuery = 'UPDATE users SET name = :name WHERE id = :id;';
        $stmt = $this->connection->prepare($updateQuery);
        $stmt->bindValue(':name', $user->name());
        $stmt->bindValue(':id', $user->email(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function remove(User $user): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM users WHERE id = ?;');
        $stmt->bindValue(1, $user->email(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function findByEmail(string $email): Artist
    {
        $sqlQuery = 'SELECT * FROM artist WHERE email = ?;';
        $stmt = $this->connection->query($sqlQuery);
        $stmt->bindValue(1, $email);
        $data = $stmt->fetch();

        return $this->hydrateArtist($data);;
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
