<?php
require_once __DIR__ . '/../controllers/CategoryController.php';

$controller = new CategoryController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    if ($controller->createCategory($name)) {
        header("Location: category.php");
        exit;
    } else {
        echo "Thêm danh mục thất bại!";
    }
}
?>

<h2>➕ Thêm danh mục</h2>
<form method="post">
    <label>Tên danh mục:</label>
    <input type="text" name="name" required>
    <button type="submit">Thêm</button>
</form>
<a href="category.php">🔙 Quay lại</a>
