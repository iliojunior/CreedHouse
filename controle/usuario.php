<div class="container">
    <?php
    if (isset($_GET['id_user']) && !empty($_GET['id_user'])) {
        $id_user = $_GET['id_user'];
        $findId = new FindById($id_user);
        $usuario = UsersCRUD::find($findId)->fetch();
    }

    $novoUsuario = !isset($usuario);
    ?>
    <div class="row">
        <h3><?= $novoUsuario ? "Novo Usu&aacute;rio" : $usuario['nome'] ?></h3>
    </div>
    <form action="?action=save" method="post">
        <div class="row">
            <div class="input-field col s12 m6 l6">
                <input id="nome" name="nome" type="text" class="validate"
                       value="<?= $novoUsuario ? "" : $usuario['nome'] ?>"/>
                <label for="nome">Nome Completo:</label>
            </div>
            <div class="input-field col s12 m6 l6">
                <input id="email" name="email" type="email" class="validate"
                       value="<?= $novoUsuario ? "" : $usuario['email'] ?>"/>
                <label for="email">Email:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6 l6">
                <input id="login" name="login" type="text" class="validate"
                       value="<?= $novoUsuario ? "" : $usuario['login'] ?>"/>
                <label for="login">Login:</label>
            </div>
            <div class="input-field col s12 m6 l6">
                <input id="senha" name="senha" type="password" class="validate"
                       value="<?= $novoUsuario ? "" : $usuario['senha'] ?>"/>
                <label for="login">Senha:</label>
            </div>
        </div>
        <div class="row" id="nova-senha">
            <div class="input-field col s12 m6 l6">
                <input id="login" name="login" type="text" class="validate"
                       value="<?= $novoUsuario ? "" : $usuario['login'] ?>"/>
                <label for="login">Nova senha:</label>
            </div>
            <div class="input-field col s12 m6 l6">
                <input id="senha" name="senha" type="password" class="validate"
                       value="<?= $novoUsuario ? "" : $usuario['senha'] ?>"/>
                <label for="login">Repita a senha:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6 m6 l12">
                <input id="nome" name="nome" type="text" class="validate"
                       value="<?= $novoUsuario ? "" : $usuario['nome'] ?>"/>
                <label for="nome">Nome Completo:</label>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {

    });
</script>