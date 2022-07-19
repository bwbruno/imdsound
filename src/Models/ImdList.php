<?php

namespace IMDSound\Models;

class ImdList
{

    private int $idList;
    private string $name;
    private int $numLikes;
    private int $durationTime;
    private ?string $picture;
    private array $genres = [];

    /**
     * @param int $idList
     * @param string $name
     * @param int $numLikes
     * @param int $durationTime
     * @param string $picture
     */
    public function __construct(int $idList, string $name, int $numLikes, int $durationTime, ?string $picture)
    {
        $this->idList = $idList;
        $this->name = $name;
        $this->numLikes = $numLikes;
        $this->durationTime = $durationTime;
        $this->picture = $picture;
    }

    public function getId()
    {
        return $this->idList;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getNumLikes()
    {
        return $this->numLikes;
    }

    public function setNumLikes(): void
    {
        $this->numLikes++;
    }

    public function getDurationTime()
    {
        return $this->durationTime;
    }

    public function setDurationTime($durationTime): void
    {
        $this->durationTime = $durationTime;
    }


    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture): void
    {
        $this->picture = $picture;
    }

    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param MusicGenre $genres
     */
    public function addGenre(MusicGenre $genre): void
    {
        $this->genres[] = $genre;
    }

}