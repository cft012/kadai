<?php

$id = $_GET['id'];

try {
    $pdo = new PDO('mysql:dbname=gs_kadai;charset=utf8;host=localhost', 'root', 'root');
}catch (PDOException $e) {
    exit( 'DbConnectionError:'.$e->getMessage());
}

$sql = "SELECT * FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status ==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <title>Document</title>
</head>
<body>
    <form method="post" action="user.update.php">
        <p>名前:<input type="text" name="u_name" size="20" value="<?= $row['u_name'] ?>"></p>
        <p>ID:<input type="text" name="u_id" size="20" value="<?= $row['u_id'] ?>"></p> 
        <p>パスワード:<input type="text" name="u_pw" size="20" value="<?= $row['u_pw'] ?>"></p>
        <p>役職:<input type="text" name="u_position" size="20" value="<?= $row['u_position'] ?>"></p>
        <p>ステータス:<input type="text" name="life_flg" size="20" value="<?= $row['life_flg'] ?>"></p>
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <input type="submit" value="送信">
    </form>
</body>
</html>