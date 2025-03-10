<?php
require_once __DIR__ . '/../models/Order.php';


class OrderController {
    public function getAllOrders() {
        $orderModel = new Order();
        return $orderModel->getOrders(); 
    }
}
?>
