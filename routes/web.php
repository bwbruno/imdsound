<?php

/*
    Todas as rotas
*/

use IMDSound\Controllers\Features\ListFeaturesController;
use IMDSound\Controllers\Home\Home;
use IMDSound\Controllers\User\UserCreateController;
use IMDSound\Controllers\ListarUsuarios;

return [
    '/' => Home::class,
    '/home' => Home::class,
    '/listar-usuarios' => ListarUsuarios::class,
    '/features/list' => ListFeaturesController::class,
    '/user' => UserController::class,
    '/user/create' => UserCreateController::class,
];