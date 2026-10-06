<?php

class OrderItem
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($orderId, $productId, $quantity, $price)
    {
        $sql = "INSERT INTO order_items
                (order_id, product_id, quantity, price)
                VALUES (:order_id, :product_id, :quantity, :price)";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([
            ":order_id" => $orderId,
            ":product_id" => $productId,
            ":quantity" => $quantity,
            ":price" => $price
        ]);
    }
}