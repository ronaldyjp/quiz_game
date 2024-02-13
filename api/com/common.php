<?php
    header("Access-Control-Allow-Origin: *"); //CORSのエラー対策
    header('Content-Type: application/json; charset=UTF-8');
    $default = [
        "dsn" =>"mysql:host=mysql712.db.sakura.ne.jp;dbname=familyline_asjas;charset=utf8",
        "user" => 'familyline',
        "password" => 'sole2628'
    ];
    $default_local = [
        "dsn" => "mysql:host=127.0.0.1;dbname=quiz_game;charset=utf8",
        "user" => 'root',
        "password" => ''
    ];

    $dbh = new PDO($default['dsn'], $default['user'], $default['password']);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>