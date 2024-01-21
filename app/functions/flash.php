<?php

function flash($type, $message, $category="danger"){

    if(!isset($_SESSION['flash'][$type])){
        $_SESSION['flash'][$type] = "<span class=\"alert alert-{$category}\">".$message."</span>";
    }

}

function get($type){

    if(isset($_SESSION['flash'][$type])){

        $message = $_SESSION['flash'][$type];

        unset($_SESSION['flash'][$type]);

    }

    return $message ?? '';

}