<?php
require_once '../controllers/ProductController.php';

$productController = new ProductController();

if (isset($_GET['id'])) {
    $product = $productController->edit($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productController->update($_GET['id'], $_POST, $_FILES);
    header("Location: products.php");
}
?>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 500px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
    font-weight: bold;
}

input {
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

input:focus {
    border-color: #007bff;
    outline: none;
}

button {
    margin-top: 15px;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

img {
    margin-top: 10px;
    border-radius: 5px;
    max-width: 100%;
}

</style>
<h2>Chỉnh sửa sản phẩm</h2>
<form method="POST" enctype="multipart/form-data">
    <label>Tên sản phẩm:</label>
    <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>

    <label>Giá:</label>
    <input type="number" name="price" value="<?php echo $product['price']; ?>" required><br>

    <label>Số lượng:</label>
    <input type="number" name="stock" value="<?php echo $product['stock']; ?>" required><br>

    <label>Hình ảnh hiện tại:</label><br>
    <img src="../uploads/<?php echo $product['image']; ?>" width="100"><br>

    <label>Chọn ảnh mới (nếu có):</label>
    <input type="file" name="image"><br>

    <label>Danh mục:</label>
    <input type="number" name="category_id" value="<?php echo $product['category_id']; ?>" required><br>

    <button type="submit">Cập nhật</button>
</form>
