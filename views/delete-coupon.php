<?php
require_once __DIR__ . '/../controllers/CouponController.php';

$controller = new CouponController();

if (!isset($_GET['id'])) {
    die("⚠️ Không tìm thấy ID mã giảm giá.");
}

$id = $_GET['id'];

if ($controller->deleteCoupon($id)) {
    header('Location: coupons.php');
} else {
    die("⚠️ Xóa thất bại.");
}
?>
