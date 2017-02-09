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
    $caminhoInclude = "../../";
    include_once $caminhoInclude . "privado/users/UsersCRUD.php";
    include_once $caminhoInclude . "privado/users/findables/findByLoginAndPass.php";
    include_once $caminhoInclude . "privado/users/findables/findByLoginOrEmail.php";

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $findLogin = new findByLoginOrEmail($login);

    $resultado = UsersCRUD::find($findLogin)->fetchAll();
    if ($resultado) {
        $findUsuario = new findByLoginAndPass($resultado['id_user'], $senha);
        $resultadoUser = UsersCRUD::find($findUsuario)->fetchAll();
        if ($resultadoUser) {
            session_start();

            $user = $retornoValidade->fetch();
            $_SESSION['login'] = $resultadoUser['login'];
            $_SESSION['nome'] = $resultadoUser['nome'];
            $_SESSION['email'] = $resultadoUser['email'];
            $_SESSION['nivel'] = $resultadoUser['nivel'];

            header("location: $caminhoInclude/controle/");
        } else {
            echo "<script>document.getElementById('password').classList.add('invalid')</script>";
        }

    } else {
        echo "<script>document.getElementById('login').classList.add('invalid')</script>";
    }
}
?>
</body>
<!--<script>
    jQuery.fn.invalid = function () {
        $(this).addClass("invalid");
    }
</script>-->
</html>
