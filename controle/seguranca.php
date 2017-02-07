<?php

if (!isset($_SESSION['login'])) {
    ?>
    <script>document.location = "login-material/"</script>
    <?php
}

$user = $_SESSION['login'];
$pass = $_SESSION['pass'];
$nome = $_SESSION['nome'];
$nivel = $_SESSION['nivel'];


?>