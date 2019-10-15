<?php
$loader = require '../../vendor/autoload.php';
$app = new \Slim\Slim();


$app->post('/login/', function () use ($app) {
    require '../../models/UsuarioLogado.php';
    $usuario = (new \controllers\Autenticacao($app))->login();
    $ret = false;

    if ($usuario) {

        $codUsuario = $usuario->id;
        $tipoAcesso = $usuario->fl_tipoacesso;

        $ret = new UsuarioLogado();
        $ret->setUsuario($usuario);
        $ret->setPessoa((new \controllers\Pessoa($app))->adquirirPorUsuario($codUsuario));

        if ($tipoAcesso != 'A') {
            $codPessoa = $ret->getPessoa()->id;
            $ret->setEndereco((new \controllers\Endereco($app))->adquirirPorPessoa($codPessoa));

            if ($tipoAcesso == 'F') {
                $ret->setFornecedor((new \controllers\Fornecedor($app))->adquirirPorUsuario($codUsuario));
            }
            if ($tipoAcesso == 'E') {
                $ret->setEntregador((new \controllers\Entregador($app))->adquirirPorUsuario($codUsuario));
            }
        }
    }

    echo json_encode($ret);
});

$app->run();
