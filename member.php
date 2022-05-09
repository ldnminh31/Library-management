<?php
include_once './database/get.php';
$data = get("SELECT * FROM thanhvien");
?>

<div>
    <h1 align="center">Quản lý thành viên</h1>
    <button class="btn btn-primary d-block mx-auto"  data-bs-toggle="modal"
     data-bs-target="#exampleModal">Thêm thông tin thành viên</button>
    <table class="table">
        <tr>
            <th>Mã thành viên</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Ngày đăng ký</th>
            <th>Hành động</th>

        </tr>
        <?php
        $a = [];
        $i = -1;
        foreach ($data as $thanhvien) {
            # code...
            $i++;
            echo '
            <tr>
                <td row="'.$i.'" align="center">' . $thanhvien->mathanhvien . '</td>
                <td row="'.$i.'" align="center">' . $thanhvien->hovaten . '</td>
                <td row="'.$i.'">' . $thanhvien->ngaysinh . '</td>
                <td row="'.$i.'">' . $thanhvien->sdt . '</td>
                <td row="'.$i.'">' . $thanhvien->email . '</td>
                <td row="'.$i.'" align="center">' . $thanhvien->ngaydangky . '</td>
                <td width="150">
                    <button row="'.$i.'"  class="btn btn-primary update" 
                    data-bs-toggle="modal"
                    data-bs-target="#updateModal">Sửa</button>
                    <button row="' . $i . '" class="btn btn-danger">Xóa</button>
                </td>
            </tr>
            ';
        }


        ?>

    </table>
    <!-- delete form -->
    <form id="deleteForm" action="./database/member/delete_member.php">

    </form>
    <!-- modal add -->
    <?php
        include './components/member/add_member_modal.php';
        include './components/member/update_member_modal.php';
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
        // handle delete
        let deleteForm = $('#deleteForm')[0]
        let deleteBtnList = $('.btn-danger')
        for (let i = 0; i < deleteBtnList.length; i++) {
            let btn = deleteBtnList[i];
            let row = btn.getAttribute('row')
            let columnList = $(`td[row="${row}"]`)
            btn.onclick = () => {
                if(confirm("Bạn có muốn xóa thành viên này?") == true){
                    window.location = `./database/member/delete_member.php?mathanhvien=${columnList[0].innerText}`;
                }else{
                    go("/qltv/admin.php?page=member");
                }
            }
        }
        

    </script>

</div>
