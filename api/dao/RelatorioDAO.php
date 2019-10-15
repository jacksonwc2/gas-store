<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';
use PDO;
use PDOException;

class RelatorioDAO extends BaseDAO
{

    public function __construct()
    {
        parent::__construct('tb_produto');
    }

    public function r1()
    {
        try {
            $sql = $this->conexao->query("
            select
                pessoa.id id,
                tx_nome nome,
                nr_telefone telefone,
                date_part('YEAR',
                age(now(),
                dt_nascimento)) idade
            from
                tb_pessoa pessoa
            inner join tb_pedido pedido on
                pessoa.id = pedido.cd_pessoa
                and date_part('year',
                pedido.dt_pedido) = 2018
            order by
                idade desc");
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "===> Erro relatorio 1: " . $e->getMessage();
        }
    }

    public function r2()
    {
        try {
            $sql = $this->conexao->query("
            select
                f.nr_cnpj cnpj,
                f.tx_nomefantasia nomefantasia,
                f.tx_email email,
                p.tx_marca marca,
                p.nr_volume volume
            from
	            tb_fornecedor f
            inner join tb_produto p on
                f.id = p.cd_fornecedor
                and p.nr_volume > 20
                and p.tx_marca in ('A',
                'B',
                'C')
            inner join tb_pessoa ps on
	            f.cd_usuario = ps.tb_usuarioid
            inner join tb_endereco en on
                ps.id = en.cd_pessoa
                and en.tx_estado = 'PR'
            group by
                f.nr_cnpj,
                f.tx_nomefantasia,
                f.tx_email,
                p.tx_marca,
                p.nr_volume
            order by
	            f.nr_cnpj asc;");
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "===> Erro ao fazer busca: " . $e->getMessage();
        }
    }

    public function r3()
    {
        try {
            $sql = $this->conexao->query("
            select
                a.id,
                a.vl_pedido as valor,
                a.dt_pedido as data,
                (select count(y.id) from tb_pedidoitem y where y.cd_pedido = a.id) as quantidade
            from
                tb_pedido a
            inner join tb_pedidoformapagamento b on
                a.id = b.cd_pedido
            inner join tb_formapagamento c on
                b.cd_formapagamento = c.id
                and c.fl_formapagamento = 'C'
            where
                extract(month from a.dt_pedido) in (1,3,5,7,9,11)
            order by
                a.dt_pedido desc");
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "===> Erro ao executar relatorio 3: " . $e->getMessage();
        }
    }

    public function r4()
    {
        try {
            $sql = $this->conexao->query("
            select
                pes.id as id,
                pes.tx_nome as nome,
                count(distinct ped.id) as qntdPedidos,
                count(distinct pit.id) as qntdProdutos,
                sum(distinct ped.vl_pedido) as somaValorPedidos
            from
                tb_pessoa pes
            inner join tb_pedido ped on
                pes.id = ped.cd_pessoa
            inner join tb_pedidoitem pit on
                ped.id = pit.cd_pedido
            inner join tb_endereco edr on
                pes.id = edr.cd_pessoa
                and edr.tx_estado <> 'RS'
            where
                pes.fl_sexo = 'F'
                and (select distinct sum(y.vl_pedido) from tb_pedido y where y.cd_pessoa = pes.id) > 5000
            group by
                pes.id,
                pes.tx_nome
            order by
                qntdPedidos desc");
            return $sql->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "===> Erro ao executar relatorio 4: " . $e->getMessage();
        }
    }
}
