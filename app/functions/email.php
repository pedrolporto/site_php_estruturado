<?php

// function send($data){

//     $to = "";
//     $subject = $data->subject;
//     $message = $data->message;
//     $headers = "From: ".$data->email."\r \n".
//     " Reply-To: pedro@onixseven.com.br".
//     "X-Mailer: PHP/". phpversion();

//     return mail($to, $subject, $message, $headers);

// }

use PHPMailer\PHPMailer\PHPMailer;

function send(array $data){
    $email = new PHPMailer();
    
    $email->CharSet = 'UTF-8';
    // $email->SMTPSecure = 'ssl';
    $email->isSMTP();
    $email->Host = $_ENV['APP_EMAIL_HOST'];
    $email->Port = $_ENV['APP_EMAIL_PORT'];
    $email->SMTPAuth = true;
    $email->Username = $_ENV['APP_EMAIL_USERNAME'];
    $email->Password = $_ENV['APP_EMAIL_PWD'];
    $email->isHTML(true);
    $email->setFrom($_ENV['APP_EMAIL_FROM']);
    $email->FromName = $data['quem'];
    $email->addAddress($data['para']);
    $email->Body = $data['mensagem'];
    $email->Subject = $data['assunto'];
    $email->AltBody = 'Para ver este email, tenha certeza de estar vendo em um programa que aceita visualização HTML';
    $email->msgHTML($data['mensagem']);

    return $email->send();

}