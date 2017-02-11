<?php

$caminhoInclude = "../";

if (isset($_GET['pgl'])) {
    include "login/index.php";
    return;
}

include_once "seguranca.php";
include_once $caminhoInclude . "privado/users/UsersCRUD.php";
include_once $caminhoInclude . "privado/users/findables/FindAllAtivo.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Acesso</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<body>
<ul class="side-nav fixed">
    <li class="centered">
        <strong>Ol&aacute;</strong>,
        <?= $nome ?>
    </li>
    <li class="search">
        <div class="search-wrapper card">
            <input id="search"><i class="material-icons">search</i>
            <div class="search-results"></div>
        </div>
    </li>
    <li class="row">
        <a href="#">Adicionar Usu&aacute;rio</a>
    </li>
    <li class="row">
        <a href="?sair">Sair</a>
    </li>
</ul>
<div class="main">
    <table class="responsive-table">
        <thead>
        <tr>
            <th data-field="id">Id</th>
            <th data-field="nome">Nome</th>
            <th data-field="email">Email</th>
            <th data-field="nivel">N&iacute;vel</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $resultado = UsersCRUD::find(FindAllAtivo::getInstance())->fetchAll();
        while ($usuario = $resultado) {
            ?>
            <tr>
                <td><?= $usuario['id'] ?></td>
                <td><?= $usuario['nome'] ?></td>
                <td><?= $usuario['email'] ?></td>
                <td><?= $usuario['nivel'] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
