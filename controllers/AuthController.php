<?php
session_start();
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if ($this -> userModel->getUserByName($username)) {
                $_SESSION['message'] = "Username da ton tai";
                header("Location: /shp/views/pages/registerPage.php");
                exit();   
            }

            if ($this -> userModel->getUserByEmail($email)) {
                $_SESSION['message'] = "Email da ton tai";
                header("Location: /shp/views/pages/registerPage.php");
                exit();   
            }

            if ($this->userModel->register($username, $email, $password)) {
                $_SESSION['message'] = "Đăng ký thành công! Hãy đăng nhập.";
                header("Location: /shp/views/pages/loginPage.php");
                exit();
            } else {
                echo("failed");
                $_SESSION['error'] = "Đăng ký thất bại!";
                header("Location: /shp/views/pages/registerPage.php");
                exit();
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: /shp/views/pages/homePage.php");
                exit();
            } else {
                $_SESSION['error'] = "Sai email hoặc mật khẩu!";
                header("Location: /shp/views/pages/loginPage.php");
                exit();
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /shp/views/pages/loginPage.php");
        exit();
    }
}