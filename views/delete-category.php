<?php
require_once __DIR__ . '/../controllers/CategoryController.php';

$controller = new CategoryController();
$id = $_GET['id'];

if ($controller->removeCategory($id)) {
    header("Location: category.php");
    exit;
} else {
    echo "Xóa danh mục thất bại!";
}
?>
