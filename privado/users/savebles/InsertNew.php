<?php

class InsertNew implements ISaveble
{
    private $nome;
    private $login;
    private $senha;
    private $nivel;
    private $email;
    private $sexo;
    private $is_ativo;

    /**
     * InsertNew constructor.
     * @param $nome
     */
    public function __construct($nome, $login, $senha, $nivel)
    {
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
        $this->nivel = $nivel;
    }

    /**
     * @param mixed $nivel
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @param mixed $is_ativo
     */
    public function setIsAtivo(char $is_ativo)
    {
        $this->is_ativo = $is_ativo;
    }

    function getTableName()
    {
        return "users";
    }

    function getArrayColumns()
    {
        return array(
            0 => "nome",
            1 => "login",
            2 => "senha",
            3 => "nivel",
            4 => "email",
            5 => "sexo",
            6 => "is_ativo"
        );
    }

    function getArrayValues()
    {
        return array(
            "nome" => $this->nome,
            "login" => $this->login,
            "senha" => $this->senha,
            "nivel" => $this->nivel,
            "email" => $this->email,
            "sexo" => $this->sexo,
            "is_ativo" => (empty($this->is_ativo) ? "Y" : $this->is_ativo)
    );
    }

    function getFilter()
    {
        return '';
    }
}

?>