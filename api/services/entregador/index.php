<?php
$loader = require '../../vendor/autoload.php';

$app = new \Slim\Slim();

$app->post('/listarTodos/', function () use ($app) {
    echo (new \controllers\Entregador($app))->listarTodos();
});

$app->run();
