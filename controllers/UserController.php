<?php
require_once __DIR__ . "/../models/User.php";

class UserController {
    public $userModel; 


    public function __construct() {
        $this->userModel = new User();
    }
    
    public function index() {
        $users = $this->userModel->getAllUsers();
        include __DIR__ . "/../views/users.php";
    }
    

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $this->userModel->addUser($username, $email);
            header("Location: users.php");
            exit();
        }
        include __DIR__ . "/../views/add-user.php";
    }

    public function edit($id) {
        $user = $this->userModel->getUserById($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $this->userModel->updateUser($id, $username, $email);
            header("Location: users.php");
            exit();
        }
        include __DIR__ . "/../views/edit-user.php"; 
    }

    public function delete($id) {
        $this->userModel->deleteUser($id);
        header("Location: users.php");
        exit();
    }
}
?>
