<?php
if (!isset($_GET["page"]))
    header('Location: /qltv/admin.php');    
include_once './database/get.php';
$data = get("SELECT * FROM muonsach");
// sort handling
if (isset($_GET["field"])) {
    $field = $_GET["field"];
    switch ($field) {
        case 'mathanhvien':
            usort($data, function ($a, $b) {
                $type = $_GET['type'];
                if ($type == 'asc') {
                    return strcmp($a->mathanhvien, $b->mathanhvien);
                } else {
                    return strcmp($b->mathanhvien, $a->mathanhvien);
                }
            });
            break;
        case 'masach':
            usort($data, function ($a, $b) {
                $type = $_GET['type'];
                if ($type == 'asc') {
                    return strcmp($a->masach, $b->masach);
                } else {
                    return strcmp($b->masach, $a->masach);
                }
            });
            break;
        case 'trangthai':
            usort($data, function ($a, $b) {
                $type = $_GET['type'];
                if ($type == 'asc') {
                    return strcmp($a->trangthai, $b->trangthai);
                } else {
                    return strcmp($b->trangthai, $a->trangthai);
                }
            });
            break;
        case 'soluong':
            usort($data, function ($a, $b) {
                $type = $_GET['type'];
                $numa = intval($a->soluong);
                $numb = intval($b->soluong);
                if ($numa == $numb)
                    return 0;
                $res = $numa < $numb ? -1 : 1;
                if ($type == 'dsc')
                    $res = $res == 1 ? -1 : 1;
                return $res;
            });
            break;
        case 'ngaymuon':
            usort($data, function ($a, $b) {
                $type = $_GET['type'];
                $ad = new DateTime($a->ngaymuon);
                $bd = new DateTime($b->ngaymuon);

                if ($ad == $bd) {
                    return 0;
                }
                $res =  $ad < $bd ? -1 : 1;
                if ($type == 'dsc')
                    $res = $res == 1 ? -1 : 1;
                return $res;
            });
            break;
        case 'ngaytra':
            usort($data, function ($a, $b) {
                $type = $_GET['type'];
                $ad = new DateTime($a->ngaytra);
                $bd = new DateTime($b->ngaytra);

                if ($ad == $bd) {
                    return 0;
                }
                $res =  $ad < $bd ? -1 : 1;
                if ($type == 'dsc')
                    $res = $res == 1 ? -1 : 1;
                return $res;
            });
            break;

        default:
            # code...
            break;
    }
}
?>

<div>
    <h1 align="center">Qu???n l?? m?????n s??ch</h1>
    <button class="btn btn-primary d-block mx-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Th??m th??ng tin m?????n s??ch</button>
    <table class="table">
        <tr>
            <th style="cursor: pointer;">M?? th??nh vi??n</th>
            <th style="cursor: pointer ;">M?? s??ch m?????n</th>
            <th style="cursor: pointer">Ng??y m?????n</th>
            <th style="cursor: pointer">Ng??y tr???</th>
            <th style="cursor: pointer">Tr???ng th??i </th>
            <th style="cursor: pointer">S??? l?????ng s??ch</th>
            <th>H??nh ?????ng</th>

        </tr>
        <?php
        $a = [];
        $i = -1;
        foreach ($data as $muonsach) {
            # code...
            $i++;
            echo '
            <tr>
                <td row="' . $i . '" align="center">' . $muonsach->mathanhvien . '</td>
                <td row="' . $i . '" align="center">' . $muonsach->masach . '</td>
                <td row="' . $i . '"  align="center">' . formatDateTime($muonsach->ngaymuon) . '</td>
                <td row="' . $i . '"  align="center">' . formatDateTime($muonsach->ngaytra) . '</td>
                <td row="' . $i . '" align="center">' . ($muonsach->trangthai == 0 ? "Ch??a tr???" : "???? tr???") . '</td>
                <td row="' . $i . '" align="center">' . $muonsach->soluong . '</td>
                <td width="150">
                    <button row="' . $i . '"  class="btn btn-primary update" 
                    data-bs-toggle="modal"
                    data-bs-target="#updateModal">S???a</button>
                    <button row="' . $i . '" class="btn btn-danger">X??a</button>
                </td>
            </tr>
            ';
        }

        ?>

    </table>
    <!-- delete form -->
    <form id="deleteForm" action="./database/borrow/delete_borrow.php">

    </form>
    <!-- modal add -->
    <?php
    include './components/borrow/add_borrow_modal.php';
    include './components/borrow/update_borrow_modal.php';
    ?>
    <script>
        // add default value to from
        let updateBtnList = $('.update')
        let input = $('#update-form')[0]
        for (let i = 0; i < updateBtnList.length; i++) { //for all updateBtnList
            let btn = updateBtnList[i];
            let row = btn.getAttribute('row')
            let columnList = $(`td[row="${row}"]`)
            btn.onclick = () => {
                for (let i = 0; i <= 5; i++) {
                    input[i].defaultValue = columnList[i].innerText;
                }
                input[2].defaultValue = toInputDatetime(input[2].defaultValue)
                input[3].defaultValue = toInputDatetime(input[3].defaultValue)
                input[6].defaultValue = input[0].defaultValue;
                input[7].defaultValue = input[2].defaultValue;
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
                window.location = `./database/borrow/delete_borrow.php?mathanhvien=${columnList[0].innerText}&ngaymuon=${columnList[2].innerText}`;
            }
        }
        // handle sort
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const currentField = urlParams.get('field');
        let type = urlParams.get('type');

        function handleSort(field) {
            if (field === currentField) {
                if (type === 'asc')
                    type = 'dsc'
                else
                    type = 'asc'
            } else type = 'asc'
            window.location = `./admin.php?page=borrow&field=${field}&type=${type}`
        }

        function addIcon(nthChild, fieldName) {
            console.log(nthChild, fieldName)
            if (type === 'asc')
                $(`th:nth-child(${nthChild})`).html(`<i class="fa-solid fa-arrow-up"/><span>${fieldName}</span>`)
            else
                $(`th:nth-child(${nthChild})`).html(`<i class="fa-solid fa-arrow-down"/><span>${fieldName}</span>`)
        }
        let thList = $('th');
        thList[0].onclick = () => handleSort('mathanhvien')
        thList[1].onclick = () => handleSort('masach')
        thList[2].onclick = () => handleSort('ngaymuon')
        thList[3].onclick = () => handleSort('ngaytra')
        thList[4].onclick = () => handleSort('trangthai')
        thList[5].onclick = () => handleSort('soluong')
        switch (currentField) {
            case 'mathanhvien':
                addIcon(1,"M?? th??nh vi??n")
                break;
            case 'masach':
                addIcon(2,"M?? s??ch m?????n")
                break;
            case 'ngaymuon':
                addIcon(3,"Ng??y m?????n")
                break;
            case 'ngaytra':
                addIcon(4,"Ng??y tr???")
                break;
            case 'trangthai':
                addIcon(5,"Tr???ng th??i")
                break;
            case 'soluong':
                addIcon(6,"S??? l?????ng")
                break;
            default:
                break;
        }
    </script>
</div>