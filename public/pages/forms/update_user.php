<?php
    include_once "../../../bootstrap.php";
    
    if(isEmpty()){
        flash("message","Preencha todos os campos");

        redirect("edit_user");
    }

    $validate = validate([
        'id' => 'i',
        'name' => 's',
        'email' => 'e',
        'last_name' => 's',
        'password' => 's',
    ]);

    $atualizado = update('users', $validate);

    if($atualizado){
        flash("message", "Atualizado com sucesso","success");

        
        return redirect("edit_user&id=".$validate->id);
    }

    flash("message", "Erro ao atualizar");

    redirect("edit_user&id=".$validate->id);