<?php
$username = $_POST["username"];
$password = $_POST["password"];
include_once './utils/utils.php';
session_start();
// session
if ($username != 'admin' || $password != 'admin') {
    alert('Sai thông tin đăng nhập');
    go("./index.php");
} else {
    $_SESSION['username'] = $username;
    go("./admin.php");
}
