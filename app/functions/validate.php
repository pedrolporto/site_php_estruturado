<?php

function validate(array $array){

    $validate = [];

    $request = request();

    foreach($array as $key => $type){

        switch($type){

            case 's':
                $validate[$key] = strip_tags($request[$key]);
                break;
            case 'i':
                $validate[$key] = filter_var($request[$key], FILTER_SANITIZE_NUMBER_INT);
                break;
            case 'e':
                $validate[$key] = filter_var($request[$key], FILTER_SANITIZE_EMAIL);
                break;
            default:
                break;
        };
    }

    return (object) $validate;
}