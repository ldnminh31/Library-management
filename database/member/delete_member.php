<?php
include_once '../connect.php';
include_once '../../utils/utils.php';
include '../loading.php';
var_dump($_GET);
try {
    $sql = "DELETE from thanhvien WHERE mathanhvien=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_GET["mathanhvien"]]);
} catch (\Throwable $th) {
    alert("Lỗi hệ thống");
}

go("/qltv/admin.php?page=member");