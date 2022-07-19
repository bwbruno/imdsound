<?php

namespace IMDSound\Repository;

use IMDSound\Models\User;

interface UserRepository
{
    public function allUsers(): array;
    public function findByEmail(string $email): User;
    public function save(User $User): bool;
    public function remove(User $User): bool;
}
