<?php
$loader = require '../../vendor/autoload.php';

$app = new \Slim\Slim();

$app->post('/salvar/', function () use ($app) {
    echo (new \controllers\Usuario($app))->salvar();
});

$app->post('/excluirconta/', function () use ($app) {
    (new \controllers\Fornecedor($app))->excluirConta();
    (new \controllers\Entregador($app))->excluirConta();
    (new \controllers\Pessoa($app))->excluirConta();
    (new \controllers\Usuario($app))->excluirConta();
    echo true;
});

$app->run();
