<?php

/*
    Todas as rotas
*/

use IMDSound\Controllers\Features\ListFeaturesController;
use IMDSound\Controllers\Home\HomeController;
use IMDSound\Controllers\User\UserCreateController;
use IMDSound\Controllers\User\UserListController;
use IMDSound\Controllers\ListarUsuarios;

return [
    '/' => HomeController::class,
    '/home' => HomeController::class,
    '/listar-usuarios' => ListarUsuarios::class,
    '/features/list' => ListFeaturesController::class,
    '/user/create' => UserCreateController::class,
    '/users' => UserListController::class,
];