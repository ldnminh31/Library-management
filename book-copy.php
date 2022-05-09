<?php
if (!isset($_GET["page"]))
    header('Location: /qltv/admin.php');
?>
<link rel="stylesheet" href="./css/style.css">
<div>
    <!-- Toolbar -->
    <p class="fs-4 text-center title"><b>Quản lý sách</b></p>
    <div style="display: flex; justify-content: center">
        <button style="height: 35px" class="btn btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm sách</button>
        <form style="height: 35px; display: flex; justify-content: center" action="" method="post">
            <input style="height: 35px" class="input-group-text" type="text" name="search" value="">
            <button style="height: 35px" class="btn btn-secondary mx-1" type="submit" name="ok" value="search">Tìm kiếm</button>
            <a class="btn btn-default" href="./filter.php">Lọc sách nâng cao</a>
        </form>
    </div>
    <hr>
    <?php
    // tim kiem
    include_once './database/get.php';
    // Gán hàm addslashes để chống sql injection
    if (!isset($_POST['search']) || empty(trim($_POST["search"]))) {
        $data = get("SELECT * FROM sach");
    } else {
        $search = addslashes($_POST['search']);
        $data = get("SELECT * FROM sach WHERE LOWER(tensach) LIKE CONCAT('%', CONVERT(LOWER('$search'), BINARY), '%')");
        // Đếm số đong trả về trong sql.
        $num = count($data);

        // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
        if ($num > 0 && $search != "") {
            echo "<p class='fs-5 text-center num-result'>$num Kết quả trả về với từ khóa <b>$search</b></p>";
        } else {
            echo "<p class='fs-5 text-center'>Không tìm thấy kết quả phù hợp với từ khóa</p>";
        }
    }
    ?>
    <!-- book list -->
    <div style="padding: 0 20px">
        <?php
        //Pagination
        $currentPage = isset($_GET["pagination"]) ? $_GET["pagination"] : 1;
        $totalPage = ceil((float)count($data) / 5);
        $data = array_slice($data, 5 * ($currentPage - 1), 5);
        //
        foreach ($data as $book) {
            echo '
                <div class="card" style="width: 100%; flex-direction: row; margin: auto">
                <img style="min-width: 200px; max-width: 200px;" src="./images/' . $book->sach_image . '" class="card-img-top" alt="">
                <div class="card-body">
                  <h5 style="color: #5693f5" class="card-title">' . $book->tensach . '</h5>
                  <table>
                        <tr>
                            <th width="100"></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; font-weight: bold">Mã sách:</td>
                            <td>' . $book->masach . '</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; font-weight: bold">Tác giả:</td>
                            <td>' . $book->tentacgia . '</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; font-weight: bold">Thể loại:</td>
                            <td>' . $book->theloai . '</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; font-weight: bold">Mô tả:</td>
                            <td>' . $book->mota . '</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; font-weight: bold">Vị trí:</td>
                            <td>' . $book->vitri . '</td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; font-weight: bold">Số lượng:</td>
                            <td>' . $book->soluong . '</td>
                        </tr>
                  </table>
                </div>
              </div>
                ';
        }

        ?>
    </div>
    <!-- Pagination pane -->
    <nav aria-label="Page navigation example" class="mx-auto d-flex justify-content-center mt-3">
        <ul class="pagination">
            <?php
            //Pagination pane
            for ($i = 1; $i <= $totalPage; $i++) {
                echo '<li class="page-item '.($i==$currentPage?'active':'').'"><a class="page-link" href="./admin.php?page=book&pagination='.$i.'">'.$i.'</a></li>';
            }
            ?>
        </ul>
    </nav>
    <!-- modal them sach -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm sách</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="./database/book/add_book.php" target="_blank">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                            <input name="tensach" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input name="tentacgia" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Thể loại</label>
                            <input name="theloai" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                            <input name="mota" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Vị trí</label>
                            <input name="vitri" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số lượng</label>
                            <input name="soluong" required type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>