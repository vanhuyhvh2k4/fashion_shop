<?php
require_once __DIR__ . '/../config/database.php';

class Revenue {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getTotalRevenue() {
        $sql = "SELECT SUM(total_price) AS total_revenue FROM orders";
        $result = $this->conn->query($sql);
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data['total_revenue'] ?? 0;
    }

    public function getMonthlyRevenue() {
        $sql = "
            SELECT MONTH(created_at) AS month, SUM(total_price) AS revenue
            FROM orders
            WHERE status='Completed'
            GROUP BY MONTH(created_at)
            ORDER BY month ASC
        ";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
