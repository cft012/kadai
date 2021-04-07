<?php
session_start();
$keyword = $_GET['keyword'];

try {
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
}catch (PDOException $e) {
    exit( 'DbConnectionError:'.$e->getMessage());
}

$sql = "SELECT * FROM gs_bm_table WHERE name=:keyword ";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(':keyword', $keyword);
$res = $stmt->execute();

if($res == false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    $val = $stmt->fetch();

    if( $val['id'] != "" ){
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["u_name"] = $val['u_name'];
        header("Location: research_result.php");
    }else{
        header("Location: login.php");
    }
}


?>