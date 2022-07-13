<?php

namespace IMDSound\Models;

class User
{
    private $id;
    private $name;

    public function __construct(?int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function defineId(int $id): void
    {
        if (!is_null($this->id)) {
            throw new \DomainException('Você só pode definir o ID uma vez');
        }

        $this->id = $id;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
