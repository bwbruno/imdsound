<?php

namespace IMDSound\Repository;

use IMDSound\Models\Music_genre;

interface Music_genreRepository
{
    public function allMusic_genre(): array;
    public function findByName(string $name): Music_genre;
    public function save(Music_genre $name): bool;
    public function remove(Music_genre $name): bool;
}
