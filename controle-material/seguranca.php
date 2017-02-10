<?php

session_start();
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "sair":
            session_destroy();
            session_unset();
            unset($_SESSION['login']);
            unset($_SESSION['email']);
            unset($_SESSION['nome']);
            unset($_SESSION['nivel']);
            break;
        case "logar":
            include_once "login/index.php";
            die();
        default:
            include_once "404.php";
            die();
    }
}

if (!isset($_SESSION['login'])) {
    ?>
    <script>document.location = "?action=logar"</script>
    <?php
}


$user = $_SESSION['login'];
$emial = $_SESSION['email'];
$nome = $_SESSION['nome'];
$nivel = $_SESSION['nivel'];

?>