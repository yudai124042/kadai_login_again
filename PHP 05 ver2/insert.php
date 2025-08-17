<?php
require_once("funcs.php");
loginCheck();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="style.css">

  <meta charset="UTF-8">
  <title>宿泊プラン登録</title>
</head>
<body>
  <h1>宿泊プランの登録</h1>
  <form action="insert_act.php" method="post">
    プラン名：<input type="text" name="title"><br>
    説明：<br><textarea name="description" rows="5" cols="40"></textarea><br>
    料金（円）：<input type="number" name="price"><br>
    利用開始日：<input type="date" name="available_from"><br>
    利用終了日：<input type="date" name="available_to"><br>
    <input type="submit" value="登録する">
  </form>
  <p><a href="select.php">▶︎ 一覧に戻る</a></p>
</body>
</html>
