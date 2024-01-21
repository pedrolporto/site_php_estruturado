<?php

function load(){
    $page = strip_tags($_GET["page"]);

    $page = (!$page) ? 'pages/home.php' : "pages/{$page}.php";

    // var_dump($page);

    if(!file_exists($page)){
        throw new \Exception("Hum, parece que não existe essa página.");
    }

    return $page;
}

?>