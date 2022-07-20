<?php

/*
    Todas as rotas
*/

use IMDSound\Controllers\Albums\AlbumListController;
use IMDSound\Controllers\Albums\AlbumMyListController;
use IMDSound\Controllers\Albums\AlbumCreateController;
use IMDSound\Controllers\Artist\ArtistListController;
use IMDSound\Controllers\Artist\ArtistPromotionController;
use IMDSound\Controllers\Features\ListFeaturesController;
use IMDSound\Controllers\Home\HomeController;
use IMDSound\Controllers\Login\LoginController;
use IMDSound\Controllers\Login\LogoutController;
use IMDSound\Controllers\MusicGenre\MusicGenreCreateController;
use IMDSound\Controllers\User\UserCreateController;
use IMDSound\Controllers\User\UserListController;
use IMDSound\Controllers\MusicGenre\MusicGenreListController;
use IMDSound\Controllers\MusicGenre\MusicGenreCreateController;
use IMDSound\Controllers\MusicGenre\MusicGenreDeleteController;
use IMDSound\Controllers\MusicGenre\MusicGenreUpdateController;
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
    '/typeSubs' => TypeSubsController::class,
    '/albums' => AlbumListController::class,
    '/my-albums' => AlbumMyListController::class,
    '/album/create' => AlbumCreateController::class,
    '/login' => LoginController::class,
    '/logout' => LogoutController::class
];