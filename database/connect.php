<?php
// ket noi database
$servername = "remotemysql.com";
$username = "CxLjBfh9Ly";
$password = "Ua2IOkrJpz";
$dbname = "CxLjBfh9Ly";
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  exit ("<script>alert('Kết nối CSDL thất bại')</script>");
}