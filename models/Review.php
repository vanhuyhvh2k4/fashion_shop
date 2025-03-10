<?php
require_once '../config/database.php';

class Review {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getReviews() {
        $stmt = $this->conn->query("SELECT * FROM reviews");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function approveReview($id) {
        $stmt = $this->conn->prepare("UPDATE reviews SET status = 'approved' WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function deleteReview($id) {
        $stmt = $this->conn->prepare("DELETE FROM reviews WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
