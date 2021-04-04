<?php
session_start();
include("funcs.php");
loginCheck();

$id          = $_POST['id'];
$u_name      = $_POST['u_name'];
$u_id        = $_POST['u_id'];
$u_pw        = $_POST['u_pw'];
$u_position  = $_POST['u_position'];
$life_flg    = $_POST['life_flg'];

try {
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
}catch (PDOException $e) {
    exit( 'DbConnectionError:'.$e->getMessage());
}

$sql = ' UPDATE gs_user_table SET u_name=:a1, u_id=:a2, u_pw=:a3, u_position=:a4, life_flg=:a5 WHERE id=:id ';
$stmt = $pdo->prepare($sql);

$stmt -> bindValue(':a1', $u_name, PDO::PARAM_STR);
$stmt -> bindValue(':a2', $u_id, PDO::PARAM_STR);
$stmt -> bindValue(':a3', $u_pw, PDO::PARAM_STR);
$stmt -> bindValue(':a4', $u_position, PDO::PARAM_STR);
$stmt -> bindValue(':a5', $life_flg, PDO::PARAM_STR);
$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt -> execute();

if($status ==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: user.read.php");
    exit;
}