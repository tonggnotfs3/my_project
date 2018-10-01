	<?php include_once("connect.php");
	$sql = "SELECT * FROM material order by material.m_id";
	$result = mysqli_query($conn, $sql);
	$num_row = mysqli_num_rows($result);
	echo "<option>เลือกวัตถุดิบ</option>";
	while($row=$result->fetch_assoc()){
		echo"<option value=\"".$row['m_id']."\">".$row['m_name']."</option>";
			} ?>
