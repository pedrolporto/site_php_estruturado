<a class="btn btn-warning" href="?page=create_user">Cadastrar Usuário</a>

<h1>Página inicial</h1>

<?=
    get("message");
?>

<table class="table">
    <thead class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Sobrenome</th>
            <th></th>
            <th></th>
        </tr>
    </thead>

    <tbody>
    <?php
        $users = all('users');

        foreach($users as $user):
    ?>
        <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->name; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->last_name; ?></td>
            <td><a href="?page=edit_user&id=<?= $user->id; ?>" class="btn btn-info">Editar</a></td>
            <td><a href="?page=delete_user&id=<?= $user->id; ?>" class="btn btn-danger">Deletar</a></td>
        </tr>
    <?php
        endforeach;
    ?>
    </tbody>
</table>

