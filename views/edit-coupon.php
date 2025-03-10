<?php
require_once __DIR__ . '/../controllers/CouponController.php';

$controller = new CouponController();

if (!isset($_GET['id'])) {
    die("⚠️ Không tìm thấy ID mã giảm giá.");
}

$id = $_GET['id'];
$coupon = $controller->getCouponById($id);

if (!$coupon) {
    die("⚠️ Mã giảm giá không tồn tại.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->updateCoupon($id, $_POST);
    header('Location: coupons.php');
}
?>

<h2>✏️ Chỉnh sửa Mã Giảm Giá</h2>
<form method="POST">
    <label>Mã giảm giá:</label>
    <input type="text" name="code" value="<?= $coupon['code'] ?>" required>

    <label>Giảm giá:</label>
    <input type="number" name="discount" step="0.01" value="<?= $coupon['discount'] ?>" required>

    <label>Loại:</label>
    <select name="type">
        <option value="percent" <?= $coupon['type'] == 'percent' ? 'selected' : '' ?>>Phần trăm</option>
        <option value="fixed" <?= $coupon['type'] == 'fixed' ? 'selected' : '' ?>>Giá cố định</option>
    </select>

    <label>Đơn hàng tối thiểu:</label>
    <input type="number" name="min_order" step="0.01" value="<?= $coupon['min_order'] ?>">

    <label>Ngày bắt đầu:</label>
    <input type="date" name="start_date" value="<?= $coupon['start_date'] ?>" required>

    <label>Ngày kết thúc:</label>
    <input type="date" name="end_date" value="<?= $coupon['end_date'] ?>" required>

    <button type="submit">💾 Lưu</button>
</form>

<a href="coupons.php">⬅️ Quay lại</a>
