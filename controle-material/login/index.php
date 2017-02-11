<!DOCTYPE html>
<html>
<head>
    <title>Acesso</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="<?=$caminhoInclude?>controle-material/login/style.css">
=======
    <link rel="stylesheet" href="<?= $caminhoInclude ?>controle-material/login/style.css">
>>>>>>> bcffcef4c57678219c87c849df23773303df311f
</head>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
<body class="teal lighten-4">
<div class="container valign-wrapper">
    <div class="card-login centered-div">
        <div class="row ">
            <div class="card hoverable">
                <form action="#" method="post">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h5 class="card-title center-align teal-text text-darken-1">Acesso</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="login" name="login" type="text"
                                       class="validate">
                                <label for="login" data-error="Usu&aacute;rio Inv&aacute;lido">Login / Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" name="senha" class="validate">
                                <label for="password" data-error="Senha Incorreta">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn waves-effect waves-light right" type="submit" name="action">Entrar
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
if ($_POST) {
    include_once $caminhoInclude . "privado/users/UsersCRUD.php";
    include_once $caminhoInclude . "privado/users/findables/FindByLoginAndPass.php";
    include_once $caminhoInclude . "privado/users/findables/FindByLoginOrEmail.php";

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $findLogin = new findByLoginOrEmail($login);

    $resultado = UsersCRUD::find($findLogin)->fetch();
    if ($resultado) {
<<<<<<< HEAD

        if (count($resultado) > 1)
            $findUsuario = new findByLoginAndPass($login, $senha);
        else
            $findUsuario = new findByLoginAndPass($resultado[0]['id_user'], $senha);

=======
        if (count($resultado) == 1)
            $findUsuario = new findByLoginAndPass($resultado['id_user'], $senha);
        else
            $findUsuario = new findByLoginAndPass($login, $senha);
>>>>>>> bcffcef4c57678219c87c849df23773303df311f
        $resultadoUser = UsersCRUD::find($findUsuario)->fetch();
        if ($resultadoUser) {
            session_start();

            $_SESSION['login'] = $resultadoUser['login'];
            $_SESSION['nome'] = $resultadoUser['nome'];
            $_SESSION['email'] = $resultadoUser['email'];
            $_SESSION['nivel'] = $resultadoUser['nivel'];

<<<<<<< HEAD
            header("location: ".$caminhoInclude."controle-material/");
=======
            header("location: " . $caminhoInclude . "controle-material/");
>>>>>>> bcffcef4c57678219c87c849df23773303df311f
        } else {
            echo "<script>document.getElementById('password').classList.add('invalid')</script>";
        }

    } else {
        echo "<script>document.getElementById('login').classList.add('invalid')</script>";
    }
}
?>
</body>
</html>
