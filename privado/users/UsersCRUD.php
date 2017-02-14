<?php
require_once $caminhoInclude . "privado/sequencia.php";

class UsersCRUD
{

    public static $tableName = "users";

    public function __construct()
    {
    }

    public static function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `users`(
                             `id_user` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             `nome` TEXT NOT NULL,
                             `login` TEXT NOT NULL,
                             `senha` TEXT NOT NULL,
                             `nivel` INT NOT NULL,
                             `email` TEXT,
                             `sexo` CHAR(1) NOT NULL DEFAULT 'M',
                             `is_ativo` CHAR(1) NOT NULL DEFAULT 'Y'
                             );";
        try {
            $stCreate = Conexao::getInstance()->prepare($sql);
            $stCreate->execute();
            return true;
        } catch (PDOException $e) {
            die("MySql Error(createTable): " . $e->getMessage());
        }
    }

    public static function insertUser($nome, $senha, $email, $sexo, $is_ativo)
    {
        self::createTable();
        $is_ativo = empty($is_ativo) ? "Y" : $is_ativo;
        $sql = "INSERT INTO `" . self::$tableName . "`(nome,senha,email,sexo, is_ativo)
                                                VALUE (:nome,:senha,:email,:sexo,:is_ativo);";
        $values = array(
            "nome" => $nome,
            "senha" => $senha,
            "email" => $email,
            "sexo" => $sexo,
            "is_ativo" => $is_ativo
        );
        try {
            $stInsert = Conexao::getInstance()->prepare($sql);
            $stInsert->execute($values);
            return true;
        } catch (PDOException $e) {
            die("MySql Error(insertUser): " . $e->getMessage());
        }
    }

    public static function find(IFindable $findable)
    {
        self::createTable();
        $sql = "SELECT " . $findable->getColumns() .
        " FROM `" . $findable->getTable() .
        "` WHERE " . join(" AND ", $findable->whereClause()) .
            ($findable->getLimitRows() > 0 ? " LIMIT " . $findable->getLimitRows() : "");
        try {
            $stFind = Conexao::getInstance()->prepare($sql);
            $stFind->execute($findable->whereArgs());
            return $stFind;
        } catch (PDOException $e) {
            die("MySql Error(find): " . $e->getMessage());
        }
    }

    public static function isValido($login, $senha)
    {
        self::createTable();
        $sql = "SELECT * 
                  FROM " . self::$tableName . "
                 WHERE `login` = :login 
                   AND `senha`=:senha 
                 LIMIT 1";
        $whereArgs = array(
            "login" => $login,
            "senha" => $senha
        );
        try {
            $stSelect = Conexao::getInstance()->prepare($sql);
            $stSelect->execute($whereArgs);
            if (count($stSelect->fetchAll()) > 0) {
                return true;
            } else {
                return "Usuário e/ou senha inválido(s)";
            }
        } catch (PDOException $e) {
            die("MySql Error(isValido): " . $e->getMessage());
        }
        return false;
    }

    public static function save()
}

?>