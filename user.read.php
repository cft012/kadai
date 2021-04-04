<?php
session_start();
include("funcs.php");
loginCheck();

function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

$pdo = db_connect();

$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

if($status ==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    $view .= "<table border=1>";
    $view .= "<th>ID</th>";
    $view .= "<th>NAME</th>";
    $view .= "<th>STATUS</th>";
    $view .= "<th></th>";
    $view .= "<th>DATE</th>";
    $view .= "<th>DELETE</th>";

    
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
        // Selectデータの数だけ自動でループしてくれる
        $view .= "<tr>" ;
        $view .= "<td>" . '<a href="view.php?id=' . $result["id"]. '">'. h($result["id"]) . "</td>" ;
        $view .= "<td>" . h($result["name"]) . "</td>" ;
        $view .= "<td>" . h($result["url"]) . "</td>" ;
        $view .= "<td>" . h($result["comment"]) . "</td>" ;
        $view .= "<td>" . h($result["file_path"]) . "</td>" ;
        $view .= "<td>" . h($result["indate"]) . "</td>" ;
        $view .= "<td>" . '<a href="delete.php?id=' . $result["id"]. '">'. '[削除]' . "</td>";
        $view .= "</tr>" ;   
    }
    $view .= "</table>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/read.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="header_wrapper">
            <div class="title_container">
                <p class="title is-1 is-spaced">Book Database</p>
            </div>
            <div class="nav_container">
                <div class="user_read_box">
                    <a class="user_list" href="user.read.php">ユーザーリスト</a>
                </div>
                <div class="registration_box">
                    <a class="registration" href="post.php">データの登録</a>
                </div>
                <div class="logout_box">
                    <a class="logout" href="logout.php">ログアウト</a>
                </div>
            </div>
        </div>
    </header>

    <div class="container jumbotron"><?=$view?></div>
</body>
</html>
