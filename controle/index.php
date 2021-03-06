<?php
$main = (isset($_GET['main']) ? $_GET['main'] : "");

$CAMINHO = "http://localhost/CreedHouse";
$caminhoInclude = "../";
$caminhoIMG = "$caminhoInclude/privado/images/";

include_once $caminhoInclude . "privado/functions.php";
include_all_php($caminhoInclude . "privado/includes");
include_all_php($caminhoInclude . "privado/users/findables");
include_all_php($caminhoInclude . "privado/users/savebles");

include_once $caminhoInclude . "controle/seguranca.php";
include_once $caminhoInclude . "privado/users/UsersCRUD.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Controle Privado</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" type="image/png" href="<?= $caminhoIMG ?>/favicon-controle.ico"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
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

        <nav class="teal">
            <div class="nav-wrapper">
                <a class="brand-logo" href="<?= $CAMINHO ?>/controle">Controle</a>
                <?php if (isset($_GET['file']) && $_GET['file'] === "usuario.php") { ?>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="#" id="save-user">
                                <i class="material-icons right">done</i>
                            </a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </nav>

        <div class="main-inner">
            <?php include_once "sequencia.php"; ?>
        </div>

    </div>
<?php } ?>
</body>
</html>
<script>
    <?php
    if(isset($_GET['callback'])) {?>
    Materialize.toast('<?= html_entity_decode($_GET["callback"]) ?>', 5000);
    <?php }?>
</script>