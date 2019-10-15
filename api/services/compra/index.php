<?php
$loader = require '../../vendor/autoload.php';
$app = new \Slim\Slim();
$app->post('/realizarCompra/', function () use ($app) {
    echo (new \controllers\Compra($app))->realizarCompra();
});

$app->run();
