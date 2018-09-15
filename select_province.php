	<?php include_once("connect.php");
	$sql = "SELECT * FROM province order by PROVINCE_NAME";
	$result = mysqli_query($conn, $sql);
	$num_row = mysqli_num_rows($result);
	echo "<option>เลือกจังหวัด</option>";
	while($row=$result->fetch_assoc()){
		echo"<option value=\"".$row['PROVINCE_ID']."\">".$row['PROVINCE_NAME']."</option>";
			} ?>
