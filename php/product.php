<?php

require_once "db.php";

header("Content-Type: application/json");

$id = $_GET["id"] ?? 0;

$sql = "SELECT * FROM products WHERE id = ?";

$stmt = $connection->prepare($sql);
$stmt->execute([$id]);

$product = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($product);

?>