<?php

namespace IMDSound\Models;

class Music_genre
{
    private $name;
    
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function name()
    {
        return $this->name;
    }

}
