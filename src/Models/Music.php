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

    public function __construct(int $idmusic,
                                string $name, 
                                int $duration_time,
                                int $num_likes,
                                string $lyrics;
                                date $date_create;)
    {
        $this->idmusic = $idmusic;
        $this->name = $name;
        $this->duration_time = $duration_time;
        $this->num_likes = $num_likes;
        $this->lyrics; = $lyrics;
        $this->date_create = $date_create;
    }


    public function idmusic(): int
    {
        return $this->id;
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
        return $this->date_create;
    }
}
