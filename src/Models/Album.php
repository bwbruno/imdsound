<?php

namespace IMDSound\Models;

class Album extends ImdList
{
    private \DateTimeInterface $dataCadastro;

    public function __construct(int $idList, string $name, int $numLikes,
                                int $durationTime, ?string $picture,
                                \DateTimeInterface $dataCadastro)
    {
        parent::__construct($idList, $name, $numLikes, $durationTime, $picture);
        $this->dataCadastro = $dataCadastro;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

}