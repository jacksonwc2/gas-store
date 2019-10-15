<?php
namespace api\dao\db;

use PDO;
use PDOException;

/*
 * Classe de conexão ao banco de dados
 */

final class Conexao
{
    private static $host = "localhost";
    private static $nomeBanco = "gas";
    private static $usuario = "postgres";
    private static $senha = "jackson";

    private static $instance = null;
    private function __construct(){}
    private function __clone(){}

    // método de conexão
    public static function conectar()
    {
        if (!isset(self::$instance)) {
            // conexão não existe, então cria
            try {
                self::$instance = new PDO("pgsql:host=" . self::$host . ";dbname=" . self::$nomeBanco, self::$usuario, self::$senha);
                self::$instance->setAttribute(
                    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                );
            } catch (PDOException $e) {
                echo "Erro na conexão: " .
                $e->getMessage();
            }
        }

        return self::$instance;
    }

}
