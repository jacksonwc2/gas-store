<?php
$loader = require '../../vendor/autoload.php';
$app = new \Slim\Slim();

$app->get('/r1/', function () use ($app) {
    echo (new \controllers\Relatorio($app))->r1();
});

$app->get('/r2/', function () use ($app) {
    echo (new \controllers\Relatorio($app))->r2();
});

$app->get('/r3/', function () use ($app) {
    echo (new \controllers\Relatorio($app))->r3();
});

$app->get('/r4/', function () use ($app) {
    echo (new \controllers\Relatorio($app))->r4();
});

$app->run();




