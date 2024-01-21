<h1>Contato</h1>

<?=
    get("message");
?>

<form action="/pages/forms/contato.php" method="post" role="form">
    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Digite seu nome">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Digite seu email">
    </div>
    <div class="form-group">
        <label for="">Assunto</label>
        <input type="text" class="form-control" name="subject" placeholder="Digite o assunto">
    </div>
    <div class="form-group">
        <label for="">Mensagem</label>
        <textarea type="text" class="form-control" name="message" placeholder="Digite a mensagem">

        </textarea>
    </div>
    <button type="submit" class="btn bn-primary">Enviar</button>
</form>