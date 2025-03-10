<?php
require_once __DIR__ . '/../config/database.php';


class Order {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getOrders() {
        $sql = "SELECT id, user_id, total_price, status FROM orders";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
