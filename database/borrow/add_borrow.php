<?php
include_once '../connect.php';
include_once '../../utils/utils.php';
include '../loading.php';
// add borrow
try {
    $sql = "INSERT INTO `muonsach` (`mathanhvien`, `masach`, `ngaymuon`, `ngaytra`, `soluong`, `trangthai`) VALUES
    (?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_POST["mathanhvien"], $_POST["masach"], $_POST["ngaymuon"],
    $_POST["ngaytra"], $_POST["soluong"], 0]);
} catch (\Throwable $th) {
    alert("Lỗi hệ thống");
    print_r($stmt->errorInfo());
}

go("/qltv/admin.php?page=borrow");