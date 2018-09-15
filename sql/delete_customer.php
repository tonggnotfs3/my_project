<?php

include("connect.php");


$c_id = $_GET['c_id'];

		$sql = "UPDATE `customer` SET `c_status` = '0'  WHERE `customer`.`c_id` = '$c_id'";
		$data = mysqli_query($conn,$sql);


?>
<meta http-equiv="refresh" content = "0;
  url = ../display_customer.php">