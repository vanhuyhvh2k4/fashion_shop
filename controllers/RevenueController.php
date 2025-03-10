<?php
require_once __DIR__ . '/../models/Revenue.php';

class RevenueController {
    private $revenueModel;

    public function __construct() {
        $this->revenueModel = new Revenuel();
    }

    public function showRevenue() {
        $totalRevenue = $this->revenueModel->getTotalRevenue();
        $monthlyRevenue = $this->revenueModel->getMonthlyRevenue();

        require __DIR__ . '/../views/revenue.php';
    }
}
?>
