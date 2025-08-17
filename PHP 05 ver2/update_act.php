<?php
session_start();
require_once("funcs.php");
loginCheck();

$id = $_POST["id"] ?? '';
$title = $_POST["title"] ?? '';
$description = $_POST["description"] ?? '';
$price = $_POST["price"] ?? '';
$from = $_POST["available_from"] ?? '';
$to = $_POST["available_to"] ?? '';
$hotel_id = $_SESSION["user_id"];

if (!$id || !$title || !$price || !$from || !$to) {
  exit("未入力の項目があります");
}

$pdo = db_conn();
$sql = "UPDATE plans
        SET title=:title, description=:description, price=:price,
            available_from=:from, available_to=:to
        WHERE id=:id AND hotel_id=:hotel_id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$stmt->bindValue(":hotel_id", $hotel_id, PDO::PARAM_INT);
$stmt->bindValue(":title", $title, PDO::PARAM_STR);
$stmt->bindValue(":description", $description, PDO::PARAM_STR);
$stmt->bindValue(":price", $price, PDO::PARAM_INT);
$stmt->bindValue(":from", $from, PDO::PARAM_STR);
$stmt->bindValue(":to", $to, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status) {
  header("Location: select.php");
  exit();
} else {
  $error = $stmt->errorInfo();
  exit("SQL_ERROR: " . $error[2]);
}
