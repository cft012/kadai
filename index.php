<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/read.css">
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
    <form action="search_result.php" method="get">
        <div class="jumbotron">
            <fieldset>
                <input class="input" type="text" name="keyword" placeholder="検索したい本">
                <button type="submit" class="button is-link" value="検索">検索</button>
            </fieldset>
        </div>
    </form>
    
</body>
</html>