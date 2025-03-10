<?php
session_start();
include '../../config/database.php'; // Kết nối database

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Vui lòng đăng nhập!']);
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];
$quantity = 1;

// Kiểm tra sản phẩm có trong giỏ hàng chưa
$sql = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Cập nhật số lượng nếu đã có trong giỏ hàng
    $sql = "UPDATE cart SET quantity = quantity + ? WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $quantity, $user_id, $product_id);
} else {
    // Thêm mới vào giỏ hàng
    $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $user_id, $product_id, $quantity);
}

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Thêm vào giỏ hàng thành công!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Lỗi khi thêm sản phẩm!']);
}

$conn->close();
?>
