<?php

include("connect.php");


$b_id = $_GET['b_id'];

		$sql = "UPDATE `booking` SET `b_status` = '0'  WHERE `booking`.`b_id` = '$b_id'";
		$data = mysqli_query($conn,$sql);


?>
<meta http-equiv="refresh" content = "0;
  url = ../display_booking.php">