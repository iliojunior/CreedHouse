<?php

session_start();
include_once $caminhoInclude . "privado/users/UserUtil.php";

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
            if(!UserUtil::isLogado())
                $pg = "login/index.php";
            break;
        default:
            include_once "404.php";
            break;
    }
} else if (!UserUtil::isLogado()) { ?>
    <script>document.location = "?action=logar"</script>
<?php }  ?>