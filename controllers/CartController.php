<?php
session_start();
require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Product.php'; // Ensure the Product model is included

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    }

    public function addToCart($userId, $productId, $quantity = 1) {
        $productModel = new Product();
        $product = $productModel->findById($productId);

        if (!$product) {
            return ['error' => 'Product not found.'];
        }

        // Call the database-based cart model to add the product
        $result = $this->cartModel->addToCart($userId, $productId, $quantity);
        
        if (isset($result['error'])) {
            return ['error' => 'Failed to add product to cart.'];
        }

        return ['success' => 'Product added to cart successfully.'];
    }

    public function getCart($userId) {
        return $this->cartModel->getCart($userId);
    }

    public function removeFromCart($userId, $productId) {
        $result = $this->cartModel->removeFromCart($userId, $productId);
        if ($result) {
            return ['success' => 'Product removed from cart.'];
        }
        return ['error' => 'Product not found in cart.'];
    }

    public function clearCart($userId) {
        $result = $this->cartModel->clearCart($userId);
        if ($result) {
            return ['success' => 'Cart cleared successfully.'];
        }
        return ['error' => 'Failed to clear cart.'];
    }
}
?>
