<?php
namespace controllers;
use api\dao\db\CompraDAO;

class Compra
{
	public function realizarCompra()
	{
		global $app;
		$dados = json_decode($app->request->getBody(), true);
		$compra = new CompraDAO();
		$ret = $compra->realizarCompra($dados);
		return json_encode($ret);
	}
}
