<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';
use PDOException;
use PDO;

class EntregadorDAO extends BaseDAO
{

    public function __construct()
    {
        parent::__construct('tb_entregador');
    }

    public function salvar($dados, $codUsuario, $codPessoa)
    {
        try {
            $sql = $this->conexao->prepare("
                insert into " . $this->tablename . " (tx_placa, vl_frete, cd_usuario, cd_pessoa) values ( ?, ?, ?, ?)
            ");
            $sql->execute(array($dados->placa, $dados->valorFrete, $codUsuario, $codPessoa));

            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar entregador: " . $e->getMessage();
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

            $sql = $this->conexao->prepare("update tb_entregador set cd_usuario = null where b.id = ?");
            $sql->execute([$dados->codEntregador]);
            $sql->fetch();

            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pedido: " . $e->getMessage();
        }
    }

    public function editar($dados)
    {
        try {
            $sql = $this->conexao->prepare("update " . $this->tablename . " set tx_placa=?, vl_frete=? where id=?");
            $sql->execute(array($dados->placa, $dados->valorFrete, $dados->id));

            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar entregador: " . $e->getMessage();
        }
    }

    public function listarTodos()
    {
        try {
            $sql = $this->conexao->query("select a.*, p.tx_nome nome from " . $this->tablename . " a inner join tb_pessoa p on p.id=a.cd_pessoa");
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pessoa: " . $e->getMessage();
        }
    }
}
