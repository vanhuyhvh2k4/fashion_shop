<?php
require_once '../models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        return $this->productModel->getAll();
    }

    public function store($data, $file) {
        $name = $data['name'];
        $price = $data['price'];
        $stock = $data['stock'];
        $category_id = $data['category_id'];

        $image = $file['image']['name'];
        move_uploaded_file($file['image']['tmp_name'], "../uploads/".$image);

        return $this->productModel->create($name, $price, $stock, $image, $category_id);
    }

    public function edit($id) {
        return $this->productModel->findById($id);
    }

    public function update($id, $data, $file) {
        $product = $this->productModel->findById($id);
        $name = $data['name'];
        $price = $data['price'];
        $stock = $data['stock'];
        $category_id = $data['category_id'];

        if ($file['image']['name']) {
            $image = $file['image']['name'];
            move_uploaded_file($file['image']['tmp_name'], "../uploads/".$image);
        } else {
            $image = $product['image'];
        }

        return $this->productModel->update($id, $name, $price, $stock, $image, $category_id);
    }

    public function destroy($id) {
        return $this->productModel->delete($id);
    }
}
?>
