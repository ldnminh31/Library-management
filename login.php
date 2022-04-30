<?php
$username = $_POST["username"];
$password = $_POST["password"];
include_once './utils/utils.php';
if ($username!='admin' || $password!='admin') {
    alert("Đăng nhập thất bại");
    go("./index.php");
} else {
    go("./admin.php");
}