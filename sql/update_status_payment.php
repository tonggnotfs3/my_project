<?php

include("connect.php");


$pay_id = $_GET['pay_id'];

		$sql = "UPDATE `payment` SET `pay_status` = '1'  WHERE `payment`.`pay_id` = '$pay_id'";
		$data = mysqli_query($conn,$sql);


?>
<meta http-equiv="refresh" content = "0;
  url = ../display_payment.php">