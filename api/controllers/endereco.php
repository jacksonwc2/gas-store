<?php
namespace controllers;
use api\dao\db\EnderecoDAO;

class Endereco
{
    public function salvar($codPessoa)
    {
        global $app;
        $dados = $app->request->getBody();
        $objeto = json_decode($dados)->endereco;
        $endereco = new EnderecoDAO();
        $endereco->salvar($objeto, $codPessoa);
        return $endereco->adquirirPorPessoa($codPessoa);
    }

    public function adquirirPorPessoa($codPessoa)
    {
        $endereco = new EnderecoDAO();
        return $endereco->adquirirPorPessoa($codPessoa);
    }

    public function excluirConta()
    {
        global $app;

        $dados = $app->request->getBody();
        
        $objeto = json_decode($dados);

        $endereco = new EnderecoDAO();

        return $endereco->excluirConta($objeto);

    }

    public function editar($codPessoa)
    {
        global $app;
        $dados = $app->request->getBody();
        $objeto = json_decode($dados)->endereco;
        $endereco = new EnderecoDAO();
        $endereco->editar($objeto);
        return $endereco->adquirirPorPessoa($codPessoa);
    }
}
