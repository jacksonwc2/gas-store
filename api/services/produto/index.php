<?php
$loader = require '../../vendor/autoload.php';

$app = new \Slim\Slim();

$app->post('/salvar/', function () use ($app) {
    echo (new \controllers\Produto($app))->salvar();
});

$app->get('/listarTodos/', function () use ($app) {
    echo (new \controllers\Produto($app))->listarTodos();
});

$app->get('/listarProdutos/', function () use ($app) {
    require '../../models/RetornoProdutos.php';
    $ret = new RetornoProdutos();
    $ret->setAgua((new \controllers\Produto($app))->listarAgua());
    $ret->setGas((new \controllers\Produto($app))->listarGas());
    echo json_encode($ret);
});

$app->run();
