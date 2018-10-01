	<?php include_once("connect.php");
	$sql = "SELECT * FROM product order by product.p_id";
	$result = mysqli_query($conn, $sql);
	$num_row = mysqli_num_rows($result);
	echo "<option>เลือกสินค้า</option>";
	while($row=$result->fetch_assoc()){
		echo"<option value=\"".$row['p_id']."\">".$row['p_name']."</option>";
			} ?>
