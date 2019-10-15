<?php

class UsuarioLogado
{

    public $usuario;
    public $pessoa;
    public $endereco;
    public $fornecedor;
    public $entregador;

    public function getPessoa()
    {
        return $this->pessoa;
    }

    public function setPessoa($nome)
    {
        $this->pessoa = $nome;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function getEntregador()
    {
        return $this->entregador;
    }

    public function setEntregador($entregador)
    {
        $this->entregador = $entregador;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }
}
