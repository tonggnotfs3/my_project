<?php

include("connect.php");


$m_id = $_GET['m_id'];

		$sql = "UPDATE `material` SET `m_status` = '0'  WHERE `material`.`m_id` = '$m_id'";
		$data = mysqli_query($conn,$sql);


?>
<meta http-equiv="refresh" content = "0;
  url = ../display_matti.php">