<?php
include_once '../connect.php';
include_once '../../utils/utils.php';
// include '../loading.php';
var_dump($_GET);
try {
    $sql = "DELETE from muonsach WHERE mathanhvien=? AND ngaymuon=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_GET["mathanhvien"], $_GET["ngaymuon"]]);
} catch (\Throwable $th) {
    alert("Lỗi hệ thống");
}

// go("/qltv/admin.php?page=borrow");