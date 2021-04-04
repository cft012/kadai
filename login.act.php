<?php
session_start();
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

try {
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
}catch (PDOException $e) {
    exit( 'DbConnectionError:'.$e->getMessage());
}

$sql = "SELECT * FROM gs_user_table WHERE u_id=:lid AND u_pw=:lpw ";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(':lid', $lid);
$stmt -> bindValue(':lpw', $lpw);
$res = $stmt->execute();

if($res == false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    $val = $stmt->fetch();

    if( $val['id'] != "" ){
        $_SESSION["chk_ssid"] = session_id();
        $_SESSION["u_name"] = $val['u_name'];
        header("Location: read.php");
    }else{
        header("Location: login.php");
    }
}

exit();
?>