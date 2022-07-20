<?php

namespace IMDSound\Models;

class Album extends ImdList
{
    private \DateTimeInterface $dataCadastro;

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function fillWithRow(array $row)
    {
        parent::fillListWithRow($row);
        $this->dataCadastro =  new \DateTimeImmutable($row['data_cadastro']);
    }



}