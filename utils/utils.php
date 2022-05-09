<?php
function alert($str)
{
    echo "<script>alert('".$str."')</script>";
}
function go($des)
{
    echo "<script>window.location.replace('".$des."');</script>";
}
function formatDateTime($datetime)
{
    $time = explode(' ',$datetime)[1];
    $date = explode(' ',$datetime)[0];
    $day = explode('-',$date)[2];
    $month = explode('-',$date)[1];
    $year = explode('-',$date)[0];
    return $time.' '.$day.'/'.$month.'/'.$year;
}
?>