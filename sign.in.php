<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="title_container">
            <p class="title is-1 is-spaced">Book Database</p>
        </div>
    </header>

    <form class="post_form" method="post" action="registration.php">

        <div class="jumbotron">
            <fieldset>
                <legend>ユーザー登録</legend>
                        <p>名前</p><input class="input" type="text" name="u_name" placeholder="名前">
                        <p>ID</p><input class="input" type="text" name="u_id" placeholder="ID">
                        <p>パスワード</p><input class="input" type="text" name="u_pw" placeholder="パスワード">
                        <p>役職</p><input class="input" type="text" name="u_position" placeholder="役職">
                        <input class="" type="hidden" name="life_flg" value=1>
                        <button type="submit" class="button is-link" value="送信">送信</button>
             </fieldset>
        </div>

    </form>

    <a href="login.php">すでに登録済みの方</a>
    
</body>
</html>
