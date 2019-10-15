<?php
namespace controllers;

require '../../dao/PedidoDAO.php';

use api\dao\db\PedidoDAO;

class Pedido
{
    public function salvar()
    {
        global $app;

        $dados = $app->request->getBody();
        
        $objeto = json_decode($dados);

        $pedidos = new PedidoDAO();

        return $pedidos->salvar($objeto);

    }

    public function excluirConta()
    {
        global $app;

        $dados = $app->request->getBody();
        
        $objeto = json_decode($dados);

        $pedidos = new PedidoDAO();

        return $pedidos->excluirConta($objeto);

    }
}
