<?php
require_once __DIR__ . '/../models/Category.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }

    public function getCategories() {
        return $this->categoryModel->getAllCategories();
    }

    public function getCategory($id) {
        return $this->categoryModel->getCategoryById($id);
    }

    public function createCategory($name) {
        return $this->categoryModel->addCategory($name);
    }

    public function editCategory($id, $name) {
        return $this->categoryModel->updateCategory($id, $name);
    }

    public function removeCategory($id) {
        return $this->categoryModel->deleteCategory($id);
    }
}
?>
