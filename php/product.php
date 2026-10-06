<?php

require_once "db.php";
require_once "models/Product.php";

header("Content-Type: application/json");

$id = $_GET["id"] ?? 0;

$productModel = new Product($connection);

$product = $productModel->getById($id);

echo json_encode($product);

?>