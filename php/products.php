<?php

require_once "db.php";
require_once "models/Product.php";

header("Content-Type: application/json");

$productModel = new Product($connection);

$products = $productModel->getAll();

echo json_encode($products);

?>