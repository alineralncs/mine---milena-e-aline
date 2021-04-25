<?php

session_start();
$localhost = "localhost";
$user = "postgres";
$senha = "ciecmilena2001";
$dbname = "mine";
$porta = 5432;

global $pdo;
try{
    $pdo = new PDO("pgsql:host = $localhost; port = $porta; dbname = $dbname; user =  $user; password = $senha");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOExcepetion $e) {
    echo $e->getMessage();
}
