<?php

namespace IMDSound\Models;

class User
{

    private $email;
    private $password;
    private $name;
    private $country;
    private $phone_number;
    private ?Artist $artist;
    private ?Playlist $playlists;

    public function __construct($email, $password, $name, $country, $phone_number)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->country = $country;
        $this->phone_number = $phone_number;
    }

    public function defineEmail(string $email): void
    {
        if (!is_null($this->email)) {
            throw new \DomainException('Voce so pode definir o email uma vez');
        }

        $this->email = $email;
    }

    public function email()
    {
        return $this->email;
    }

    public function name()
    {
        return $this->name;
    }

    public function password()
    {
        return $this->password;
    }

    public function country()
    {
        return $this->country;
    }

    public function phone_number()
    {
        return $this->phone_number;
    }

    public function setArtist(Artist $a)
    {
        return $this->artist = $a;
    }

    public function isArtist()
    {
        return isset($this->artist);
    }

    public function validatePassword(string $password)
    {
        return password_verify($password, $this->password);
    }

}
