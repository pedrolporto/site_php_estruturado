<?php

function connect(){
    $pdo = new PDO("{$_ENV['APP_DB_DRIVE']}:host={$_ENV['APP_DB_HOST']};dbname={$_ENV['APP_DB_NAME']}","{$_ENV['APP_DB_USER']}","{$_ENV['APP_DB_PWD']}");

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}

function create($table, $fields){

    if(!is_array($fields)){
        $fields = (array) $fields;
    }

    $sql = "INSERT INTO {$table}";

    $sql .= "(".implode(',',array_keys($fields)).") ";

    // $sql .= " VALUES(".implode(',',array_values($fields));

    $sql .= " VALUES(:".implode(',:',array_keys($fields)).");";

    $pdo = connect();

    $insert = $pdo->prepare($sql);

    return $insert->execute($fields);

}

function all($table){

    $sql = "SELECT * FROM {$table}";

    $pdo = connect();

    $list = $pdo->prepare($sql);

    $list->execute();

    return $list->fetchAll();

}

function update($table,$fields){

    if(!is_array($fields)){
        $fields = (array) $fields;
    }

    $id = array_key_first($fields)." = ".$fields[array_key_first($fields)];

    // Forma 1
    // $sql = "UPDATE {$table} ".
    //     "SET (".implode(',',array_keys($fields)).") = (:".implode(',:',array_keys($fields)).") ".
    //     "WHERE id = {$fields["id"]}";

    $init_field = $fields;

    $fields = array_map(function($field){

        return "{$field} = :{$field}";

    },array_keys($fields));

    $sql = "UPDATE {$table} SET ";

    $sql .= implode(', ',$fields);

    $sql .= " WHERE {$id}";

    $pdo = connect();
    
    $update = $pdo->prepare($sql);

    $update->execute($init_field);

    return $update->rowCount();
}

function find($table,$field,$value){

    $pdo = connect();

    $sql = "SELECT * FROM {$table} WHERE {$field} = :{$field}";

    $find = $pdo->prepare($sql);

    $value = filter_var($value,FILTER_SANITIZE_NUMBER_INT);

    $find->bindValue($field,$value);

    $find->execute();

    return $find->fetch();
}

function delete($table,$field,$id){

    $pdo = connect();

    $sql = "DELETE FROM {$table} WHERE {$field} = {$id}";

    $delete = $pdo->prepare($sql);

    $delete->execute();

    return $delete->rowCount();

}