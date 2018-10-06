<?php

include("connect.php");


$pay_id = $_GET['pay_id'];
$pay_status = $_GET['pay_status'];

		$sql = "UPDATE `payment` SET `pay_status` = '$pay_status'  WHERE `payment`.`pay_id` = '$pay_id'";
		$data = mysqli_query($conn,$sql);


?>
<meta http-equiv="refresh" content = "0;
  url = ../display_payment.php">