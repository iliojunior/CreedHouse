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

    function getTableName()
    {
        return "users";
    }

    function getArrayColumns()
    {
        $returnArray = array(
            "nome" => "nome",
            "login" => "login",
            "senha" => "senha",
            "nivel" => "nivel",
            "email" => "email",
            "sexo" => "sexo",
            "is_ativo" => "is_ativo"
        );
        if (!$this->isNewRecord())
            unset($returnArray['login']);
        if (!$this->isAlterarSenha())
            unset($returnArray['senha']);

        return $returnArray;
    }

    public function isAlterarSenha()
    {
        return ($this->senha != '');
    }

    function getArrayValues()
    {
        $isVazio = "Y";
        if ($this->is_ativo !== "on")
            $isVazio = "N";

        $innerArray = array(
            "id_user" => $this->id_user,
            "nome" => $this->nome,
            "login" => $this->login,
            "senha" => $this->senha,
            "nivel" => $this->nivel,
            "email" => $this->email,
            "sexo" => $this->sexo,
            "is_ativo" => $isVazio
        );

        if (!$this->isNewRecord())
            unset($innerArray['login']);
        if ($this->isNewRecord())
            unset($innerArray["id_user"]);
        if (!$this->isAlterarSenha())
            unset($innerArray['senha']);

        return $innerArray;
    }

    function isNewRecord()
    {
        return (empty($this->id_user) || $this->id_user === 0);
    }

    function getFilter()
    {
        return array("(`id_user` = :id_user)");
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