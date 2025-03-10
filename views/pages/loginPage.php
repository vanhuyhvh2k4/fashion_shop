<?php
define('ASSET_PATH', '../../assets/'); // Adjust the path accordingly
session_start();
require_once "../../controllers/AuthController.php"; // Đảm bảo đường dẫn đúng

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
  $auth = new AuthController();
  $auth->login(); // Gọi hàm login từ AuthController
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
              <h3>Sign In</h3>
              <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
            </div>
            <form action="loginPage.php" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input name="username" type="text" class="form-control" id="username">

              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password">

              </div>

              <span class="text-danger"><?php
                                        session_start();
                                        if (isset($_SESSION['error'])) {
                                          echo $_SESSION['error'];
                                          unset($_SESSION['error']); // Clear message after displaying
                                        }
                                        ?></span>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked" />
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="./registerPage.php" class="forgot-pass">Register Now</a></span>
              </div>

              <input name="login" type="submit" value="Log In" class="btn btn-block btn-primary">

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