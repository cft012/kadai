<?php

if(
    !isset($_POST["name"]) || $_POST["name"] =="" ||
    !isset($_POST["url"]) || $_POST["url"] =="" ||
    !isset($_POST["comment"]) || $_POST["comment"] ==""
){
    exit('ParamError');
}

// 1. POSTデータ取得
$name = $_POST["name"];
$url = $_POST["url"];
$comment = $_POST["comment"];

// ファイル関連の取得
$file = $_FILES["image"];
$filename = basename($file["name"]);
$tmp_path = $file["tmp_name"];
$file_err = $file["error"];
$filesize = $file["size"];
$upload_dir = 'images/';
$save_filename = date('YmdHis') . $filename;
$save_path = $upload_dir . $save_filename;

// ファイルのバリデーション
// ファイルサイズは1MB未満かどうか
if($filesize > 1048576 || $file_err == 2){
    echo 'ファイルサイズは1MB未満にしてください。';
}

// 拡張子は画像形式か
$allow_ext = array('jpg', 'jpeg', 'png');
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array(strtolower($file_ext), $allow_ext)){
    echo '画像ファイルをアップロードしてください' . "<br>";
}

// ファイルがあるか
if (is_uploaded_file($tmp_path)){
    if(move_uploaded_file($tmp_path, $upload_dir.$save_filename)){
        echo $filename . 'をアップしました';
    }else{
        echo 'ファイルが保存できませんでした。' . "<br>";
    }
}else{
    echo 'ファイルが選択されていません。' . "<br>";
}

// 2. DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
}catch (PDOException $e) {
    exit( 'DbConnectionError:'.$e->getMessage());
}

// 3.データ登録SQL作成
$sql = "INSERT INTO gs_bm_table( id, name, url, comment, file_name, file_path, indate )
VALUES (NULL, :a1, :a2, :a3, :a4, :a5, sysdate())";

$stmt = $pdo->prepare($sql);

$stmt -> bindValue(':a1', $name, PDO::PARAM_STR);
$stmt -> bindValue(':a2', $url, PDO::PARAM_STR);
$stmt -> bindValue(':a3', $comment, PDO::PARAM_STR);
$stmt -> bindValue(':a4', $filename, PDO::PARAM_STR);
$stmt -> bindValue(':a5', $save_path, PDO::PARAM_STR);
$status = $stmt -> execute();

// 4.データ登録処理後
if($status ==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location:read.php");
    exit;
}

?>