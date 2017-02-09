<?php

if (!isset($_SESSION['login'])) {
    ?>
    <script>document.location = "login/"</script>
    <?php
}

$user = $_SESSION['login'];
$emial = $_SESSION['email'];
$nome = $_SESSION['nome'];
$nivel = $_SESSION['nivel'];

?>