<?php
namespace controllers;

require '../../dao/FornecedorDAO.php';

use api\dao\db\FornecedorDAO;

class Fornecedor
{
    public function salvar($codUsuario)
    {
        global $app;
        $dados = $app->request->getBody();
        $objeto = json_decode($dados)->fornecedor;
        $fornecedor = new FornecedorDAO();
        $fornecedor->salvar($objeto, $codUsuario);
        return $fornecedor->adquirirPorUsuario($codUsuario);
    }

    public function adquirirPorUsuario($codUsuario)
    {
        $fornecedor = new FornecedorDAO();
        return $fornecedor->adquirirPorUsuario($codUsuario);
    }

    public function excluirConta()
    {
        global $app;

        $dados = $app->request->getBody();
        
        $objeto = json_decode($dados);

        $fornecedor = new FornecedorDAO();

        return $fornecedor->excluirConta($objeto);

    }

    public function editar($codUsuario)
    {
        global $app;
        $dados = $app->request->getBody();
        $objeto = json_decode($dados)->fornecedor;
        $fornecedor = new FornecedorDAO();
        $fornecedor->editar($objeto);
        return $fornecedor->adquirirPorUsuario($codUsuario);
    }

}
