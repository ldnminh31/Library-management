<?php
include_once '../connect.php';
include_once '../../utils/utils.php';
try {
    $sql = "INSERT INTO `thanhvien` (`mathanhvien`, `hovaten`, `ngaysinh`, `sdt`, `email`, `ngaydangky`) VALUES
    (?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_POST["mathanhvien"], $_POST["hovaten"], $_POST["ngaysinh"],
    $_POST["sdt"], $_POST["email"], $_POST["ngaydangky"]]);
} catch (\Throwable $th) {
    alert("Lỗi hệ thống");
}

go("/qltv/admin.php?page=member");