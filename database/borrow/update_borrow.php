<?php
include_once '../connect.php';
include_once '../../utils/utils.php';
var_dump($_POST);
try {
    $sql = "UPDATE muonsach SET mathanhvien=?, masach=?, ngaymuon=?, ngaytra=?, soluong=?, trangthai=? 
    WHERE mathanhvien=? AND ngaymuon=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_POST["mathanhvien"], $_POST["masach"], $_POST["ngaymuon"],
    $_POST["ngaytra"], $_POST["soluong"], $_POST["trangthai"], $_POST["mathanhvien"], 
    $_POST["ngaymuon"]]);
} catch (\Throwable $th) {
    alert("Lỗi hệ thống");
}

go("/qltv/admin.php?page=borrow");