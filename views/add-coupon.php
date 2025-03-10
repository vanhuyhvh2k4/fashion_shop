<?php
require_once __DIR__ . '/../controllers/CouponController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new CouponController();
    $controller->addCoupon($_POST);
    header('Location: coupons.php');
}
?>
<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f8f9fa; 
    margin: 0;
}

form {
    width: 400px;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
}

h2 {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    margin-top: 10px;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    background-color: #A18F5E;
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    font-weight: bold;
    text-decoration: none;
    margin-top: 15px;
    border: none;
    cursor: pointer;
}

button:hover {
    opacity: 0.85;
}

a {
    display: block;
    text-align: center;
    margin-top: 15px;
    text-decoration: none;
    font-weight: bold;
    color: #555;
}


</style>

<form method="POST">
<h2>➕ Thêm Mã Giảm Giá</h2>
    <label>Mã giảm giá:</label>
    <input type="text" name="code" required>

    <label>Giảm giá:</label>
    <input type="number" name="discount" step="0.01" required>

    <label>Loại:</label>
    <select name="type">
        <option value="percent">Phần trăm</option>
        <option value="fixed">Giá cố định</option>
    </select>

    <label>Đơn hàng tối thiểu:</label>
    <input type="number" name="min_order" step="0.01">

    <label>Ngày bắt đầu:</label>
    <input type="date" name="start_date" required>

    <label>Ngày kết thúc:</label>
    <input type="date" name="end_date" required>

    <button type="submit">Thêm</button>
    <a href="coupons.php">⬅️ Quay lại</a>
</form>

