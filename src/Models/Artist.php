<?php

namespace IMDSound\Models;

class Artist
{
    private $user_email;
    private $name;
    private $description;
    private $admin_id_admin;

    public function __construct(?string $user_email, string $name, string $description, string $admin_id_admin)
    {
        $this->user_email = $user_email;
        $this->name = $name;
        $this->description = $description;
        $this->admin_id_admin = $admin_id_admin;
    }

    public function defineId(string $user_email): void
    {
        if (!is_null($this->user_email)) {
            throw new \DomainException('Você só pode definir o EMAIL uma vez');
        }

        $this->user_email = $user_email;
    }

    public function email(): ?string
    {
        return $this->user_email;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }
}