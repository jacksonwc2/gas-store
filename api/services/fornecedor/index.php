<?php
$loader = require '../../vendor/autoload.php';

$app = new \Slim\Slim();

$app->post('/salvar/', function () use ($app) {
    echo (new \controllers\Fornecedor($app))->salvar();
});

$app->run();
