<?php 

include("connect.php");

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM customer WHERE username='".$username."' AND password='".$password."'";
$result = mysqli_query($conn, $sql);
$num_row = mysqli_num_rows($result);
$row=$result->fetch_assoc();
if( $num_row == 1 ) {
	if($row['level_id']=='1'){
		echo '1';
	$_SESSION['person_id'] = $row['c_id'];
	$_SESSION['person_name'] = $row['fristname']." ".$row['lastname']; 
	$_SESSION['level_id'] = $row['level'];
	}
	elseif($row['level_id']=='2'){
		echo '2';
	$_SESSION['person_id'] = $row['c_id'];
	$_SESSION['person_name'] = $row['fristname']." ".$row['lastname'];
	$_SESSION['level_id'] = $row['level'];
	}
	}
else {
	echo 'false';
}
?>