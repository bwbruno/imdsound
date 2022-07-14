<?php

/*
    Todas as rotas
*/

use IMDSound\Controllers\ListarUsuarios;
use IMDSound\Controllers\Features\ListFeaturesController;
use IMDSound\Controllers\Home\Home;

return [
    '/home' => Home::class,
    '/listar-usuarios' => ListarUsuarios::class,
    '/features/list' => ListFeaturesController::class,
];