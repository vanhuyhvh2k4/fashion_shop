<?php
require_once '../controllers/ProductController.php'; 

$productController = new ProductController();
$products = $productController->index(); 
?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 900px;
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

.btn-primary {
    display: inline-block;
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 10px;
}

.btn-primary:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background: white;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

table th {
    background-color: #007bff;
    color: white;
}

table td img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
}

.btn-action {
    display: inline-block;
    padding: 6px 12px;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    margin: 3px;
}

.btn-edit {
    background-color: #28a745;
}

.btn-edit:hover {
    background-color: #218838;
}

.btn-delete {
    background-color: #dc3545;
}

.btn-delete:hover {
    background-color: #c82333;
}

</style>
<h2>Quản lý Sản phẩm</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Hình ảnh</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($products as $product) { ?>
    <tr>
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo number_format($product['price'], 0, ',', '.'); ?> VND</td>
        <td><?php echo $product['stock']; ?></td>
        <td><img src="../uploads/<?php echo $product['image']; ?>" width="50"></td>
        <td>
    <a href="edit-product.php?id=<?php echo $product['id']; ?>" class="btn-action btn-edit">✏️ Sửa</a>
    <a href="delete-product.php?id=<?php echo $product['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Bạn có chắc muốn xóa?')">🗑️ Xóa</a>

</td>

    </tr>
    <?php } ?>
</table>
