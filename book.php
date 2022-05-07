<?php
include_once './database/get.php';
$data = get("SELECT * FROM sach");
?>
<form>
    <div class="input-group">
        <div class="form-outline">
            <input type="search" id="form1" class="form-control" />
            <label class="form-label" for="form1">Search</label>
        </div>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
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
        echo "
        <tr>
        <td>" . $book->tensach . "</td>
        <td>" . $book->tentacgia . "</td>
        <td>" . $book->mota . "</td>
        <td>" . $book->soluong . "</td>
        <td>" . $book->soluonghienco . "</td>
        </tr>
        ";
    }
    ?>
</table>