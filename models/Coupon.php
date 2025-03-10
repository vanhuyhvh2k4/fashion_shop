<?php
require_once __DIR__ . '/../config/Database.php';

class Coupon {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAllCoupons() {
        $query = "SELECT * FROM coupons";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponById($id) {
        $query = "SELECT * FROM coupons WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertCoupon($data) {
        $query = "INSERT INTO coupons (code, discount, type, min_order, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['code'],
            $data['discount'],
            $data['type'],
            $data['min_order'],
            $data['start_date'],
            $data['end_date']
        ]);
    }

    public function updateCoupon($id, $data) {
        $query = "UPDATE coupons SET code=?, discount=?, type=?, min_order=?, start_date=?, end_date=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['code'],
            $data['discount'],
            $data['type'],
            $data['min_order'],
            $data['start_date'],
            $data['end_date'],
            $id
        ]);
    }

    public function deleteCoupon($id) {
        $query = "DELETE FROM coupons WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
