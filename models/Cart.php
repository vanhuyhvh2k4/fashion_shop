<?php
require_once __DIR__ . '/../config/database.php';

class Cart {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Add product to cart
    public function addToCart($userId, $productId, $quantity) {
        try {
            $userId = intval($userId);
            $productId = intval($productId);
            $quantity = intval($quantity);
    
            if ($quantity <= 0) {
                return ['error' => 'Quantity must be at least 1'];
            }
    
            $this->conn->beginTransaction(); // Start transaction
    
            // Check if product already exists in cart
            $stmt = $this->conn->prepare("SELECT id FROM cart WHERE user_id = ? AND product_id = ?");
            $stmt->execute([$userId, $productId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($result) {
                // Update quantity to the user-defined value
                $stmt = $this->conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
                $stmt->execute([$quantity, $userId, $productId]);
            } else {
                // Insert new product into cart
                $stmt = $this->conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)");
                $stmt->execute([$userId, $productId, $quantity]);
            }
    
            $this->conn->commit(); // Commit transaction
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack(); // Rollback on error
            return ['error' => $e->getMessage()];
        }
    }
    

    // Get user's cart
    public function getCart($userId) {
        try {
            $stmt = $this->conn->prepare("
                SELECT cart.id, cart.product_id, cart.quantity, products.name, products.price, products.image 
                FROM cart 
                JOIN products ON cart.product_id = products.id
                WHERE cart.user_id = ?
            ");
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Remove product from cart
    public function removeFromCart($userId, $productId) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
            return $stmt->execute([$userId, $productId]);
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Clear user's cart
    public function clearCart($userId) {
        try {
            $stmt = $this->conn->prepare("DELETE FROM cart WHERE user_id = ?");
            return $stmt->execute([$userId]);
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
?>
