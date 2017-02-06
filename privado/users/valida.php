<?php

require_once "UsersCRUD.php";

$funcao = $_GET['f'];
$user = $_GET['u'];
$pass = $_GET['p'];

$funcaoPath = "UsersCRUD::" . $funcao;

try {
    call_user_func_array($funcaoPath, array("login" => $user, "senha" => $pass));
    echo "OKK";
} catch (Exception $e) {
    die("ERROr: " . $e->getMessage());
}

?>