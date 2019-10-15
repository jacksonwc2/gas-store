<?php
namespace controllers;
use api\dao\db\UsuarioDAO;

class Usuario
{
    public function salvar($dados)
    {
        $usuario = new UsuarioDAO();
        $usuario->salvar($dados);
        return $usuario->validarLogin($dados->login, $dados->senha);
    }

    public function excluirConta()
    {
        global $app;

        $dados = $app->request->getBody();

        $objeto = json_decode($dados);

        $pessoa = new UsuarioDAO();

        return $pessoa->excluirConta($objeto);
    }

    public function editar($dados)
    {
        $usuario = new UsuarioDAO();
        $usuario->editar($dados->login, $dados->senha, $dados->id);
        return $usuario->validarLogin($dados->login, $dados->senha);
    }
}
