<div>
    <?php
    include_once './database/get.php';
    $data = get("SELECT * FROM sach");
    ?>
    <hr>
    <!-- Xay dung frm tim kiem -->
    <link rel="stylesheet" href="./css/style.css">
    <div class="tim-kiem">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="fs-4 text-center"><b>Tìm kiếm sách - Hãy nhập từ khóa</b></p>
                </div>
                <div class="col-12">
                    <form action="" method="post">
                        <input type="text" name="search" value="">
                        <button type="submit" name="ok" value="search">Tìm kiếm</button>
                        <button><a href="./filter.php">Lọc sách nâng cao</a></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <hr>
    <?php
    // tim kiem
    if (isset($_REQUEST['ok'])) {
        // Gán hàm addslashes để chống sql injection
        $search = addslashes($_POST['search']);

        // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
        if (empty($search)) {
            echo "<p class='fs-5 text-center'>Nhập từ khóa!</p>";
        } else {


            // Kết nối sql
            $con =  mysqli_connect("localhost", "root", "", "qltv");


            $sql = mysqli_query($con, "select * from sach where tensach like '%$search%'");

            // Đếm số đong trả về trong sql.
            $num = mysqli_num_rows($sql);

            // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
            if ($num > 0 && $search != "") {
                // Dùng $num để đếm số dòng trả về.
                echo "<p class='fs-5 text-center num-result'>$num Kết quả trả về với từ khóa <b>$search</b></p>";
                echo '<div class="container-fluid result">';
                echo '<div class="row">';
                echo "<div class='col-2 text-center'><b>Tên sách</b></div>";
                echo "<div class='col-2 text-center'><b>Tác giả</b></div>";
                echo "<div class='col-2 text-center'><b>Thể loạ</b>i</div>";
                echo "<div class='col-4 text-center'><b>Mô tả</b></div>";
                echo "<div class='col-1 text-center'><b>Vị trí</b></div>";
                echo "<div class='col-1 text-center'><b>Số lượng</b></div>";
                echo "<hr>";
                echo '</div>';
                echo '</div>';
                // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                echo '<div class="container-fluid result">';
                while ($row = mysqli_fetch_assoc($sql)) {
                    echo '<div class="row">';
                    echo "<div class='col-2'>{$row['tensach']}</div>";
                    echo "<div class='col-2'>{$row['tentacgia']}</div>";
                    echo "<div class='col-2'>{$row['theloai']}</div>";
                    echo "<div class='col-4'>{$row['mota']}</div>";
                    echo "<div class='col-1'>{$row['vitri']}</div>";
                    echo "<div class='col-1'>{$row['soluong']}</div>";
                    echo '</div>';
                    echo '<hr>';
                }
                echo '</div>';
            } else {
                echo "<p class='fs-5 text-center'>Không có từ khóa phù hợp</p>";
            }
        }
    }
    ?>


    <!-- Load db -->
    <p class="fs-4 text-center"><b>Tất cả sách trong thư viện</b></p>
    <button class="btn btn-primary mx-auto d-block" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm sách</button>
    <table class="table ">
        <tr>
            <th class="text-center">STT</th>
            <th class="text-center">Tên sách</th>
            <th class="text-center">Tác giả</th>
            <th class="text-center">Thể loại</th>
            <th class="text-center">Mô tả</th>
            <th class="text-center">Vị trí</th>
            <th class="text-center">Số lượng sách</th>
        </tr>
        <?php
        foreach ($data as $book) {
            # code...
            echo "
            <tr>
            <td>" . $book->masach . "</td>
            <td>" . $book->tensach . "</td>
            <td>" . $book->tentacgia . "</td>
            <td>" . $book->theloai . "</td>
            <td>" . $book->mota . "</td>
            <td>" . $book->vitri . "</td>
            <td>" . $book->soluong . "</td>
            </tr>
            ";
        }
        ?>
    </table>
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