<?php
namespace controllers;

use api\dao\db\PessoaDAO;

class Pessoa
{
    public function salvar($codUsuario)
    {
        global $app;
        $dados = $app->request->getBody();
        $objeto = json_decode($dados)->pessoa;
        $pessoa = new PessoaDAO();
        $pessoa->salvar($objeto, $codUsuario);
        return $pessoa->adquirirPorUsuario($codUsuario);
    }

    public function adquirirPorUsuario($codUsuario)
    {
       $pessoa = new PessoaDAO();
       return $pessoa->adquirirPorUsuario($codUsuario);
    }

    public function excluirConta()
    {
        global $app;

        $dados = $app->request->getBody();
        
        $objeto = json_decode($dados);

        $pessoa = new PessoaDAO();

        return $pessoa->excluirConta($objeto);

    }

    public function editar($codUsuario)
    {
        global $app;
        $dados = $app->request->getBody();
        $objeto = json_decode($dados)->pessoa;
        $pessoa = new PessoaDAO();
        $pessoa->editar($objeto);
        return $pessoa->adquirirPorUsuario($codUsuario);
    }
}
