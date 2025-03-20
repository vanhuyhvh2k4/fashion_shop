<?php
session_start();
require_once '../../controllers/CartController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $cartController = new CartController();

    if ($_POST['action'] === 'addToCart') {
        $userId = intval($_POST['userId']); // Ensure this is a valid user ID
        $productId = intval($_POST['productId']);
        $quantity = 1; // You can modify this to accept dynamic quantity

        $response = $cartController->addToCart($userId, $productId, $quantity);
        echo json_encode($response);
        exit();
    }

    if ($_POST['action'] === 'remove') {
        $productId = $_POST['product_id'];
        $userId = $_POST['user_id'];
        $result = $cartController->removeFromCart($userId, $productId);
        echo json_encode($result);
        exit;
    }
}
?>
