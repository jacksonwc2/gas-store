<?php
namespace api\dao\db;

require_once 'Conexao.class.php';
use api\dao\db\Conexao;

class BaseDAO
{

    public $tablename = "";
    public $conexao = null;

    public function __construct($tablename)
    {
        $this->tablename = $tablename;
        $this->conexao = Conexao::conectar();
    }
}
