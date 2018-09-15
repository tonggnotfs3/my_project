<?php

include("connect.php");


$p_id = $_GET['p_id'];

		$sql = "UPDATE `product` SET `p_status` = '0'  WHERE `product`.`p_id` = '$p_id'";
		$data = mysqli_query($conn,$sql);


?>
<meta http-equiv="refresh" content = "0;
  url = ../display_product.php">