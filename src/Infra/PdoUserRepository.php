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
        $sqlQuery = 'SELECT * FROM user;';
        $stmt = $this->connection->query($sqlQuery);

        return $this->hydrateUserList($stmt);
    }

    private function hydrateUserList(\PDOStatement $stmt): array
    {
        $userDataList = $stmt->fetchAll();
        $userList = [];

        foreach ($userDataList as $userData) {
            $userList[] = new User(
                $userData['email'],
                $userData['password'],
                $userData['name'],
                $userData['country'],
                $userData['phone_number']
            );
        }

        return $userList;
    }

    public function save(User $user): bool
    {
           
        return $this->insert($user);
        //return $this->update($user);
    }

    private function insert(User $user): bool
    {

        $insertQuery = 'INSERT INTO user (email, password, name, country, phone_number) VALUES (:email, :password, :name, :country, :phone_number);';

        $stmt = $this->connection->prepare($insertQuery);
        


        $success = $stmt->execute([
            ':email' => $user->email(),
            ':password' => $user->password(),
            ':name' => $user->name(),
            ':country' => $user->country(),
            ':phone_number' => $user->phone_number(),
        ]);

        if ($success) {
           $user->defineEmail($this->connection->lastInsertId());
        }

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

}
