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

if (!isset($_SESSION['login'])) {
    ?>
    <script>document.location = "index.php?pgl"</script>
    <?php
}

$user = $_SESSION['login'];
$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$nivel = $_SESSION['nivel'];

?>