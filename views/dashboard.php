<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            background: #333;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar ul li:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href='admin.php'><i class="fas fa-home"></i> Trang chủ</a></li>
            <li><a href='views/products.php'><i class="fas fa-box"></i> Quản lý Sản phẩm</a></li>
            <li><a href='views/orders.php'><i class="fas fa-shopping-cart"></i> Quản lý Đơn hàng</a></li>
            <li><a href='views/add-product.php'><i class="fas fa-plus"></i> Thêm sản phẩm</a></li>
            <li><a href='views/users.php'><i class="fas fa-user"></i> Quản lý người dùng</a></li>
            <li><a href='views/revenue.php'><i class="fas fa-chart-bar"></i> Quản lý Doanh thu</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
        </ul>
    </div>
    <div class="content" id="main-content">
        <h1>Chào mừng, admin!</h1>
        <p>Chọn một mục từ menu để xem nội dung.</p>
    </div>
    <script>
    function loadPage(page) {
        fetch(page)
            .then(response => response.text())
            .then(data => {
                document.getElementById('main-content').innerHTML = data;
            })
            .catch(error => console.error("Lỗi tải trang:", error));
    }
</script>


</body>
</html>
