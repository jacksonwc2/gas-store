<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';
use PDOException;
use PDO;

class EnderecoDAO extends BaseDAO
{

    public function __construct()
    {
        parent::__construct('tb_endereco');
    }

    public function salvar($dados, $codPessoa)
    {
        try {
            $sql = $this->conexao->prepare("
                insert into " . $this->tablename . " (tx_estado, tx_cidade, tx_bairro, tx_rua, nr_numero, nr_cep, tx_complemento, cd_pessoa) values ( ?, ?, ?, ?, ?, ?, ?, ? )
            ");
            $sql->execute(array($dados->estado, $dados->cidade, $dados->bairro, $dados->rua, $dados->numero, $dados->cep, $dados->complemento, $codPessoa));
            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar endereco: " . $e->getMessage();
        }
    }

    public function adquirirPorPessoa($codPessoa)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . $this->tablename . " where cd_pessoa = ? ");
            $sql->execute([$codPessoa]);
            return $sql->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pessoa: " . $e->getMessage();
        }
    }

    public function excluirConta($dados)
    {
        try {

            $sql = $this->conexao->prepare("delete from tb_endereco b where b.cd_pessoa = ?");
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
            $sql = $this->conexao->prepare("update " . $this->tablename . " set tx_estado = ?, tx_cidade = ?, tx_bairro=?, tx_rua=?, nr_numero=?, nr_cep=?, tx_complemento=? where id = ?");
            $sql->execute(array($dados->estado, $dados->cidade, $dados->bairro, $dados->rua, $dados->numero, $dados->cep, $dados->complemento, $dados->id));

        } catch (PDOException $e) {
            echo "===> Erro ao salvar endereco: " . $e->getMessage();
        }
    }
}
