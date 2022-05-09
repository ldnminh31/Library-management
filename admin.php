<?php
include_once './utils/utils.php';
session_start();
if (!isset($_SESSION['username'])) {

    go("./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/a3eb1f9cb2.js" crossorigin="anonymous"></script>
    <style>
        td,
        th {
            vertical-align: middle;
        }

        th {
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="/QLTV/components/sidebar.css" />
    <script>
        function toInputDatetime(datetime) {
            let date = datetime.split(' ')[1]
            let time = datetime.split(' ')[0]
            let hour = time.split(':')[0]
            let minute = time.split(':')[1]
            let year = date.split('/')[2]
            let month = date.split('/')[1]
            let day = date.split('/')[0]
            return `${year}-${month}-${day}T${hour}:${minute}`;
        }
    </script>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>