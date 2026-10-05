<?php

require_once "db.php";

header("Content-Type: application/json");

$sql = "SELECT * FROM categories";

$stmt = $connection->query($sql);

$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($categories);

?>