<?php
require_once '../controllers/ProductController.php';

$productController = new ProductController();
$productController->destroy($_GET['id']);

header("Location: products.php");
?>
