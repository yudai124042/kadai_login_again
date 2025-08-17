<?php
require_once("funcs.php");
loginCheck();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ホテル管理ダッシュボード</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>ダッシュボード</h1>
  <p>ようこそ、<?= htmlspecialchars($_SESSION["user_name"]) ?>さん</p>

  <ul>
    <li><a href="insert.php">▶︎ 新しい宿泊プランを登録する</a></li>
    <li><a href="select.php">▶︎ 登録済みのプラン一覧を見る</a></li>
    <li><a href="logout.php">▶︎ ログアウト</a></li>
  </ul>
</body>
</html>
