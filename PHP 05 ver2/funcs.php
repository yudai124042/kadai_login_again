<?php
// すべてのページでセッションを共通起動
require_once(__DIR__ . '/session_boot.php');

function db_conn(){
  $dbname = '';
  $host   = ''; // ※ ここ重要！
  $user   = '';
  $pass   = '';

  try {
    return new PDO("mysql:dbname=$dbname;charset=utf8;host=$host", $user, $pass);
  } catch (PDOException $e) {
    exit('DB_CONNECT:' . $e->getMessage());
  }
}

// 最小実装：未ログインならログイン画面へ
function loginCheck(){
  if (empty($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] !== session_id()) {
    header('Location: login.php?msg=login_required');
    exit;
  }
}

function redirect($file){
  header("Location: $file");
  exit();
}
