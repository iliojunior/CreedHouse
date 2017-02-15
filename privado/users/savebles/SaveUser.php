<?php

class SaveUser implements ISaveble
{
    private $id_user;
    private $nome;
    private $login;
    private $senha;
    private $nivel;
    private $email;
    private $sexo;
    private $is_ativo;

    function getTableName(): string
    {
        return "users";
    }

    function getArrayColumns(): array
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

    function getArrayValues(): array
    {
        $innerArray = array(
            "id_user" => $this->id_user,
            "nome" => $this->nome,
            "login" => $this->login,
            "senha" => $this->senha,
            "nivel" => $this->nivel,
            "email" => $this->email,
            "sexo" => $this->sexo,
            "is_ativo" => (empty($this->is_ativo) ? "Y" : $this->is_ativo)
        );

        if ($this->isNewRecord())
            unset($innerArray["id_user"]);

        return $innerArray;
    }

    function isNewRecord(): boolean
    {
        return (empty($this->id_user) || $this->id_user === 0);
    }

    function getFilter(): string
    {
        return "(`id_user` = :id_user)";
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
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
    public function setIsAtivo($is_ativo)
    {
        $this->is_ativo = $is_ativo;
    }



}