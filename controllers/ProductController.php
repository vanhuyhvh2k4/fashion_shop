<?php
require_once __DIR__ . '/../models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        return $this->productModel->getAll();
    }

    public function searchProduct($keyword) {
        // Validate input
        if (empty(trim($keyword))) {
            return ['notfound' => 'Search keyword cannot be empty'];
        }
    
        // Sanitize input (basic example)
        $keyword = htmlspecialchars(trim($keyword));
    
        // Get product
        $products = $this->productModel->findByName($keyword);
    
        // Check if product is empty return message else return products
        if (empty($products)) {
            return ['notfound' => 'No products found matching "' . $keyword . '"'];
        } else {
            return ['products' => $products]; // Return found products
        }
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
