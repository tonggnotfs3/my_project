<?php

include("connect.php");


$m_name = $_POST['m_name'];
$m_amount = $_POST['m_amount'];
$m_unit = $_POST['m_unit'];

		$sql = "INSERT INTO `material` (`m_name`, `m_amount`, `m_unit`, `m_status`) VALUES ('$m_name', '$m_amount', '$m_unit', '1')";
		$data = mysqli_query($conn,$sql);


?>
