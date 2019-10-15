<?php
namespace controllers;
use api\dao\db\ProdutoDAO;

class Produto
{
    public function salvar()
    {
        global $app;

        $dados = $app->request->getBody();
        
        $objeto = json_decode($dados);

        $produto = new ProdutoDAO();

        return $produto->salvar($objeto);
    }

    public function listarTodos()
    {
        global $app;

        $produto = new ProdutoDAO();

        return $produto->listarTodos();
    }

    public function excluirConta()
    {
        global $app;

        $dados = $app->request->getBody();
        
        $objeto = json_decode($dados);

        $produto = new ProdutoDAO();

        return $produto->excluirConta($objeto);

    }

    public function listarGas()
    {
        $produto = new ProdutoDAO();
        return $produto->listarGas();
    }

    public function listarAgua()
    {
        $produto = new ProdutoDAO();
        return $produto->listarAgua();
    }
}
