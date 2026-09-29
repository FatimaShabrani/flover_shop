<?php

require_once "db.php";

header("Content-Type: application/json");

$sql = "SELECT * FROM products";

$stmt = $connection->query($sql);

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);

?>