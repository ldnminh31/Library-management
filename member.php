<?php
// connnect
$db = mysqli_connect("remotemysql.com", "CxLjBfh9Ly", "Ua2IOkrJpz", "CxLjBfh9Ly");
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
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
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>SĐT</th>
            <th>Email </th>
            <th>Ngày đăng ký</th>
            <th>Hành động</th>
        </tr>
            <?php
            $records = mysqli_query($db, "SELECT * FROM thanhvien");
            while ($data = mysqli_fetch_array($records)) {
            ?>
                <tr>
                    <th><?php echo $data['mathanhvien']; ?></th>
                    <th><?php echo $data['hovaten']; ?></th>
                    <th><?php echo $data['ngaysinh']; ?></th>
                    <th><?php echo $data['sdt']; ?></th>
                    <th><?php echo $data['email']; ?></th>
                    <th><?php echo $data['ngaydangky']; ?></th>
                    
                    <th><a  onclick="return confirm('Bạn có chắc sẽ xóa thành viên?');" class="btn-del" href="delete_member.php?mathanhvien=<?php echo $data['mathanhvien']; ?>">Xóa</a></th>
                </tr>
            <?php
            }
            ?>

        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>