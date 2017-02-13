<?php

$main = (isset($_GET['main'])? $_GET['main']:"");

$caminhoInclude = "../";
$caminhoIMG = "$caminhoInclude/privado/images/";

include_once $caminhoInclude . "controle/seguranca.php";
include_once $caminhoInclude . "privado/users/UsersCRUD.php";

include_all_php($caminhoInclude."privado/users/findables");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Controle Privado</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="<?=$caminhoIMG?>/favicon-controle.ico"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<body>
<?php if (isset($pg) && !empty($pg)) {
    include_once $pg;
} else { ?>
    <ul class="side-nav fixed">
        <li class="centered">
            <strong>Ol&aacute;</strong>,
            <?= UserUtil::getNome() ?>
        </li>
        <li class="search">
            <div class="search-wrapper card">
                <input id="search"><i class="material-icons">search</i>
                <div class="search-results"></div>
            </div>
        </li>
        <li class="row">
            <a href="?file=usuario.php">Adicionar Usu&aacute;rio</a>
        </li>
        <li class="row">
            <a href="?action=sair">Sair</a>
        </li>
    </ul>
    <div class="main">
        <?php include_once "sequencia.php"; ?>
    </div>
<?php } ?>
</body>
</html>