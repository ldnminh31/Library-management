<?php
    $db = mysqli_connect("remotemysql.com", "CxLjBfh9Ly", "Ua2IOkrJpz", "CxLjBfh9Ly");
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $mathanhvien = $_GET['mathanhvien']; // dung phuong thuc GET

$del = mysqli_query($db,"DELETE FROM thanhvien where mathanhvien = '$mathanhvien'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:member.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Lỗi, ko xóa được!"; // display error message if not delete
}
