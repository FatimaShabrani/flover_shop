<?php

class Order
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create($customerName, $phone, $address, $total)
{
    $sql = "INSERT INTO orders
            (customer_name, phone, address, total)
            VALUES (:customer_name, :phone, :address, :total)";

    $stmt = $this->connection->prepare($sql);

    $stmt->execute([
        ":customer_name" => $customerName,
        ":phone" => $phone,
        ":address" => $address,
        ":total" => $total
    ]);

    return $this->connection->lastInsertId();
}
}