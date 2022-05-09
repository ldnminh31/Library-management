<?php

//fetch_data.php
include('./database/db-con.php');
include_once './database/get.php';
if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM sach WHERE sach_status = '1'
	";

	if(isset($_POST["theloaifilter"]))
	{
		$theloai_filter = implode("','", $_POST["theloaifilter"]);
		$query .= "
		 AND theloai IN('".$theloai_filter."')
		";
	}
	if(isset($_POST["tacgiafilter"]))
	{
		$tacgia_filter = implode("','", $_POST["tacgiafilter"]);
		$query .= "
		 AND tentacgia IN('".$tacgia_filter."')
		";
	}

	$data = get($query);
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					<img src="images/'. $row['sach_image'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="">'. $row['tensach'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['tentacgia'] .'</h4>
					<p>Thể loại : '. $row['theloai'].'<br />
					Vị trí sách : '. $row['vitri'] .' <br />
					Số lượng : '. $row['soluong'] .'<br />
					 </p>
				</div>

			</div>
			';
		}
	}
	else
	{
		$output = '<h3>Không có dữ liệu tương ứng</h3>';
	}
	echo $output;
}


