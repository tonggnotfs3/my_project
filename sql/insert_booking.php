<?php

include("connect.php");


$b_c_id = $_POST['b_c_id'];
$b_product = $_POST['b_product'];
$b_amount = $_POST['b_amount'];

		$sql = "INSERT INTO `booking` (`b_cus_id`, `b_pro_id`, `b_amount`, `b_paystatus`, `b_status`) VALUES ('$b_c_id', '$b_product', '$b_amount', '0', '1')";
		$data = mysqli_query($conn,$sql);


?>
