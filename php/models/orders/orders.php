<?php 


class Orders {
    private $conn;
    private $table = 'orders';

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getOrders() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createOrder($data) {
        $query = "INSERT INTO " . $this->table . " (user_id, product_id, quantity, total_price) VALUES (:user_id, :product_id, :quantity, :total_price)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $data['user_id']);
        $stmt->bindParam(':product_id', $data['product_id']);
        $stmt->bindParam(':quantity', $data['quantity']);
        $stmt->bindParam(':total_price', $data['total_price']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
