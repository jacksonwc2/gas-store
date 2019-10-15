<?php
namespace api\dao\db;

require_once 'BaseDAO.class.php';
use PDOException;
use PDO;

class UsuarioDAO extends BaseDAO
{

    public function __construct()
    {
        parent::__construct('tb_usuario');
    }

    public function validarLogin($login, $senha)
    {
        try {
            $sql = $this->conexao->prepare("select * from " . $this->tablename . " where tx_login = ? and tx_senha = ?");
            $sql->execute([$login, $senha]);
            $usuario = $sql->fetch(PDO::FETCH_OBJ);
            return $usuario;
        } catch (PDOException $e) {
            echo "===> Erro ao efetuar login: " . $e->getMessage();
        }
    }

    public function salvar($dados)
    {
        try {
            $sql = $this->conexao->prepare("
                insert into " . $this->tablename . " (tx_login, tx_senha, fl_tipoacesso) values ( ?, ?, ?)
            ");
            $sql->execute(array($dados->login, $dados->senha, $dados->tipoAcesso));

            $sql->fetch();

            return $this->conexao->lastInsertId();
        } catch (PDOException $e) {
            echo "===> Erro ao salvar usuario: " . $e->getMessage();
        }
    }

    public function excluirConta($dados)
    {
        try {

            $sql = $this->conexao->prepare("delete from tb_usuario b where b.id = ?");
            $sql->execute([$dados->codUsuario]);
            $sql->fetch();

            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar pedido: " . $e->getMessage();
        }
    }

    public function usuarioCadastrado($login)
    {
        try {
            $sql = $this->conexao->prepare("select count(*) from " . $this->tablename . " where tx_login = ?");
            $sql->execute([$login]);
            $usuario = $sql->fetch(PDO::FETCH_OBJ);
            return $usuario->count >= 1;
        } catch (PDOException $e) {
            echo "===> Erro ao validar usuario: " . $e->getMessage();
        }
    }

    public function editar($login, $senha, $id)
    {
        try {
            $sql = $this->conexao->prepare("update " . $this->tablename . " set tx_login = ?, tx_senha =  ? where id = ?");
            $sql->execute(array($login, $senha, $id));
            return true;
        } catch (PDOException $e) {
            echo "===> Erro ao salvar usuario: " . $e->getMessage();
        }
    }
}
