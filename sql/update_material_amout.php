<?php

include("connect.php");


$m_id = $_POST['m_id'];

$m_amount = $_POST['m_amount'];


		$sql = "UPDATE `material` SET `m_amount` = `m_amount` + '$m_amount'  WHERE `material`.`m_id` = '$m_id'";
		$data = mysqli_query($conn,$sql);


?>
