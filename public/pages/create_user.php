<?=
    get("message");
?>

<form action="/pages/forms/create_user.php" method="POST" role="form">
    <legend>Cadastrar Usuário</legend>

    <div class="form-group">
        <label for="">Nome
            <input type="text" class="form-control" name="name" placeholder="Digite o nome">
        </label>
    </div>

    <div class="form-group">
        <label for="">Sobrenome
            <input type="text" class="form-control" name="last_name" placeholder="Digite o sobrenome">
        </label>
    </div>

    <div class="form-group">
        <label for="">Email
            <input type="text" class="form-control" name="email" placeholder="Digite o email">
        </label>
    </div>

    <div class="form-group">
        <label for="">Password
            <input type="password" class="form-control" name="password" placeholder="Digite a senha">
        </label>
    </div>

    <button type="submit" class="btn bn-primary btn-success">Cadastrar</button>
</form>