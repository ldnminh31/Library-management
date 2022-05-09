<?php
include('./database/db-con.php');
?>
<!-- Page Content -->
<div class="container mt-3">
    <div class="row">
        <br />
        <div class="d-flex justify-content-center">
            <!-- the loai -->
            <div class="list-group">
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

        <div>
            <br />
            <div class="filter_data">

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
                    console.log(data)
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