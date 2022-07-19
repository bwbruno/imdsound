<?php

namespace IMDSound\Models;

class MusicGenre
{
    private $name;
    
    public function __construct($n)
    {
        $this->name = $n;
    }

    public function name()
    {
        return $this->name;
    }

}
