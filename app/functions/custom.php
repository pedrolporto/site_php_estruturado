<?php

function dd($dump){
    var_dump($dump);
    die;
}

function request(){
    $request = $_SERVER["REQUEST_METHOD"];

    if($request == "POST"){
        return $_POST;
    } else {
        return $_GET;
    }

}

function isEmpty(){

    $request = request();

    $empty = false;

    foreach($request as $key => $value){
        if(empty($value)){
            $empty = true;
        }
    }

    return $empty;
}

function redirect($target){

    return header("location:/?page={$target}");

}

function redirectToHome(){

    return header("location:/");

}