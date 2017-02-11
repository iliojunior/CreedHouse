<?php
session_start();

if(isset($_GET['sair'])){
    session_start();
    session_destroy();
    session_unset();
    unset($_SESSION['login']);
    unset($_SESSION['email']);
    unset($_SESSION['nome']);
    unset($_SESSION['nivel']);
}

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
<<<<<<< HEAD
    <script>document.location = "index.php?pgl"</script>
=======
    <script>document.location = "?action=logar"</script>
>>>>>>> bcffcef4c57678219c87c849df23773303df311f
    <?php
}


$user = $_SESSION['login'];
$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$nivel = $_SESSION['nivel'];

?>