	<?php include_once("connect.php");
	$Province_id = isset($_POST['provinceID'])?
	$_POST['provinceID']:"";
	$sql = "SELECT * FROM amphur where PROVINCE_ID='$Province_id' order by AMPHUR_NAME";
	echo $sql;
	$result = mysqli_query($conn, $sql);
	$num_row = mysqli_num_rows($result);
	echo "<option>เลือกอำเภอ</option>";
	while($row=$result->fetch_assoc()){
		echo"<option value=\"".$row['AMPHUR_ID']."\">".$row['AMPHUR_NAME']."</option>";
			} ?>
