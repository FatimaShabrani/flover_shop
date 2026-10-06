<?php

require_once __DIR__ . "/../db.php";

class Product
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM products WHERE id = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);

        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        return $product;
    }

    public function getAll()
{
    $sql = "SELECT * FROM products";

    $stmt = $this->connection->query($sql);

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $products;
}
}

