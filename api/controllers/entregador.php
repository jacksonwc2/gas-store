<?php
namespace controllers;
use api\dao\db\EntregadorDAO;

class Entregador
{
    public function salvar($codUsuario, $codPessoa)
    {
        global $app;
        $dados = $app->request->getBody();
        $objeto = json_decode($dados)->entregador;
        $entregador = new EntregadorDAO();
        $entregador->salvar($objeto, $codUsuario, $codPessoa);
        return $entregador->adquirirPorUsuario($codUsuario);
    }

    public function adquirirPorUsuario($codUsuario)
    {
        $entregador = new EntregadorDAO();
        return $entregador->adquirirPorUsuario($codUsuario);
    }

    public function excluirConta()
    {
        global $app;

        $dados = $app->request->getBody();
        
        $objeto = json_decode($dados);

        $entregador = new EntregadorDAO();

        return $entregador->excluirConta($objeto);

    }

    public function editar($codUsuario)
    {
        global $app;
        $dados = $app->request->getBody();
        $objeto = json_decode($dados)->entregador;
        $entregador = new EntregadorDAO();
        $entregador->editar($objeto);
        return $entregador->adquirirPorUsuario($codUsuario);
    }

    public function listarTodos()
    {
        $entregador = new EntregadorDAO();
        return json_encode($entregador->listarTodos());
    }
}
