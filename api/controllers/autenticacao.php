<?php
namespace controllers;
use api\dao\db\UsuarioDAO;

class Autenticacao
{
	public function login()
	{
		global $app;
		$dados = json_decode($app->request->getBody(), true);
		$usuario = new UsuarioDAO();
		$ret = $usuario->validarLogin($dados["login"], $dados["senha"]);
		return $ret;
	}

	public function usuarioCadastrado($login){
		$usuario = new UsuarioDAO();
		$ret = $usuario->usuarioCadastrado($login);
		return $ret;
	}
}
