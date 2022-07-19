<?php

namespace IMDSound\Models;

class Feature
{
    private $feat_name;
    private $description;

    public function __construct(string $feat_name, string $description)
    {
        $this->feat_name = $feat_name;
        $this->description = $description;
    }  

    public function feat_name(): string
    {
        return $this->feat_name;
    }

    public function descriptiom(): string
    {
        return $this->description;
    }


    public function defineFeatName(string $feat_name): void
    {
        if (!is_null($this->feat_name)) {
            throw new \DomainException('Você só pode definir o FeatName uma vez');
        }

        $this->feat_name = $feat_name;
    }
}
