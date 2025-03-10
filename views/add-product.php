<?php
require_once '../controllers/ProductController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productController = new ProductController();
    $productController->store($_POST, $_FILES);
    header("Location: products.php");
}
?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color:rgb(222, 179, 235);
    margin: 0;
    padding: 0;
    position: relative; 
}

.container {
    max-width: 500px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #c750a4;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-top: 10px;
}

input[type="text"],
input[type="number"],
input[type="file"],
button {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

button {
    background-color:rgb(136, 7, 148);
    color: white;
    font-weight: bold;
    border: none;
    cursor: pointer;
    margin-top: 15px;
}

button:hover {
    background-color:rgb(161, 103, 170);
}

input[type="file"] {
    padding: 5px;
    background: white;
    border: none;
}

.heart {
    position: absolute;
    font-size: 30px;
    color: #ff69b4;
    opacity: 0;
    animation: heartAnimation 3s ease-in-out infinite;
}

@keyframes heartAnimation {
    0% {
        transform: translateY(50px) scale(0.5);
        opacity: 0;
    }
    25% {
        transform: translateY(-50px) scale(1.2);
        opacity: 0.8;
    }
    50% {
        transform: translateY(-100px) scale(1.5);
        opacity: 0.6;
    }
    75% {
        transform: translateY(-150px) scale(1.2);
        opacity: 0.8;
    }
    100% {
        transform: translateY(-200px) scale(0.5);
        opacity: 0;
    }
}
</style>

<div class="container">
    <h2>Thêm Sản phẩm</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Tên sản phẩm:</label>
        <input type="text" name="name" required>

        <label>Giá:</label>
        <input type="number" name="price" required>

        <label>Số lượng:</label>
        <input type="number" name="stock" required>

        <label>Hình ảnh:</label>
        <input type="file" name="image" required>

        <label>Danh mục:</label>
        <input type="number" name="category_id" required>

        <button type="submit">Thêm</button>
    </form>
</div>

<script>
function createHeart() {
    const heart = document.createElement('div');
    heart.classList.add('heart');
    heart.innerHTML = '❤️';

    const left = Math.random() * window.innerWidth;
    heart.style.left = `${left}px`;


    document.body.appendChild(heart);


    setTimeout(() => {
        heart.style.opacity = 1;
    }, 50); 

    setTimeout(() => {
        heart.remove();
    }, 3000); 
}

setInterval(createHeart, 1500);
</script>
