<?php
require_once('funcs.php');  // ← これで session_boot も読み込まれる

$lid = $_POST['lid'] ?? '';
$lpw = $_POST['lpw'] ?? '';

$pdo = db_conn();
$sql = 'SELECT * FROM users WHERE lid = :lid';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->execute();
$user = $stmt->fetch();

if ($user && password_verify($lpw, $user['lpw'])) {
  // ★ 認証成功：ここからが“必須の追記”
  session_regenerate_id(true);
  $_SESSION['chk_ssid']  = session_id();
  $_SESSION['user_id']   = $user['id'];
  $_SESSION['user_name'] = $user['name'];
  $_SESSION['LAST_ACTIVITY'] = time();

  header('Location: dashboard.php'); // お好みで
  exit;
} else {
  exit('ログイン失敗');
}
