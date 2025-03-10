<?php
session_start();
require_once "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "admin" && $password === "123456") {
        $_SESSION["admin"] = $username;
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../login.php?error=invalid");
        exit();
    }
}
?>
