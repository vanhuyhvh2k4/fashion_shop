<?php
define('ASSET_PATH', '../../assets/'); // Adjust the path accordingly
session_start();
require_once "../../controllers/AuthController.php"; // Đảm bảo đường dẫn đúng

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $auth = new AuthController();
    $auth->register(); // Gọi hàm login từ AuthController
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= ASSET_PATH ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= ASSET_PATH ?>css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ASSET_PATH ?>css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= ASSET_PATH ?>css/loginStyle.css">

    <title>Login #6</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../../assets/pictures/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Register</h3>
              <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
            </div>
            <form action="registerPage.php" method="post">
    <!-- 🔥 Thêm name="username" -->
    <div class="form-group first">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <!-- 🔥 Thêm name="email" -->
    <div class="form-group first">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <!-- 🔥 Thêm name="password" -->
    <div class="form-group last mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <!-- 🔥 Thêm name="confirm_password" -->
    <div class="form-group last mb-3">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" class="form-control" id="confirm-password" name="confirm_password" required>
    </div>

    <span class="text-danger"><?php
     session_start();
     if (isset($_SESSION['message'])) {
         echo $_SESSION['message'];
         unset($_SESSION['message']); // Clear message after displaying
     }
     ?></span>

    <div class="d-flex mb-5 align-items-center">
        <label class="control control--checkbox mb-0">
            <span class="caption">Remember me</span>
            <input type="checkbox" name="remember_me" checked="checked"/>
            <div class="control__indicator"></div>
        </label>
        <span class="ml-auto"><a href="./loginPage.php" class="forgot-pass">Login Now</a></span> 
    </div>

    <!-- 🔥 Đổi "Log In" thành "Register" -->
    <input name="register" type="submit" value="Register" class="btn btn-block btn-primary">

    <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>

    <div class="social-login">
        <a href="#" class="facebook btn d-flex justify-content-center align-items-center">
            <span class="icon-facebook mr-3"></span> Login with Facebook
        </a>
        <a href="#" class="twitter btn d-flex justify-content-center align-items-center">
            <span class="icon-twitter mr-3"></span> Login with Twitter
        </a>
        <a href="#" class="google btn d-flex justify-content-center align-items-center">
            <span class="icon-google mr-3"></span> Login with Google
        </a>
    </div>
</form>

          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="<?= ASSET_PATH ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= ASSET_PATH ?>js/popper.min.js"></script>
    <script src="<?= ASSET_PATH ?>js/bootstrap.min.js"></script>
    <script src="<?= ASSET_PATH ?>js/loginMain.js"></script>
  </body>
</html>