<?php
function alert($str)
{
    echo "<script>alert('".$str."')</script>";
}
function go($des)
{
    echo "<script>window.location.replace('".$des."');</script>";
}
?>