<?php
require_once("funcs.php");
loginCheck();

$pdo = db_conn();
$hotel_id = $_SESSION["user_id"]; // ログインユーザーのID（＝ホテル）

// SQL：このユーザーの登録プランのみ取得
$sql = "SELECT * FROM plans WHERE hotel_id = :hotel_id ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':hotel_id', $hotel_id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status === false) {
  $error = $stmt->errorInfo();
  exit("SQL_ERROR: " . $error[2]);
} else {
  $plans = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>宿泊プラン一覧</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <h1>宿泊プラン一覧</h1>
  <p><a href="insert.php">▶︎ 新規プランを登録する</a> | <a href="logout.php">ログアウト</a></p>

  <table border="1" cellpadding="8">
    <tr>
      <th>ID</th>
      <th>プラン名</th>
      <th>料金</th>
      <th>利用可能日</th>
      <th>操作</th>
    </tr>
    <?php foreach($plans as $plan): ?>
      <tr>
        <td><?= htmlspecialchars($plan["id"]) ?></td>
        <td><?= htmlspecialchars($plan["title"]) ?></td>
        <td><?= number_format($plan["price"]) ?>円</td>
        <td><?= htmlspecialchars($plan["available_from"]) ?>〜<?= htmlspecialchars($plan["available_to"]) ?></td>
        <td>
          <a href="update.php?id=<?= $plan["id"] ?>">編集</a> |
          <a href="delete.php?id=<?= $plan["id"] ?>" onclick="return confirm('本当に削除しますか？');">削除</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
