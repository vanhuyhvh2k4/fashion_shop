<?php
require_once '../models/Review.php';

class ReviewController {
    private $model;

    public function __construct() {
        $this->model = new Review();
    }

    public function getAllReviews() {
        return $this->model->getReviews();
    }

    public function approveReview($id) {
        $this->model->approveReview($id);
        header("Location: ../views/reviews.php");
        exit();
    }

    public function deleteReview($id) {
        $this->model->deleteReview($id);
        header("Location: ../views/reviews.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
    $controller = new ReviewController();
    
    if ($_POST["action"] === "approve" && isset($_POST["review_id"])) {
        $controller->approveReview($_POST["review_id"]);
    } elseif ($_POST["action"] === "delete" && isset($_POST["review_id"])) {
        $controller->deleteReview($_POST["review_id"]);
    }
}
?>
