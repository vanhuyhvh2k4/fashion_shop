<?php
require_once __DIR__ . "/../controllers/UserController.php";
$controller = new UserController();
$users = $controller->userModel->getAllUsers();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Người dùng</title>
    <style>
        
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f4;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    a {
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
    }

    a:hover {
        text-decoration: underline;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .add-user-link {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .add-user-link:hover {
        background-color: #45a049;
    }


    </style>
</head>
<body>
    <div class="container">
        <h2>Danh sách Người dùng</h2>
        <a href="add-user.php" class="add-user-link">Thêm người dùng</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= isset($user['id']) ? $user['id'] : 'N/A' ?></td>
                    <td><?= isset($user['username']) ? $user['username'] : 'N/A' ?></td>
                    <td><?= isset($user['email']) ? $user['email'] : 'N/A' ?></td>
                    <td>
                        <a href="edit-user.php?id=<?= isset($user['id']) ? $user['id'] : '' ?>">Sửa</a> |
                        <a href="delete-user.php?id=<?= isset($user['id']) ? $user['id'] : '' ?>"
                           onclick="return confirm('Xác nhận xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
