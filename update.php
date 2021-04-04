<?php
session_start();
include("funcs.php");
loginCheck();

$id     = $_POST['id'];
$name   = $_POST['name'];
$url  = $_POST['url'];
$comment = $_POST['comment'];

try {
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
}catch (PDOException $e) {
    exit( 'DbConnectionError:'.$e->getMessage());
}

$sql = ' UPDATE gs_bm_table SET name=:name, url=:url, comment=:comment, indate=sysdate() WHERE id=:id ';
$stmt = $pdo->prepare($sql);

$stmt -> bindValue(':name', $name, PDO::PARAM_STR);
$stmt -> bindValue(':url', $url, PDO::PARAM_STR);
$stmt -> bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt -> execute();

if($status ==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: read.php");
    exit;
}