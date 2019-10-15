<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';
use PDOException;
use PDO;

class FornecedorDAO extends BaseDAO
{
    public function __construct()
    {
        parent::__construct('tb_fornecedor');
    }

    public function salvar($dados, $codUsuario)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . $this->tablename . " (tx_razaosocial, tx_nomefantasia, nr_cnpj, nr_telefone, tx_email, nr_telefonefixo, cd_usuario) values ( ?, ?, ?, ?, ?, ?, ?)");
            $sql->execute([$dados->razaoSocial, $dados->nomeFantasia, $dados->numeroCnpj, $dados->numeroTelefone, $dados->email, $dados->numeroTelefoneFixo, $codUsuario]);
            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar fornecedor: " . $e->getMessage();
        }
    }

    public function adquirirPorUsuario($codUsuario)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . $this->tablename . " where cd_usuario = ? ");
            $sql->execute([$codUsuario]);
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pessoa: " . $e->getMessage();
        }
    }

    public function excluirConta($dados)
    {
        try {

            $sql = $this->conexao->prepare("update tb_fornecedor set cd_usuario = null where a.id = ?");
            $sql->execute([$dados->codFornecedor]);
            $sql->fetch();

            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pedido: " . $e->getMessage();
        }
    }

    public function editar($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . $this->tablename . " set tx_razaosocial=?, tx_nomefantasia=?, nr_cnpj=?, nr_telefone=?, tx_email=?, nr_telefonefixo=? where id = ?");
            $sql->execute([$dados->razaoSocial, $dados->nomeFantasia, $dados->numeroCnpj, $dados->numeroTelefone, $dados->email, $dados->numeroTelefoneFixo, $dados->id]);
            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar fornecedor: " . $e->getMessage();
        }
    }
}
