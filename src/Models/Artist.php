<?php

namespace IMDSound\Models;

use IMDSound\Models\Album;

class Artist implements \JsonSerializable
{
    private $user_email;
    private $name = 'sem nome';
    private $description = 'sem descricao';
    private $admin_id_admin;
    private array $albums;

    public function __construct($user_email, $admin_id_admin)
    {
        $this->user_email = $user_email;
        $this->admin_id_admin = $admin_id_admin;
    }

    public function defineId(string $user_email): void
    {
        if (!is_null($this->user_email)) {
            throw new \DomainException('Você só pode definir o EMAIL uma vez');
        }

        $this->user_email = $user_email;
    }

    public function user_email(): ?string
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

    public function admin_id_admin()
    {
        return $this->admin_id_admin;
    }

    /**
     * @return Album|null
     */
    public function getAlbums(): ?Album
    {
        return $this->albums;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function jsonSerialize()
    {
        return [
            'user_email' => $this->user_email,
            'name' => $this->name,
            'description' => $this->description,
            'admin_id_admin' => $this->admin_id_admin,
        ];
    }

    /**
     * @param \IMDSound\Models\Album $album
     */
    public function addAlbum(Album $album): void
    {
        $this->albums[] = $album;
    }
}