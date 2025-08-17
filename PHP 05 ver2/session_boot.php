<?php
// セッションを開始（名前は任意）
session_name('HOTELSESS');
session_start();

// ここだけで「維持」を実現：無操作30分で自動ログアウト
$IDLE_LIMIT = 60 * 30; // ←テスト時は 60 にすると1分で確認しやすい

if (isset($_SESSION['LAST_ACTIVITY']) && time() - $_SESSION['LAST_ACTIVITY'] > $IDLE_LIMIT) {
  // セッション破棄 → ログインへ
  $_SESSION = [];
  session_destroy();
  header('Location: login.php?msg=timeout');
  exit;
}

// 最終アクセス時刻を更新
$_SESSION['LAST_ACTIVITY'] = time();
