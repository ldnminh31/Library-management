<?php
session_start();
session_destroy();
include_once './utils/utils.php';
go('./index.php');
?>

