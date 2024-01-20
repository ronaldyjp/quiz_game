<?php
    header("Access-Control-Allow-Origin: *"); //CORSのエラー対策
    header('Content-Type: application/json; charset=UTF-8');

    $dsn = "mysql:host=127.0.0.1;dbname=quiz_game;charset=utf8";
    $user = 'root';
    $password = ''; 

    $dbh = new PDO($dsn, $user, $password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>