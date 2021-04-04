<?php
// session_start();
// include("funcs.php");

if(
    !isset($_POST["u_name"]) || $_POST["u_name"] =="" ||
    !isset($_POST["u_id"]) || $_POST["u_id"] =="" ||
    !isset($_POST["u_pw"]) || $_POST["u_pw"] =="" ||
    !isset($_POST["u_status"]) || $_POST["u_status"] ==""
){
    exit('ParamError');
}


// POSTデータ取得
$u_name = $_POST["u_name"];
$u_id = $_POST["u_id"];
$u_pw = $_POST["u_pw"];
$u_status = $_POST["u_status"];


// DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
}catch (PDOException $e) {
    exit( 'DbConnectionError:'.$e->getMessage());
}


// データ登録SQL作成
$sql = "INSERT INTO gs_user_table( id, u_name, u_id, u_pw, u_status, life_flg, indate )
VALUES ( NULL, :a1, :a2, :a3, :a4, 1, sysdate() )";

$stmt = $pdo->prepare($sql);

$stmt -> bindValue(':a1', $u_name, PDO::PARAM_STR);
$stmt -> bindValue(':a2', $u_id, PDO::PARAM_STR);
$stmt -> bindValue(':a3', $u_pw, PDO::PARAM_STR);
$stmt -> bindValue(':a4', $u_status, PDO::PARAM_INT);
$status = $stmt -> execute();


// データ登録処理後
if($status ==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location:login.php");
    exit;
}

?>