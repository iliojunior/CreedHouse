<?php

include_once $caminhoInclude . "privado/sequencia.php";
include_once $caminhoInclude . "privado/geral/IFindable.php";

class findByLoginAndPass implements IFindable
{
    private $login;
    private $senha;

    public function __construct($login, $senha)
    {
        $this->login = $login;
        $this->senha = $senha;
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
        if (is_numeric($this->login))
            return array(
                0 => "id = :login",
                1 => "senha = :senha",
                2 => "is_ativo = :is_ativo"
            );

        return array(
            0 => "login = :login",
            1 => "senha = :senha",
            2 => "is_ativo = :is_ativo"
        );
    }

    public function whereArgs()
    {
        return array(
            "login" => $this->login,
            "senha" => $this->senha,
            "is_ativo" => "Y"
        );
    }
}