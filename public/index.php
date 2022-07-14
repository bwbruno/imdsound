<?php

require __DIR__ . '/../vendor/autoload.php';

use IMDSound\Controllers\InterfaceControladorRequisicao;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$caminho = $_SERVER['REQUEST_URI'];
$rotas = require __DIR__ . '/../routes/web.php';

if (!array_key_exists($caminho, $rotas)) {
    echo 
    //http_response_code(404);
    exit();
}


$classeControladora = $rotas[$caminho];

echo $rotas;
echo $caminho;
echo $classeControladora;

/** @var InterfaceControladorRequisicao $controlador */
$controlador = new $classeControladora();
$controlador->processaRequisicao();
