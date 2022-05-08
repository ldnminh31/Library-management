<?php
include_once '../connect.php';
var_dump($_POST);
$sql = "INSERT INTO `sach` (`tensach`, `tentacgia`, `theloai`, `mota`, `vitri`, 
    `soluong`, `sach_status`, `sach_image`) 
    VALUES (?,?,?,?,?,?,?,?)";
