<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

try {
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
}catch (PDOException $e) {
    exit( 'DbConnectionError:'.$e->getMessage());
}

$sql = "SELECT * FROM gs_user_table WHERE u_id=:id AND life_flg=1";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(':id', $lid, PDO::PARAM_STR);
$res = $stmt->execute();

if($res == false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    $val = $stmt->fetch();

    // if( $lpw === $val['u_pw'] ){
    if( password_verify($lpw, $val["u_pw"])){
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["u_name"] = $val['u_name'];
        header("Location: index.php");
    }else{
        header("Location: login.php");
    }
}