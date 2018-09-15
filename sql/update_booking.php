<?php

include("connect.php");


$b_id = $_POST['b_id'];
$b_cus_id = $_POST['b_cus_id'];
$b_amount = $_POST['b_amount'];

		$sql = "UPDATE `booking` SET `b_cus_id` = '$b_cus_id ' ,`b_amount` = '$b_amount' WHERE `booking`.`b_id` = '$b_id'";
		$data = mysqli_query($conn,$sql);


?>
