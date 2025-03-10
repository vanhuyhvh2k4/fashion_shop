<?php
require_once __DIR__ . "/../controllers/UserController.php";
$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->create();
}
?>

<?php
require_once __DIR__ . "/../controllers/UserController.php";
$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->create();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; 
            margin: 0;
            padding: 0;
            overflow: hidden; 
            position: relative;
            display: flex;
            justify-content: center; 
            align-items: center;
            height: 100vh;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            animation: bubbleAnimation 10s infinite ease-in-out;
            pointer-events: none;
        }

        @keyframes bubbleAnimation {
            0% {
                transform: scale(0.6);
                opacity: 0;
                top: 100%;
            }
            50% {
                transform: scale(1.5);
                opacity: 1;
                top: 50%;
            }
            100% {
                transform: scale(0.6);
                opacity: 0;
                top: -10%;
            }
        }

        .container {
            max-width: 700px;
            width: 100%;
            background: white;
            padding: 40px; 
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: left; 
        }

        h2 {
            color: #4d9b29;
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            color: #333;
            margin-bottom: 5px;
            display: block;
            margin-left: 11px;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            margin-bottom: 20px;
            box-sizing: border-box;
            transition: border-color 0.3s;
            margin-left: 11px;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus {
            border-color: #007bff;
        }

        button {
            width: 50%;
            padding: 8px 16px;
            font-size: 14px;
            background-color:rgb(26, 87, 45);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 auto;
            display: block;
        }

        button:hover {
            background-color: #b3e4af;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 90%;
                padding: 20px;
            }
            h2 {
                font-size: 18px;
            }
            input[type="text"], input[type="email"], input[type="password"], button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thêm Người dùng</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>
            <button type="submit">Thêm</button>
        </form>
    </div>

    <script>
        function createBubble() {
            const bubble = document.createElement('div');
            const size = Math.random() * (70 - 30) + 30; 
            const left = Math.random() * window.innerWidth;
            const animationDuration = Math.random() * (12 - 6) + 6;
            
            // Tạo màu ngẫu nhiên cho bong bóng
            const randomColor = `hsl(${Math.random() * 360}, 100%, 75%)`;  // Màu ngẫu nhiên từ HSL

            bubble.classList.add('bubble');
            bubble.style.width = `${size}px`;
            bubble.style.height = `${size}px`;
            bubble.style.left = `${left}px`;
            bubble.style.animationDuration = `${animationDuration}s`;
            bubble.style.backgroundColor = randomColor;  // Áp dụng màu ngẫu nhiên
            
            document.body.appendChild(bubble);
            
            setTimeout(() => {
                bubble.remove();
            }, animationDuration * 1000);
        }

        setInterval(createBubble, 1000);
    </script>
</body>
</html>
