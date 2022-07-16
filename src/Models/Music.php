<?php

namespace IMDSound\Models;

class Music
{
    private $idmusic;
    private $name;
    private $duration_time;
    private $num_likes;
    private $lyrics;
    private $data_create;

    public function __construct($idmusic, $name, $duration_time, $num_likes, $lyrics, $data_create)
    {
        $this->idmusic = $idmusic;
        $this->name = $name;
        $this->duration_time = $duration_time;
        $this->num_likes = $num_likes;
        $this->lyrics = $lyrics;
        $this->data_create = $data_create;
    }

    public function idmusic(): int
    {
        return $this->idmusic;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function duration_time(): int
    {
        return $this->duration_time;
    }

    public function num_likes(): int
    {
        return $this->num_likes;
    }

    public function lyrics(): int
    {
        return $this->lyrics;
    }

    public function date_create(): int
    {
        return $this->data_create;
    }
}
