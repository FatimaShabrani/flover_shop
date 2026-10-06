<?php

class Category
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM categories";

        $stmt = $this->connection->query($sql);

        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }
}