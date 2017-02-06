<?php
if ($_POST) {
    $caminhoInclude = "../../";
    include_once $caminhoInclude . "/privado/users/UsersCRUD.php";
    include_once $caminhoInclude . "/privado/users/findables/findByLoginAndPass.php";

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $findLogin = new findByLoginAndPass($login, $senha);

    $retornoValidade = UsersCRUD::find($findLogin)->fetchAll();

    if (count($retornoValidade) > 0) {
        start_session();

        $user = $retornoValidade->fetch();
        $_SESSION['login'] = $retornoValidade['login'];
        $_SESSION['nome'] = $retornoValidade['nome'];
        $_SESSION['nivel'] = $retornoValidade['nivel'];
    } else {
        header("location: index.php?msg=Usuário e/ou senha inválido(s)");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acesso</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="login">
        <div class="row ">
            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-11 centered">
                <?php if (isset($_GET['msg']) && $_GET['msg'] != "") { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×
                        </button>
                        <h4>
                            Erro!
                        </h4> <strong>Atenção!</strong> <?= $_GET['msg'] ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-11 centered">
                <h3 class="text-center text-primary">
                    Acesso
                </h3>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-4 col-md-4 col-sm-8 col-xs-11 centered">
                <div class="row">
                    <form role="form" action="" method="post">
                        <div class="form-group">

                            <label for="login">
                                Login
                            </label>
                            <input type="text" class="form-control" id="login" name="login">
                        </div>
                        <div class="form-group">

                            <label for="senha">
                                Senha
                            </label>
                            <input type="password" class="form-control" id="senha" name="senha">
                        </div>

                        <button type="submit" class="btn btn-primary pull-right">
                            Logar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
