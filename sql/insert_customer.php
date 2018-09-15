<?php

include("connect.php");

$department = $_POST['department'];
$username = $_POST['username'];
$password = $_POST['password'];
$fristname = $_POST['fristname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$province = $_POST['province'];
$amphur = $_POST['amphur'];
$districts = $_POST['districts'];
$tel = $_POST['tel'];

		$sql = "INSERT INTO `customer` (`username`, `password`, `fristname`, `lastname`, `address`, `province`, `amphur`, `districts`, `tel`, `department`, `c_status`) VALUES ('$username', '$password', '$fristname', '$lastname', '$address', '$province', '$amphur', '$districts', '$tel', '$department', '1');";
		$data = mysqli_query($conn,$sql);


?>
