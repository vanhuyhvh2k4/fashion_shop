<?php
session_start();
if (isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <style>

body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
    animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.9);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.login-container {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.25);
    text-align: center;
    width: 450px;
    transition: 0.3s;
}

.login-container:hover {
    transform: scale(1.02);
}

.login-container h2 {
    margin-bottom: 20px;
    font-size: 24px;
}

.login-container input {
    width: 95%;
    padding: 14px;
    margin: 12px 0;
    border: 1px solid #ccc;
    border-radius: 30px;
    outline: none;
    font-size: 16px;
    transition: 0.3s;
}

.login-container input:focus {
    border-color: #007bff;
    box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.5);
}

.login-container button {
    width: 47,5%;
    padding: 14px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    font-size: 18px;
    transition: 0.3s;
    margin-top: 10px;
    margin-left: 20px;
}

.login-container button:hover {
    background: #0056b3;
    box-shadow: 0px 4px 10px rgba(0, 91, 187, 0.5);
}

.login-container p {
    color: red;
    font-size: 14px;
    margin-top: 10px;
}


    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="controllers/LoginController.php" method="POST">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng nhập</button>
        </form>
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Sai tài khoản hoặc mật khẩu!</p>
        <?php endif; ?>
    </div>
</body>
</html>
