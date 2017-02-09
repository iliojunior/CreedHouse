<?php

include_once $caminhoInclude . "privado/sequencia.php";
include_once $caminhoInclude . "privado/geral/IFindable.php";

class findByLoginOrEmail implements IFindable
{

    private $search;

    public function __construct($search)
    {
        $this->search = $search;
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
            0 => "`login` = :login OR `email` = :email",
            1 => "`is_ativo` = :is_ativo"
        );
    }

    public function whereArgs()
    {
        return array(
            "login" => $this->search,
            "email" => $this->search,
            "is_ativo" => "Y"
        );
    }
}