<table class="responsive-table">
    <thead>
    <tr>
        <th data-field="id">Id</th>
        <th data-field="nome">Nome</th>
        <th data-field="email">Email</th>
        <th data-field="nivel">N&iacute;vel</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $resultado = UsersCRUD::find(FindAllAtivo::getInstance())->fetchAll();
    foreach ($resultado as $usuario) {
        ?>
        <tr>
            <td><?= $usuario['id_user'] ?></td>
            <td><?= $usuario['nome'] ?></td>
            <td><?= $usuario['email'] ?></td>
            <td><?= $usuario['nivel'] ?></td>
            <td><a class='dropdown-button waves-effect waves-teal btn-flat' href='#'
                   data-activates='dropdown-<?= $usuario['id_user'] ?>'><i class="material-icons">settings</i></a></td>
        </tr>
        <ul class="dropdown-content" id="dropdown-<?= $usuario['id_user'] ?>">
            <li><a href="<?= $CAMINHO ?>/controle/?file=usuario.php&id_user=<?= $usuario['id_user'] ?>">Edit</a></li>
            <li><a href="<?= $CAMINHO ?>/controle/?file=delete.php&id_user=<?= $usuario['id_user'] ?>">Delete</a></li>
        </ul>
        <?php
    }
    ?>
    </tbody>
</table>