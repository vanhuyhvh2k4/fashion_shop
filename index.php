<?php
include "config/auth.php";
require_once 'controllers/OrderController.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            height: 100vh;
            background: #f5f5f5;
        }
        .sidebar {
            width: 250px;
            background: url('anh1.jpg') no-repeat center center;
            background-size: cover;
            padding: 20px;
            text-align: center;
            color: white;
            position: fixed;
            height: 100%;
        }
        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid white;
        }
        .sidebar h2 {
            color:#fff;
            font-size: 24px;
            font-weight: bold;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        }
        .sidebar ul li:last-child {
            border-bottom: none;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }
        .sidebar ul li:hover {
    background: rgba(255, 255, 255, 0.2); 
    border-radius: 8px; 
    transition: all 0.3s ease;
}

        .logout-btn {
            display: block;
            padding: 12px;
            background: #d9534f;
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            border-radius: 8px;
            transition: 0.3s;
            margin: 20px auto;
            width: 80%;
        }
        .logout-btn:hover {
            background: #c9302c;
            transform: scale(1.1);
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
    </style>
</head>
<script>
    function loadContent(page) {
        fetch('views/' + page)
        .then(response => response.text())
        .then(data => {
            document.querySelector('.content').innerHTML = data;
        })
        .catch(error => console.error('Lỗi tải trang:', error));
    }
</script>

<body>
    <div class="sidebar">
        <img src="anh3.png" alt="Admin Avatar" class="avatar">
        <h2>Quản trị</h2>
        <ul>
        <li><a href="#" onclick="loadContent('dashboard.php')">📊 Tổng quan</a></li>
        <li><a href="#" onclick="loadContent('coupons.php')">🎟️ Quản lý Mã Giảm Giá</a></li>
        <li><a href="#" onclick="loadContent('category.php')">📂 Quản lý danh mục</a></li>
        <li><a href="#" onclick="loadContent('reviews.php')">🌟 Quản lý đánh giá</a></li>
        <li><a href="logout.php" class="logout-btn">🚪 Đăng xuất</a></li>
        </ul>
    </div>
    <div class="content">
        <h1>Chào mừng, admin!</h1>
        <p>Chọn một mục từ menu để xem nội dung.</p>
        <img src="anh2.png" alt="Admin Image" style="width:100%; border-radius:10px;">
    </div>
</body>
</html>