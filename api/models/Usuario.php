<?php 
class Usuario {

    private $id;
    private $login;
    private $senha;
    private $tipoAcesso;
    
    public function getId(){
        return $this->id;
    }
    
    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getTipoAcesso(){
        return $this->tipoAcesso;
    }

    public function setTipoAcesso($tipoAcesso){
        $this->tipoAcesso = $tipoAcesso;
    }

}