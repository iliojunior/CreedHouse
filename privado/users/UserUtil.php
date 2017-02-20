<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class UserUtil
{
    const WORD_KEY = "junior";
    const FIELD_ID = "id_user";
    const FIELD_LOGIN = "login";
    const FIELD_NOME = "nome";
    const FIELD_EMAIL = "email";
    const FIELD_SEXO = "sexo";
    const FIELD_IS_ATIVO = "is_ativo";
    const FIELD_NIVEL = "nivel";

    public function __construct()
    {

    }

    public static function isLogado()
    {
        return (!empty(self::getIdUser())
            && !empty(self::getLogin())
            && !empty(self::getNome())
            && !empty(self::getEmail()));
    }

    public static function getWordKey(){
        return self::WORD_KEY;
    }

    /**
     * @return mixed
     */
    public static function getIdUser()
    {
        return isset($_SESSION[self::FIELD_ID]) ? $_SESSION[self::FIELD_ID] : "";
    }

    /**
     * @param mixed $id_user
     */
    public static function setIdUser($id_user)
    {
        $_SESSION[self::FIELD_ID] = $id_user;
    }

    /**
     * @return mixed
     */
    public static function getNome()
    {
        return isset($_SESSION[self::FIELD_NOME]) ? $_SESSION[self::FIELD_NOME] : "";
    }

    /**
     * @param mixed $nome
     */
    public static function setNome($nome)
    {
        $_SESSION[self::FIELD_NOME] = $nome;
    }

    /**
     * @return mixed
     */
    public static function getLogin()
    {
        return isset($_SESSION[self::FIELD_LOGIN]) ? $_SESSION[self::FIELD_LOGIN] : "";
    }

    /**
     * @param mixed $login
     */
    public static function setLogin($login)
    {
        $_SESSION[self::FIELD_LOGIN] = $login;
    }

    /**
     * @return mixed
     */
    public static function getEmail()
    {
        return isset($_SESSION[self::FIELD_EMAIL]) ? $_SESSION[self::FIELD_EMAIL] : "";
    }

    /**
     * @param mixed $email
     */
    public static function setEmail($email)
    {
        $_SESSION[self::FIELD_EMAIL] = $email;
    }

    /**
     * @return mixed
     */
    public static function getSexo()
    {
        return isset($_SESSION[self::FIELD_SEXO]) ? $_SESSION[self::FIELD_SEXO] : "";
    }

    /**
     * @param mixed $sexo
     */
    public static function setSexo($sexo)
    {
        $_SESSION[self::FIELD_SEXO] = $sexo;
    }

    public static function getNivel()
    {
        return isset($_SESSION[self::FIELD_NIVEL]) ? $_SESSION[self::FIELD_NIVEL] : "";
    }

    public static function setNivel($nivel)
    {
        $_SESSION[self::FIELD_NIVEL] = $nivel;
    }
}