<?php
if ($_GET['action'] === "save" && $_POST) {
    $id_user = $_POST['id_user'];
    $key = $_POST['key'];
    try {

        validarUsuario($id_user, $key);

        $senha = $_POST['senha'];
        $novaSenha = $_POST['nova-senha'];
        $confirmNovaSenha = $_POST['confirm-nova-senha'];

        $userToSave = new SaveUser();
        $userToSave->setIdUser($id_user);
        $userToSave->setEmail($_POST['email']);
        $userToSave->setIsAtivo($_POST['is_ativo-field']);
        $userToSave->setNivel($_POST['nivel']);
        $userToSave->setNome($_POST['nome']);
        $userToSave->setSexo($_POST['sexo']);

        if ($senha != '') {
            $findUser = new FindByLoginAndPass($id_user, $senha);
            $user = UsersCRUD::find($findUser)->fetch(PDO::FETCH_ASSOC);
            if (count($user) <= 0)
                throw new Exception("Pass incorrect!");
            if ($novaSenha != $confirmNovaSenha)
                throw new Exception("Passwords don't match!");
            if ($novaSenha === $senha)
                throw new Exception("Enter a different password");
            if ($userToSave->isNewRecord())
                $userToSave->setSenha($senha);
            else
                $userToSave->setSenha($novaSenha);
        }

        $userToSave->setLogin($_POST['login']);

        $usuarioSalvo = UsersCRUD::save($userToSave);

        if ($usuarioSalvo) {
            ?>
            <script>
                window.location="<?= $CAMINHO ?>/controle?callback=Usuário salvo com sucesso";
            </script>
        <?php }
    } catch (Exception $e) {
        include_once "500.php";
        echo "Erro: " . $e->getMessage();
    }
}
?>