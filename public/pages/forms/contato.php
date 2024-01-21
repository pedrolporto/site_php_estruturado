<?php
    include_once "../../../bootstrap.php";
    
    if(isEmpty()){
        flash("message","Preencha todos os campos");

        redirect("contato");
    }

    $validate = validate([
        'name' => 's',
        'email' => 'e',
        'subject' => 's',
        'message' => 's',
    ]);

    $data = [
        'quem'=>$validate->name
        ,'para'=>$_ENV['APP_EMAIL_FROM']
        ,'mensagem'=>$validate->message
        ,'assunto'=>$validate->subject
    ];

    if(send($data)){
        flash('message',"Email enviado com sucesso",'success');
    } else {
        flash('message','Não foi possível enviar o email de contato. Tente novamente.');
    }

    redirect("contato");

    // var_dump($validate->email);die;

















?>