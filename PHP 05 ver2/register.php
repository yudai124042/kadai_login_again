<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="style.css">

  <meta charset="UTF-8">
  <title>ユーザー登録</title>
</head>
<body>
  <h1>ユーザー登録フォーム</h1>
  <form action="register_act.php" method="post">
    名前：<input type="text" name="name"><br>
    ログインID：<input type="text" name="lid"><br>
    パスワード：<input type="password" name="lpw"><br>
    <input type="submit" value="登録">
  </form>
  <p><a href="login.php">ログインページへ</a></p>
</body>
</html>