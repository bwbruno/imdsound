<?php

namespace IMDSound\Models;

class TypeSubs
{
    private $type_name;
    private $description;
    private $value;

    public function __construct(string $type_name, string $description, float $value)
    {
        $this->type_name = $type_name;
        $this->description = $description;
        $this->value = $value;
    }  

    public function type_name(): string
    {
        return $this->type_name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function value(): float
    {
        return $this->value;
    }

}
