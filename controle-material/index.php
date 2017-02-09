<?php

$caminhoInclude = "../../";
include_once "seguranca.php";
include_once $caminhoInclude . "privado/users/UsersCRUD.php";
include_once $caminhoInclude . "privado/users/FindAllAtivo.php";

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
<body class="teal lighten-4">
<table>
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
            <td><?= $usuario['nome']?></td>
            <td><?= $usuario['email']?></td>
            <td><?= $usuario['nivel']?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>
