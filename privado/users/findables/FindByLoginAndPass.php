<?php

include_once $caminhoInclude . "privado/sequencia.php";
include_once $caminhoInclude . "privado/geral/IFindable.php";

class findByLoginAndPass implements IFindable
{
    private $login;
    private $senha;
    private $limite;

    public function __construct($login, $senha, $limit = 0)
    {
        $this->login = $login;
        $this->senha = $senha;
        $this->limite = $limit;
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
        if ((int)$this->login > 0)
            return array(
                0 => "`id_user` = :login",
                1 => "`senha` = :senha",
                2 => "`is_ativo` = :is_ativo"
            );


        return array(
            0 => "`login` = :login",
            1 => "`senha` = :senha",
            2 => "`is_ativo` = :is_ativo"
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

    public function getLimitRows()
    {
        return 1;
    }
}