<?php

require_once "db.php";
require_once "models/Category.php";

header("Content-Type: application/json");

$categoryModel = new Category($connection);

$categories = $categoryModel->getAll();

echo json_encode($categories);

?>