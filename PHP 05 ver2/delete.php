<?php
require_once("funcs.php");
loginCheck();

$id = $_GET["id"] ?? '';
if (!$id) exit("ID指定がありません");

$pdo = db_conn();
$sql = "DELETE FROM plans WHERE id=:id AND hotel_id=:hotel_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$stmt->bindValue(":hotel_id", $_SESSION["user_id"], PDO::PARAM_INT);
$status = $stmt->execute();

if ($status) {
  header("Location: select.php");
  exit();
} else {
  $error = $stmt->errorInfo();
  exit("SQL_ERROR: " . $error[2]);
}
