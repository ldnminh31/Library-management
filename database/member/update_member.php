<?php
include_once '../connect.php';
include_once '../../utils/utils.php';
include_once '../loading.php';
try {
    $sql = "UPDATE thanhvien SET mathanhvien=?, hovaten=?, ngaysinh=?, sdt=?, email=?, ngaydangky=? 
    WHERE mathanhvien=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST["mathanhvien"], $_POST["hovaten"], $_POST["ngaysinh"],
        $_POST["sdt"], $_POST["email"], $_POST["ngaydangky"], $_POST["mathanhvien"]
    ]);
} catch (\Throwable $th) {
    alert("Lỗi hệ thống");
}

go("/qltv/admin.php?page=member");

