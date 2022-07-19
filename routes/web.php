<?php

/*
    Todas as rotas
*/

use IMDSound\Controllers\Artist\ArtistListController;
use IMDSound\Controllers\Artist\ArtistPromotionController;
use IMDSound\Controllers\Features\ListFeaturesController;
use IMDSound\Controllers\Home\HomeController;
use IMDSound\Controllers\MusicGenre\MusicGenreCreateController;
use IMDSound\Controllers\User\UserCreateController;
use IMDSound\Controllers\User\UserListController;
use IMDSound\Controllers\MusicGenre\MusicGenreListController;

return [
    '/' => HomeController::class,
    '/home' => HomeController::class,
    '/features/list' => ListFeaturesController::class,
    '/user/create' => UserCreateController::class,
    '/users' => UserListController::class,
    '/artists' => ArtistListController::class,
    '/artist/promotion' => ArtistPromotionController::class,
    '/music_genre/list' => MusicGenreListController::class,
    '/music_genre/create' => MusicGenreCreateController::class,


];