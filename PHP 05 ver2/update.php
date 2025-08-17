<?php
require_once("funcs.php");
loginCheck();

$id = $_GET["id"] ?? '';
if (!$id) exit("ID指定がありません");

$pdo = db_conn();
$sql = "SELECT * FROM plans WHERE id = :id AND hotel_id = :hotel_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':hotel_id', $_SESSION["user_id"], PDO::PARAM_INT);
$status = $stmt->execute();

if ($status === false) {
  $error = $stmt->errorInfo();
  exit("SQL_ERROR: " . $error[2]);
}

$plan = $stmt->fetch();
if (!$plan) exit("データが見つかりません");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>宿泊プラン編集</title>
</head>
<body>
  <h1>宿泊プランの編集</h1>
  <form action="update_act.php" method="post">
    <input type="hidden" name="id" value="<?= htmlspecialchars($plan["id"]) ?>">
    プラン名：<input type="text" name="title" value="<?= htmlspecialchars($plan["title"]) ?>"><br>
    説明：<br><textarea name="description" rows="5" cols="40"><?= htmlspecialchars($plan["description"]) ?></textarea><br>
    料金（円）：<input type="number" name="price" value="<?= htmlspecialchars($plan["price"]) ?>"><br>
    利用開始日：<input type="date" name="available_from" value="<?= $plan["available_from"] ?>"><br>
    利用終了日：<input type="date" name="available_to" value="<?= $plan["available_to"] ?>"><br>
    <input type="submit" value="更新する">
  </form>
  <p><a href="select.php">▶︎ 一覧に戻る</a></p>
</body>
</html>
