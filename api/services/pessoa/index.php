<?php
$loader = require '../../vendor/autoload.php';
$app = new \Slim\Slim();

$app->post('/salvar/', function () use ($app) {
    require '../../models/UsuarioLogado.php';
    $ret = false;
    $dados = json_decode($app->request->getBody());
    $usuarioCadastrado = (new \controllers\Autenticacao($app))->usuarioCadastrado($dados->usuario->login);

    if (!$usuarioCadastrado) {

        $ret = new UsuarioLogado();
        $ret->setUsuario((new \controllers\Usuario($app))->salvar($dados->usuario));
        $ret->setPessoa((new \controllers\Pessoa($app))->salvar($ret->getUsuario()->id));

        $ret->setEndereco((new \controllers\Endereco($app))->salvar($ret->getPessoa()->id));
        $tipoAcesso = $dados->usuario->tipoAcesso;

        if ($tipoAcesso == 'F') {
            $ret->setFornecedor((new \controllers\Fornecedor($app))->salvar($ret->getUsuario()->id));
        }
        if ($tipoAcesso == 'E') {
            $ret->setEntregador((new \controllers\Entregador($app))->salvar($ret->getUsuario()->id, $ret->getPessoa()->id));
        }
    }

    echo json_encode($ret);
});

$app->post('/editar/', function () use ($app) {
    require '../../models/UsuarioLogado.php';
    $ret = false;
    $dados = json_decode($app->request->getBody());

    $ret = new UsuarioLogado();
    $ret->setUsuario((new \controllers\Usuario($app))->editar($dados->usuario));
    $ret->setPessoa((new \controllers\Pessoa($app))->editar($ret->getUsuario()->id));

    $ret->setEndereco((new \controllers\Endereco($app))->editar($ret->getPessoa()->id));
    $tipoAcesso = $dados->usuario->tipoAcesso;

    if ($tipoAcesso == 'F') {
        $ret->setFornecedor((new \controllers\Fornecedor($app))->editar($ret->getUsuario()->id));
    }
    if ($tipoAcesso == 'E') {
        $ret->setEntregador((new \controllers\Entregador($app))->editar($ret->getUsuario()->id, $ret->getPessoa()->id));
    }

    echo json_encode($ret);
});


$app->run();
