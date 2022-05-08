<?php
include_once '../connect.php';
include '../loading.php';
$sql = "INSERT INTO `sach` (`tensach`, `tentacgia`, `theloai`, `mota`, `vitri`, 
    `soluong`, `sach_status`, `sach_image`) 
    VALUES (?,?,?,?,?,?,?,?)";
