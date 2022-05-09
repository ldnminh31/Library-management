<?php
include_once '../connect.php';
include_once '../../utils/utils.php';

try {
    $sql = "INSERT INTO `sach` (`tensach`, `tentacgia`, `theloai`, `mota`, `vitri`, `soluong`) VALUES
    (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST["tensach"], $_POST["tentacgia"], $_POST["theloai"],
        $_POST["mota"], $_POST["vitri"], $_POST["soluong"]
    ]);
} catch (\Throwable $th) {
    alert("Lỗi hệ thống");
}
go("/qltv/admin.php?page=book");
