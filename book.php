<?php
include_once './database/get.php';
$data = get("SELECT * FROM sach");
?>
<table class="table ">
    <tr>
        <th>Tên sách</th>
        <th>Tác giả</th>
        <th>Mô tả</th>
        <th>Số lượng tổng</th>
        <th>Số lượng hiện có</th>
    </tr>
    <?php
    foreach ($data as $book) {
        # code...
        echo"
        <tr>
        <td>".$book->tensach."</td>
        <td>".$book->tentacgia."</td>
        <td>".$book->mota."</td>
        <td>".$book->soluong."</td>
        <td>".$book->soluonghienco."</td>
        </tr>
        ";
    }
    ?>
</table>