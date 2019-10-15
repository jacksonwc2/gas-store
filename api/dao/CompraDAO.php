<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';
use PDOException;
use PDO;

class CompraDAO extends BaseDAO
{

    public function __construct()
    {
        parent::__construct('tb_produto');
    }

    public function realizarCompra($dados)
    {
        try {

            $sql = $this->conexao->prepare("
             insert into tb_pedido (dt_entrega, vl_pedido, fl_retornocasco, cd_entregador, cd_pessoa, cd_endereco, dt_pedido) values(?,?,?,?,?,?,current_timestamp)");
            $sql->execute([$dados["dt_entrega"], $dados["vl_pedido"], $dados["fl_retornocasco"], $dados["cd_entregador"], $dados["cd_pessoa"], $dados["cd_endereco"]]);

            $id = $this->conexao->lastInsertId();

            $sql = $this->conexao->prepare("
             insert into tb_pedidoformapagamento (cd_pedido, cd_formapagamento) values(?,?)");
            $sql->execute([$id, $dados["cd_formapagamento"]]);

            foreach ($dados["carrinho"] as $item) {
                $sql = $this->conexao->prepare("
                insert into tb_pedidoitem (cd_pedido, cd_produto, qt_quantidade) values(?,?,?)");
                $sql->execute([$id, $item["id"], $item["quantidade"]]);
            }
            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar endereco: " . $e->getMessage();
        }
    }
}
