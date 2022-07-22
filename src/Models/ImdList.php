<?php

namespace IMDSound\Models;

class ImdList
{

    private ?int $idList;
    private ?string $name;
    private ?int $numLikes;
    private ?int $durationTime;
    private ?string $picture;
    private ?array $genres = [];



    public function getId()
    {
        return $this->idList;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getNumLikes()
    {
        return $this->numLikes;
    }

    public function setNumLikes()
    {
        $this->numLikes++;
        return $this;
    }

    public function getDurationTime()
    {
        return $this->durationTime;
    }

    public function setDurationTime($durationTime)
    {
        $this->durationTime = $durationTime;
        return $this;
    }


    public function getPicture()
    {
        return  $this->picture;
    }

    public function getPictureURL()
    {
        if (isset($this->picture)) {
            return "uploads/" . $this->picture;
        }

        return "uploads/semimagem.png";

    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param MusicGenre $genres
     */
    public function addGenre(MusicGenre $genre)
    {
        $this->genres[] = $genre;
    }

    protected function fillListWithRow(array $row)
    {
        $this->idList = $row['id_list'];
        $this->name = $row['name'];
        $this->numLikes = $row['num_likes'];
        $this->durationTime = $row['duration_time'];
        $this->picture = $row['picture'];
    }

}