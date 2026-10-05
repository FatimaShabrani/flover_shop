<?php

$connection = new PDO(
    "mysql:host=localhost;dbname=flover;charset=utf8mb4",
    "root",
    ""
);

$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>