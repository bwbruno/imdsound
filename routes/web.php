<?php

/*
    Todas as rotas
*/

use IMDSound\Controllers\Artist\ArtistListController;
use IMDSound\Controllers\Artist\ArtistPromotionController;
use IMDSound\Controllers\Features\ListFeaturesController;
use IMDSound\Controllers\Home\HomeController;
use IMDSound\Controllers\User\UserCreateController;
use IMDSound\Controllers\User\UserListController;
use IMDSound\Controllers\MusicGenre\MusicGenreListController;
use IMDSound\Controllers\MusicGenre\MusicGenreCreateController;
use IMDSound\Controllers\MusicGenre\MusicGenreDeleteController;
use IMDSound\Controllers\MusicGenre\MusicGenreUpdateController;
use IMDSound\Controllers\Features\FeaturesListController;
use IMDSound\Controllers\TypeSubs\TypeSubsController;

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
    '/music_genre/remove' => MusicGenreDeleteController::class,
    '/music_genre/update' => MusicGenreUpdateController::class,
    '/features/list' => FeaturesListController::class,
    '/typeSubs' => TypeSubsController::class,
];