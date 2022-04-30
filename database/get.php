<?php
function get($sql)
{
    include_once './database/connect.php';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $res = $stmt;
    $fun_res = [];
    foreach ($res as $value) {
        array_push($fun_res, (object)$value);
    }
    return $fun_res;
}
