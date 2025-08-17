<?php
session_start();
require_once("funcs.php");

$name = $_POST["name"] ?? '';
$lid  = $_POST["lid"] ?? '';
$lpw  = $_POST["lpw"] ?? '';

// 未入力チェック
if ($name === '' || $lid === '' || $lpw === '') {
  exit('未入力の項目があります');
}

// DB接続
$pdo = db_conn();

// SQL実行
$sql = "INSERT INTO users(name, lid, lpw) VALUES(:name, :lid, :lpw)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', password_hash($lpw, PASSWORD_DEFAULT), PDO::PARAM_STR);
$status = $stmt->execute();

if ($status) {
  header("Location: login.php");
  exit();
} else {
  $error = $stmt->errorInfo();
  exit("SQL_ERROR: " . $error[2]);
}

// login_act.php の最後
header("Location: dashboard.php");
