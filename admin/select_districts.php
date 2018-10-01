	<?php include_once("connect.php");
	$Amphur_id = isset($_POST['amphurID'])?
	$_POST['amphurID']:"";
	$sql = "SELECT * FROM districts where AMPHUR_ID='$Amphur_id' order by DISTRICT_NAME";
	echo $sql;
	$result = mysqli_query($conn, $sql);
	$num_row = mysqli_num_rows($result);
	echo "<option>เลือกตำบล</option>";
	while($row=$result->fetch_assoc()){
		echo"<option value=\"".$row['DISTRICT_ID']."\">".$row['DISTRICT_NAME']."</option>";
			} ?>
