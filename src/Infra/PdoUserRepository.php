<?php

namespace IMDSound\Infra;

use IMDSound\Models\User;
use IMDSound\Repository\UserRepository;
use PDO;

class PdoUserRepository implements UserRepository
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function allUsers(): array
    {
        $sqlQuery = 'SELECT * FROM users;';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateUserList($stmt);
    }

    private function hydrateUserList(\PDOStatement $stmt): array
    {
        $userDataList = $stmt->fetchAll();
        $userList = [];

        foreach ($userDataList as $userData) {
            $userList[] = new User(
                $userData['id'],
                $userData['name']
            );
        }

        return $userList;
    }

    public function save(User $user): bool
    {
        if ($user->id() === null) {
            return $this->insert($user);
        }

        return $this->update($user);
    }

    private function insert(User $user): bool
    {
        $insertQuery = 'INSERT INTO users (name) VALUES (:name);';
        $stmt = $this->connection->prepare($insertQuery);

        $success = $stmt->execute([
            ':name' => $user->name(),
        ]);

        if ($success) {
            $user->defineId($this->connection->lastInsertId());
        }

        return $success;
    }

    private function update(User $user): bool
    {
        $updateQuery = 'UPDATE users SET name = :name WHERE id = :id;';
        $stmt = $this->connection->prepare($updateQuery);
        $stmt->bindValue(':name', $user->name());
        $stmt->bindValue(':id', $user->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function remove(User $user): bool
    {
        $stmt = $this->connection->prepare('DELETE FROM users WHERE id = ?;');
        $stmt->bindValue(1, $user->id(), PDO::PARAM_INT);

        return $stmt->execute();
    }

}
