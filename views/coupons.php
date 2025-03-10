<?php
require_once __DIR__ . '/../controllers/CouponController.php';

$controller = new CouponController();
$coupons = $controller->getCoupons();
?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    text-align: center;
}

h2 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}


table {
    width: 100%;
    max-width: 1000px;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #A18F5E;
    color: white;
    font-weight: bold;
}

tr:hover {
    background-color: #f1f1f1;
}

.add-btn {
    display: inline-block;
    background-color: #A18F5E;
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    font-weight: bold;
    text-decoration: none;
    transition: 0.3s ease;
    margin-left: 120px;
}

.add-btn:hover {
    background-color: #8F7A4B;
}

.add-btn-container {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 15px;
}

.nav-bar {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: white;
    padding: 10px 10px;
    z-index: 1000;
    border-bottom: 2px solid #ddd;
    text-align: left;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.nav-bar a {
    margin-left: 20px;
}


.edit-btn {
    background-color: #FFC107;
    color: black;
}

.edit-btn:hover {
    background-color: #e0a800;
}

.delete-btn {
    background-color: #DC3545;
    color: white;
}

.delete-btn:hover {
    background-color: #b02a37;
}



</style>

<body>


<div class="nav-bar">
    <a href="views/add-coupon.php" class="add-btn">➕ Thêm Mã Giảm Giá</a>
</div>



    <table>
    <h2>📂 Quản lý Mã Giảm Giá</h2>
        <tr>
            <th>ID</th>
            <th>Mã</th>
            <th>Giảm Giá</th>
            <th>Loại</th>
            <th>Đơn Tối Thiểu</th>
            <th>Bắt Đầu</th>
            <th>Kết Thúc</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($coupons as $coupon) { ?>
            <tr>
                <td><?= $coupon['id'] ?></td>
                <td><?= $coupon['code'] ?></td>
                <td><?= $coupon['discount'] ?></td>
                <td><?= $coupon['type'] == 'percent' ? 'Phần trăm' : 'Giá cố định' ?></td>
                <td><?= $coupon['min_order'] ?></td>
                <td><?= $coupon['start_date'] ?></td>
                <td><?= $coupon['end_date'] ?></td>
                <td>
                    <a href="views/edit-coupon.php?id=<?= $coupon['id'] ?>" class="edit-btn">Sửa</a>
                    <a href="views/delete-coupon.php?id=<?= $coupon['id'] ?>" class="delete-btn" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>

