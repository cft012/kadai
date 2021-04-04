<?php

// Login認証チェック関数
function loginCheck(){
    if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id() ){
        echo "LOGIN Error!";
        header("Location: login.php");
    }else{
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}

function db_connect(){
    try {
        $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
        
    }catch (PDOException $e) {
        exit( 'DbConnectionError:'.$e->getMessage());
    }
    return $pdo;
}