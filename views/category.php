<?php
require_once __DIR__ . '/../controllers/CategoryController.php';

$controller = new CategoryController();
$categories = $controller->getCategories();
?>
<style>
.category-container {
    padding: 20px;
}

.category-container h2 {
    font-size: 24px;
    font-weight: bold;
    text-align: center; 
    display: flex;
    justify-content: center; 
    align-items: center;
    gap: 8px;
}


.category-table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

.category-table th {
    background-color:rgb(193, 177, 134);
    color: white;
    text-transform: uppercase;
    padding: 12px;
    text-align: left;
}

.category-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.category-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.category-table tr:hover {
    background-color: #f1f1f1;
}

.action-btn {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
}

.edit-btn {
    background-color: #ffc107;
    color: #333;
}

.delete-btn {
    background-color: #dc3545;
    color: white;
}

.edit-btn:hover {
    background-color: #e0a800;
}

.delete-btn:hover {
    background-color: #c82333;
}
.add-category-btn {
    display: inline-block;
    background-color: rgb(165, 161, 110);
    color: white;
    padding: 10px 15px;
    border-radius: 5px;
    font-weight: bold;
    text-decoration: none;
    position: absolute;
    left: 20px; 
    bottom: 10px; 
}
.add-category-btn:hover {
    background-color: rgb(198, 187, 117);
}




</style>
<div class="category-container">
<div style="position: relative; left: 100px;">
    <h2>📂 Quản lý danh mục</h2>
    <a href="views/add-category.php" class="add-category-btn">➕ Thêm danh mục</a>
</div>


    <table class="category-table">
        <tr>
            <th>ID</th>
            <th>Tên danh mục</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($categories as $category) { ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['name'] ?></td>
                <td>
                    <a href="views/edit-category.php?id=<?= $category['id'] ?>" class="action-btn edit-btn">✏️ Sửa</a>
                    <a href="views/delete-category.php?id=<?= $category['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Bạn có chắc muốn xóa?')">🗑️ Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
