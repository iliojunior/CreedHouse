<table class="responsive-table">
    <thead>
    <tr>
        <th data-field="id">Id</th>
        <th data-field="nome">Nome</th>
        <th data-field="email">Email</th>
        <th data-field="nivel">N&iacute;vel</th>
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
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>