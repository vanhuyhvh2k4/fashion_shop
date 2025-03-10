<?php
require_once __DIR__ . '/../controllers/CategoryController.php';

$controller = new CategoryController();
$id = $_GET['id'];
$category = $controller->getCategory($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    if ($controller->editCategory($id, $name)) {
        header("Location: category.php");
        exit;
    } else {
        echo "Cập nhật thất bại!";
    }
}
?>

<h2>✏️ Sửa danh mục</h2>
<form method="post">
    <label>Tên danh mục:</label>
    <input type="text" name="name" value="<?= $category['name'] ?>" required>
    <button type="submit">Cập nhật</button>
</form>
<a href="category.php">🔙 Quay lại</a>
