
<?php
include_once '../connect.php';
include_once '../../utils/utils.php';
include '../loading.php';
try {
    $sql = "UPDATE muonsach SET mathanhvien=?, masach=?, ngaymuon=?, ngaytra=?, soluong=?, trangthai=? 
    WHERE mathanhvien=? AND ngaymuon=?";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$_POST["mathanhvien"], $_POST["masach"], $_POST["ngaymuon"],
    $_POST["ngaytra"], $_POST["soluong"], $_POST["trangthai"]=='Chưa trả'?0:1, $_POST["mathanhviencu"], 
    $_POST["ngaymuoncu"]]);
} catch (\Throwable $th) {
    alert("Lỗi hệ thống");
    print_r($stmt->errorInfo());
}

go("/qltv/admin.php?page=borrow");