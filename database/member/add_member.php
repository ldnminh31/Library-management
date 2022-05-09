<?php
include_once '../connect.php';
include_once '../../utils/utils.php';
//check exist
$stmt = $conn->prepare('SELECT * FROM thanhvien WHERE mathanhvien=?');
$stmt->execute([$_POST["mathanhvien"]]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row){
    alert("Mã thành viên đã tồn tại");
    go("/qltv/admin.php?page=member");
}
//
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
