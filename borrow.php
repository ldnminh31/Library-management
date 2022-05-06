<?php
include_once './database/get.php';
$data = get("SELECT * FROM muonsach");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <?php
    include_once './components/sidebar.php';
    if (isset($_GET["page"])) {
        switch ($_GET["page"]) {
            case 'book':
                include_once './book.php';
                break;
            case 'member':
                include_once './member.php';
                break;
            case 'borrow':
                include_once './borrow.php';
                break;

            default:
                # code...
                break;
        }
    }
    ?>

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
    foreach ($data as $muonsach) {
        # code...
        
        echo "
        <tr>
            <td>" . $muonsach->mathanhvien . "</td>
            <td>" . $muonsach->masach . "</td>
            <td>" . $muonsach->ngaymuon . "</td>
            <td>" . $muonsach->ngaytra . "</td>
            <td>" . $muonsach->trangthai . "</td>
            <td>" . $muonsach->soluong . "</td>

        </tr>
        ";
       
    }
    
    ?>

</table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

