<?php

class Conexao
{
    private static $instance;
    private static $host = "localhost";
    private static $user = "root";
    private static $pass = "Junior1996@sql";
    private static $database = "creed_house";

    private function __construct()
    {
    }

    /**
     * Obtém instância de conexão com banco de dados $host
     * @return mixed
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$database,
                self::$user,
                self::$pass,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }
}

?>