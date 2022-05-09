<?php
include_once './utils/utils.php';
session_start();
if (!isset($_SESSION['username'])) {
    go("./index.php");
}
// include('./components/sidebar.php');
include('./database/db-con.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lọc nâng cao</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/jquery-ui.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <br />
            <h2 align="center">Lọc Nâng Cao</h2>
            <br />
            <div class="col-md-3">
                <!-- the loai -->
                <div class="list-group">
                    <a class="btn btn-primary" href="./admin.php?page=book">Trở về</a>
                    <h3>Thể loại</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        <?php

                        $query = "SELECT DISTINCT(theloai) FROM sach ";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        foreach ($result as $row) {
                        ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector theloaifilter" value="<?php echo $row['theloai']; ?>"> <?php echo $row['theloai']; ?></label>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
                <!-- tacgia -->
                <div class="list-group">
                    <h3>Tác giả</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                        <?php

                        $query = "SELECT DISTINCT(tentacgia) FROM sach";
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        foreach ($result as $row) {
                        ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="common_selector tacgiafilter" value="<?php echo $row['tentacgia']; ?>"> <?php echo $row['tentacgia']; ?></label>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>

            </div>

            <div class="col-md-9">
                <br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
    <style>
        #loading {
            text-align: center;
            background: url('loader.gif') no-repeat center;
            height: 150px;
        }
    </style>

    <script>
        $(document).ready(function() {

            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'fetch_data';
                var theloaifilter = get_filter('theloaifilter');
                var tacgiafilter = get_filter('tacgiafilter');
                $.ajax({
                    url: "fetch_data.php",
                    method: "POST",
                    data: {
                        action: action,
                        theloaifilter: theloaifilter,
                        tacgiafilter: tacgiafilter
                    },
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }

            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });
                return filter;
            }

            $('.common_selector').click(function() {
                filter_data();
            });



        });
    </script>

</body>

</html>