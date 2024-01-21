<?php
    include_once "../../../bootstrap.php";

    $validate = validate([
        'id' => 'i'
    ]);

    $delete = delete('users', "id",$validate->id);

    if($delete){
        flash("message", "Removido com sucesso","success");

        return redirectToHome();
    }

    flash("message", "Erro ao remover");

    redirectToHome();