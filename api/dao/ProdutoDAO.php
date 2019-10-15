<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';

use PDOException;
use PDO;

class ProdutoDAO extends BaseDAO
{

    public function __construct()
    {
        parent::__construct('tb_produto');
    }

    public function salvar($dados)
    {
        try {
            $sql = $this->conexao->prepare("
                insert into " . $this->tablename . " (fl_tipo, tx_marca, nr_volume, vl_preco, cd_unidademedida, cd_fornecedor) values ( ?, ?, ?, ?, ?, ?)
            ");
            $sql->execute(array($dados->tipo, $dados->marca, $dados->volume, $dados->preco, $dados->unidadeMedida, $dados->codFornecedor));

            $sql->fetch();

            return $this->conexao->lastInsertId();
        } catch (PDOException $e) {
            echo "===> Erro ao salvar produto: " . $e->getMessage();
        }
    }

    public function listarTodos()
    {
        try {
            $sql = $this->conexao->query("
                select * from " . $this->tablename);

            $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

            return json_encode($resultado);
        } catch (PDOException $e) {
            echo "===> Erro ao listar produto: " . $e->getMessage();
        }
    }

    public function excluirConta($dados)
    {
        try {

            $sql = $this->conexao->prepare("delete from tb_produto where cd_fornecedor = ?");
            $sql->execute([$dados->codFornecedor]);

            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pedido: " . $e->getMessage();
        }
    }

    public function listarGas()
    {
        try {
            $sql = $this->conexao->query("select a.*, b.tx_nomefantasia fornecedor from " . $this->tablename . " a inner join tb_fornecedor b on a.cd_fornecedor = b.id where fl_tipo = 'G'");
            $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        } catch (PDOException $e) {
            echo "===> Erro ao listar produto: " . $e->getMessage();
        }
    }

    public function listarAgua()
    {
        try {
            $sql = $this->conexao->query("select a.*, b.tx_nomefantasia fornecedor from " . $this->tablename . " a inner join tb_fornecedor b on a.cd_fornecedor = b.id where fl_tipo = 'A'");
            $resultado = $sql->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        } catch (PDOException $e) {
            echo "===> Erro ao listar produto: " . $e->getMessage();
        }
    }
}
