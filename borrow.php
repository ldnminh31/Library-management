<?php
include_once './database/get.php';
$data = get("SELECT * FROM muonsach");
?>

<div>
    <h1 align="center">Quản lý mượn sách</h1>
    <button class="btn btn-primary d-block mx-auto"  data-bs-toggle="modal"
     data-bs-target="#exampleModal">Thêm thông tin mượn sách</button>
    <table class="table">
        <tr>
            <th>Mã thành viên</th>
            <th>Mã sách mượn</th>
            <th>Ngày mượn</th>
            <th>Ngày trả</th>
            <th>Trạng thái </th>
            <th>Số lượng sách</th>
            <th>Hành động</th>

        </tr>
        <?php
        $a = [];
        $i = -1;
        foreach ($data as $muonsach) {
            # code...
            $i++;
            echo '
            <tr>
                <td row="'.$i.'" align="center">' . $muonsach->mathanhvien . '</td>
                <td row="'.$i.'" align="center">' . $muonsach->masach . '</td>
                <td row="'.$i.'">' . $muonsach->ngaymuon . '</td>
                <td row="'.$i.'">' . $muonsach->ngaytra . '</td>
                <td row="'.$i.'">' . $muonsach->trangthai . '</td>
                <td row="'.$i.'" align="center">' . $muonsach->soluong . '</td>
                <td>
                    <button row="'.$i.'"  class="btn btn-primary update" 
                    data-bs-toggle="modal"
                    data-bs-target="#updateModal">Sửa</button>
                    <button row="'.$i.'" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            ';
        }

        ?>

    </table>
    <!-- modal add -->
    <?php
        include './components/borrow/add_borrow_modal.php';
        include './components/borrow/update_borrow_modal.php';
    ?>
    <script>
        // add default value to from
        let btnList = $('.update')
        let input = $('#update-form')[0]
        for (let i = 0;i<btnList.length;i++){ //for all btnList
            let btn = btnList[i];
            let row = btn.getAttribute('row')
            let columnList = $(`td[row="${row}"]`)
            btn.onclick = () => {                 
                for (let i = 0;i<=5;i++){
                    input[i].defaultValue=columnList[i].innerText;
                }
            }
        }
        

    </script>
</div>