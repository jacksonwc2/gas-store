<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';
use PDOException;

class PedidoDAO extends BaseDAO
{
    public function __construct()
    {
        parent::__construct('tb_pedido');
    }

    public function salvar($dados)
    {
        try {
            $sql = $this->conexao->prepare("insert into " . $this->tablename . " (dt_entrega, vl_pedido, dt_pedido, fl_retornocasco, qt_quantidade, cd_entregador, cd_endereco, cd_pessoa) values ( ?, ?, ?, ?, ?, ?, ?, ? )");

            $sql->execute([$dados->dataEntrega, $dados->valorPedido, $dados->dataPedido, $dados->flagRetornoCasco, $dados->quantidade, $dados->codigoEntregador,  $dados->codigoEndereco,  $dados->codigoPessoa]);

            $sql->fetch();

            return $this->conexao->lastInsertId();
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pedido: " . $e->getMessage();
        }
    }

    public function excluirConta($dados)
    {
        try {

            $sql = $this->conexao->prepare("delete from tb_pedidoitem a where a.cd_pedido in 
            (select b.id from tb_pedido b where b.cd_pessoa = ? or b.cd_entregador = ?)
            or a.cd_produto in (select c.id from tb_fornecedorproduto c where c.cd_fornecedor = ?)");
            $sql->execute([$dados->codPessoa, $dados->codEntregador, $dados->codFornecedor]);
            $sql->fetch();

            $sql = $this->conexao->prepare("delete from tb_pedido a where a.cd_pessoa = ? 
            or a.cd_entregador =?");
            $sql->execute([$dados->codPessoa, $dados->codEntregador]);
            $sql->fetch();

            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pedido: " . $e->getMessage();
        }
    }
}
