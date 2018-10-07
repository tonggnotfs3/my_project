<?php

include("connect.php");


$pay_id = $_POST['pay_id'];
$pay_status = $_POST['pay_status'];

		$sql = "UPDATE payment SET payment.pay_status = '$pay_status' WHERE payment.pay_id = '$pay_id'";
		$data = mysqli_query($conn,$sql);


?>
<meta http-equiv="refresh" content = "0;
  url = ../display_payment.php">