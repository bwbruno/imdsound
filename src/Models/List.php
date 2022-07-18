<?php

namespace IMDSound\Models;

class List
{
    private $id_list;
    private $name;
    private $num_likes;
    private $duration_time;
    private $picture;

    public function __construct(int $id_list, string $name, int $num_likes, int $duration_time, string $picture;)
    {
        $this->idlist = $idlist;
        $this->name = $name;
        $this->num_likes = $num_likes;
        $this->duration_time = $duration_time;
        $this->picture = $picture;
    }  


    public function id_list(): int
    {
        return $this->id_list;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function num_likes(): int
    {
        return $this->num_likes;
    }

    public function duration_time(): int
    {
        return $this->duration_time;
    }
    
    public function picture(): string
    {
        return $this->picture;
    }

    

}
