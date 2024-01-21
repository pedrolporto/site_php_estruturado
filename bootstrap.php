<?php

session_start();

// require_once "/var/www/html/PHP/projeto_php_1/app/functions/custom.php";
// require_once "/var/www/html/PHP/projeto_php_1/app/functions/validate.php";

// adiciona todos os arquivos pelo composer install
require_once "vendor/autoload.php";

//adiciona o .env
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();
