<?php

namespace IMDSound\Database;

use IMDSound\Models\Artist;
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
            $userList[] = $this->hydrateUser($userData);
        }

        return $userList;
    }

    public function save(User $user): bool
    {
           
        return $this->insert($user);
        //return $this->update($user);
    }

    public function insert(User $user): bool
    {

        $insertQuery =
            'INSERT INTO user (email, password, name, country, phone_number) ' .
            'VALUES (:email, :password, :name, :country, :phone_number);';

        $stmt = $this->connection->prepare($insertQuery);
        
        $success = $stmt->execute([
            ':email' => $user->email(),
            ':password' => $user->password(),
            ':name' => $user->name(),
            ':country' => $user->country(),
            ':phone_number' => $user->phone_number(),
        ]);

        return $success;
    }

    private function update(User $user): bool
    {
        $updateQuery = 'UPDATE user SET name = :name WHERE id = :id;';
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

    public function findByEmail(string $email): User
    {
        $stmt = $this->connection->prepare("SELECT * FROM user WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        return $this->hydrateUser($row);;
    }

    public function hydrateUser($userData) : User
    {
        return new User(
            $userData['email'],
            $userData['password'],
            $userData['name'],
            $userData['country'],
            $userData['phone_number']
        );
    }

    public function usersWithArtist(): array
    {
        $sqlQuery = 'SELECT u.*, a.admin_id_admin FROM user u LEFT JOIN artist a ON a.user_email = u.email;';
        $stmt = $this->connection->query($sqlQuery);
        $result = $stmt->fetchAll();
        $userWithArtistList = [];

        foreach ($result as $row) {
            $user = $this->hydrateUser($row);
            if(isset($row['admin_id_admin'])) {
                $artist = new Artist($row['email'], null, null, $row['admin_id_admin']);
                $user->setArtist($artist);
            }
            $userWithArtistList[] = $user;
        }

        return $userWithArtistList;
    }
}
