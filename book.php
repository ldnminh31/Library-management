<?php
include_once './database/get.php';
$data = get("SELECT * FROM sach");
?>
<table class="table ">
    <tr>
        <th>Tên sách</th>
        <th>Tác giả</th>
        <th>Thể loại</th>
        <th>Mô tả</th>
        <th>Vị trí</th>
        <th>Số lượng sách</th>
    </tr>
    <?php
    foreach ($data as $book) {
        # code...
        echo"
        <tr>
        <td>".$book->tensach."</td>
        <td>".$book->tentacgia."</td>
        <td>".$book->theloai."</td>
        <td>".$book->mota."</td>
        <td>".$book->vitri."</td>
        <td>".$book->soluong."</td>
        </tr>
        ";
    }
    ?>
</table>