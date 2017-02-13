<?php

session_start();
include_once $caminhoInclude . "privado/users/UserUtil.php";
include_once $caminhoInclude . "privado/geral/IFindable.php";


function include_all_php($folder)
{
    foreach (glob("{$folder}/*.php") as $filename) {
        include $filename;
    }
}

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "sair":
            session_destroy();
            session_unset();
            unset($_SESSION['id_user']);
            unset($_SESSION['login']);
            unset($_SESSION['email']);
            unset($_SESSION['nome']);
            unset($_SESSION['nivel']);
            echo "<script>document.location = \"?action=logar\"</script>";
            break;
        case "logar":
            if (!UserUtil::isLogado())
                $pg = "login/index.php";
            break;
        default:
            break;
    }
} else if (!UserUtil::isLogado()) { ?>
    <script>document.location = "?action=logar"</script>
<?php } ?>