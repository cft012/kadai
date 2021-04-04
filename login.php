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

    <form action="login.act.php" method="post">
        <div class="jumbotron">
            <fieldset>
                <legend>ログイン認証</legend>
                    <!-- <label>ID: <input type="text" name="lid"></label><br>
                    <label>PW: <input type="text" name="lpw"></label><br>
                    <input type="submit" value="ログイン"> -->

                    <input class="input" type="text" name="lid" placeholder="ID">
                    <input class="input" type="text" name="lpw" placeholder="パスワード">
                    <button type="submit" class="button is-link" value="ログイン">ログイン</button>
            </fieldset>
        </div>
    </form>
    
</body>
</html>