<?php
session_start();
include("funcs.php");
loginCheck();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/read.css">
    <title>Bookmark</title>
</head>
<body>
    <header>
        <div class="header_wrapper">
            <div class="title_container">
                <p class="title is-1 is-spaced">Book Database</p>
            </div>
            <div class="nav_container">
                <div class="read_box">
                    <a class="data_list" href="read.php">データリスト</a>
                </div>
                <div class="read_user_box">
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

    <form class="post_form" enctype="multipart/form-data" method="post" action="write.php">

        <p>書籍名</p><input class="input" type="text" name="name" placeholder="書籍名">
        <p>書籍URL</p><input class="input" type="text" name="url" placeholder="書籍URL">
        <p>書籍コメント</p><input class="input" type="text" name="comment" placeholder="書籍コメント">
        <div>
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
            <p>商品写真</p><input class="input" type="file" name="image" accept="image/*">
        </div>
        <button type="submit" class="button is-link" value="送信">送信</button>

    </form>
    
</body>
</html>