<?php
require_once __DIR__ . "/../controllers/UserController.php";
$controller = new UserController();
if (!isset($_GET["id"])) {
    die("ID không hợp lệ.");
}
$id = $_GET["id"];
$controller->delete($id);
header("Location: users.php");
?>
