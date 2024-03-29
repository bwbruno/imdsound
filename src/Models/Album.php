<?php

namespace IMDSound\Models;

class Album extends ImdList
{
    private \DateTimeInterface $dataCadastro;
    private ?Artist $artist;
    private array $musics = [];

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function fillWithRow(array $row)
    {
        parent::fillListWithRow($row);
        $this->dataCadastro =  new \DateTimeImmutable($row['data_cadastro']);
    }

    /**
     * @return Artist|null
     */
    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    /**
     * @param Artist|null $artist
     */
    public function setArtist(?Artist $artist): void
    {
        $this->artist = $artist;
    }

    /**
     * @return array
     */
    public function getMusics(): array
    {
        return $this->musics;
    }

    /**
     * @param Music|null $music
     */
    public function addMusic(Music $music): void
    {
        $this->musics = $music;
    }


}