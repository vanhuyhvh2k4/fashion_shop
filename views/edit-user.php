<?php
require_once '../controllers/UserController.php';

$userController = new UserController();

$user = $userController->userModel->getUserById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userController->edit($_GET['id'], $_POST['username'], $_POST['email'], $_POST['password']);
    header("Location: users.php");
    exit();

}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c6e3fd;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            text-align: left;
            z-index: 2; 
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    background-color:rgb(11, 65, 13); 
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color:rgb(132, 194, 135); 
}


        @media screen and (max-width: 600px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            h2 {
                font-size: 20px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            button {
                font-size: 14px;
                padding: 10px;
            }
        }

        .snowflake {
            position: absolute;
            top: -10px;
            background-color: white;
            border-radius: 50%;
            opacity: 0.8;
            animation: snow 10s linear infinite;
        }

        @keyframes snow {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0.3;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (isset($user)): ?>
            <h2>Chỉnh sửa Người dùng</h2>
            <form method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($user['username']); ?>">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>">

                <label for="password">Password:</label>
                <input type="password" name="password" id="password">

                <button type="submit">Cập nhật Người dùng</button>
            </form>
        <?php else: ?>
            <p>User not found!</p>
        <?php endif; ?>
    </div>

    <script>
        function createSnowflake() {
            const snowflake = document.createElement('div');
            const size = Math.random() * (7 - 3) + 3;
            const leftPosition = Math.random() * window.innerWidth; 
            const animationDuration = Math.random() * (15 - 7) + 7;
            
            snowflake.classList.add('snowflake');
            snowflake.style.width = `${size}px`;
            snowflake.style.height = `${size}px`;
            snowflake.style.left = `${leftPosition}px`;
            snowflake.style.animationDuration = `${animationDuration}s`;
            
            document.body.appendChild(snowflake);

            setTimeout(() => {
                snowflake.remove();
            }, animationDuration * 1000);
        }

        setInterval(createSnowflake, 200);
    </script>
</body>
</html>
