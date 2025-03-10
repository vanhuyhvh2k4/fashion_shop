<?php
require_once __DIR__ . '/../models/Coupon.php';

class CouponController {
    private $couponModel;

    public function __construct() {
        $this->couponModel = new Coupon();
    }

    public function getCoupons() {
        return $this->couponModel->getAllCoupons();
    }

    public function getCouponById($id) {
        return $this->couponModel->getCouponById($id);
    }

    public function addCoupon($data) {
        return $this->couponModel->insertCoupon($data);
    }

    public function updateCoupon($id, $data) {
        return $this->couponModel->updateCoupon($id, $data);
    }

    public function deleteCoupon($id) {
        return $this->couponModel->deleteCoupon($id);
    }
}
?>
