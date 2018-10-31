<?php

include("connect.php");


$pay_id = $_POST['pay_id'];
$pay_status = $_POST['pay_status'];
$description = $_POST['description'];
$pay_booking_id = $_POST['pay_booking_id'];
$pay_type = $_POST['pay_type'];

		$sql = "UPDATE payment SET payment.pay_status = '$pay_status' , payment.description = '$description'  WHERE payment.pay_id = '$pay_id'";
		$data = mysqli_query($conn,$sql);


		if ($pay_status == 3 and $pay_type == 2){
			$sql2 = "UPDATE `orders` SET `fin_status` = '2' WHERE `orders`.`OrderID` = '$pay_booking_id'";
			$data2 = mysqli_query($conn,$sql2);

		}


?>
<meta http-equiv="refresh" content = "0;
  url = ../admin/display_payment.php">