<?php

class FindAllAtivo implements IFindable
{
    private static $instance;

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new FindAllAtivo();
        }
        return self::$instance;
    }

    public function getColumns()
    {
        return "*";
    }

    public function getTable()
    {
        return "users";
    }

    public function whereClause()
    {
        return array(
            0 => "`is_ativo` = :is_ativo"
        );
    }

    public function whereArgs()
    {
        return array(
            "is_ativo" => "Y"
        );
    }

    public function getLimitRows()
    {
        return 0;
    }
}

?>