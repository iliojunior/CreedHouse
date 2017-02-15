<?php
if (isset($_GET['id_user']) && !empty($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $findId = new FindById($id_user);
    $usuario = UsersCRUD::find($findId)->fetch();
}

$novoUsuario = !isset($usuario);
$id = ($novoUsuario ? 0 : $usuario['id_user']);
$key = $id;
$wordKey = "junior";
for ($i = 0; $i < strlen(UserUtil::WORD_KEY); $i++) {
    $key += ord(UserUtil::WORD_KEY[$i]);
}
?>
<div class="container">
    <div class="row">
        <h3><?= $novoUsuario ? "Novo Usu&aacute;rio" : $usuario['nome'] ?></h3>
    </div>
    <form action="?file=save.php&action=save" method="post" id="formulario-user">

        <input type="checkbox" id="is_ativo-field" name="is_ativo-field" vali
               checked="<?= ((!$novoUsuario || $usuario['is_ativo'] === 'Y') ? "checked" : "unchecked") ?>"/>
        <label for="is_ativo-field">Ativo</label>


        <input type="hidden" name="key" value="<?= $key ?>"/>
        <input type="hidden" name="id_user" value="<?= $id ?>"/>

        <div class="row"></div>

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
                       value=""/>
                <label for="login">Senha atual:</label>
            </div>

        </div>

        <div class="row" id="nova-senha">

            <div class="input-field col s12 m6 l6">
                <input id="nova-senha-field" name="nova-senha" type="text" class="validate"
                       value=""/>
                <label for="nova-senha-field">Nova senha:</label>
            </div>

            <div class="input-field col s12 m6 l6">
                <input id="confirm-nova-senha" name="confirm-nova-senha" type="password" class="validate"
                       value=""/>
                <label for="confirm-nova-senha">Repita a senha:</label>
            </div>

        </div>

        <div class="row">

            <div class="input-field col s12 m6 l6">
                <select name="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                </select>
                <label>Sexo:</label>
            </div>

            <div class="input-field col s12 m6 l6">
                <select name="nivel">
                    <option value="1">1 - Usu&aacute;rio</option>
                    <option value="2">2 - Administrador</option>
                </select>
                <label>N&iacute;vel:</label>
            </div>

        </div>

        <div class="row hide-on-med-and-up">

            <a class="waves-effect waves-teal btn-flat" href="<?= $CAMINHO ?>/controle">Cancelar</a>

            <button class="btn waves-effect waves-light right" type="submit" name="action">Salvar
                <i class="material-icons right">send</i>
            </button>

        </div>

    </form>
</div>
<script>
    $(document).ready(function () {
        $('select').material_select();

        $("#save-user").click(function () {
            $("#formulario-user").submit();
        });
    });
</script>
