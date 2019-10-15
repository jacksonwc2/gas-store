<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';
use PDOException;
use PDO;

class PessoaDAO extends BaseDAO
{
    public function __construct()
    {
        parent::__construct('tb_pessoa');
    }

    public function salvar($dados, $codUsuario)
    {
        try {

            $sql = $this->conexao->prepare("insert into " . $this->tablename . " (tx_nome, tx_email, tx_documento, dt_nascimento, nr_telefone, tb_usuarioid, fl_sexo) values ( ?, ?, ?, ?, ?, ?, ? )");
            $sql->execute([$dados->nome, $dados->email, $dados->documento, $dados->dataNascimento, $dados->telefone, $codUsuario, $dados->flagSexo]);
            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pessoa: " . $e->getMessage();
        }
    }

    public function adquirirPorUsuario($codUsuario)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . $this->tablename . " where tb_usuarioid = ?");
            $sql->execute([$codUsuario]);
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pessoa: " . $e->getMessage();
        }
    }

    public function excluirConta($dados)
    {
        try {

            $sql = $this->conexao->prepare("update tb_pessoa set tb_usuarioid = null where b.id = ?");
            $sql->execute([$dados->codPessoa]);
            $sql->fetch();

            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pedido: " . $e->getMessage();
        }
    }

    public function editar($dados)
    {
        try {

            $sql = $this->conexao->prepare("update " . $this->tablename . " set tx_nome = ?, tx_email = ?, tx_documento = ?, dt_nascimento = ?, nr_telefone = ? where id = ?");
            $sql->execute([$dados->nome, $dados->email, $dados->documento, $dados->dataNascimento, $dados->telefone, $dados->id]);
            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pessoa: " . $e->getMessage();
        }
    }
}
