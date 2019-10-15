<?php
namespace controllers;
use api\dao\db\RelatorioDAO;

class Relatorio
{
	public function r1()
	{
		$relatorio = new RelatorioDAO();
		$ret = $relatorio->r1();
		return json_encode($ret);
	}

	public function r2()
	{
		$relatorio = new RelatorioDAO();
		$ret = $relatorio->r2();
		return json_encode($ret);
	}

	public function r3()
	{
		$relatorio = new RelatorioDAO();
		return json_encode($relatorio->r3());
	}

	public function r4()
	{
		$relatorio = new RelatorioDAO();
		return json_encode($relatorio->r4());
	}
}
