<?php

include("connect.php");


$m_id = $_POST['m_id'];
$m_name = $_POST['m_name'];
$m_amount = $_POST['m_amount'];
$m_unit = $_POST['m_unit'];

		$sql = "UPDATE `material` SET `m_name` = '$m_name ' ,`m_amount` = '$m_amount' ,`m_unit` = '$m_unit'  WHERE `material`.`m_id` = '$m_id'";
		$data = mysqli_query($conn,$sql);


?>
