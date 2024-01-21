<?php
    include_once "../../../bootstrap.php";
    
    if(isEmpty()){
        flash("message","Preencha todos os campos");

        redirect("create_user");
    }

    $validate = validate([
        'name' => 's',
        'email' => 'e',
        'last_name' => 's',
        'password' => 's',
    ]);

    $cadastrado = create('users', $validate);

    if($cadastrado){
        flash("message", "Cadastrado com sucesso","success");

        return redirect("create_user");
    }

    flash("message", "Erro ao cadastrar");

    redirect("create_user");