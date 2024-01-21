<?php
    
    $user = find("users","id",$_GET["id"]);

?>

<?=
    get("message");
?>

<form action="/pages/forms/update_user.php" method="POST" role="form">
    <legend>Editar Usuário</legend>

    <input name="id" type="hidden" value="<?= $user->id ?>">

    <div class="form-group">
        <label for="name">Nome
            <input type="text" class="form-control" name="name" placeholder="Digite o nome" value="<?= $user->name ?>">
        </label>
    </div>

    <div class="form-group">
        <label for="last_name">Sobrenome
            <input type="text" class="form-control" name="last_name" placeholder="Digite o sobrenome" value="<?= $user->last_name ?>">
        </label>
    </div>

    <div class="form-group">
        <label for="email">Email
            <input type="text" class="form-control" name="email" placeholder="Digite o email" value="<?= $user->email ?>">
        </label>
    </div>

    <div class="form-group">
        <label for="password">Password
            <input type="password" class="form-control" name="password" placeholder="Digite a senha" value="<?= $user->password ?>">
        </label>
    </div>

    <button type="submit" class="btn bn-primary btn-success">Editar</button>
</form>