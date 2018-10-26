<?php
session_start();

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "my_project";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
if (!$objCon) {
	echo $objCon->connect_error;
	exit();
}

  $Total = 0;
  $SumTotal = 0;

  $strSQL = "
	INSERT INTO orders (OrderDate,customer_id)
	VALUES
	('".date("Y-m-d H:i:s")."','".$_POST["p_id"]."') 
  ";
  $objQuery = mysqli_query($objCon,$strSQL);
  if(!$objQuery)
  {
	echo $objCon->error;
	exit();
  }

  $strOrderID = mysqli_insert_id($objCon);

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO order_detail (OrderID,p_id,qty)
				VALUES
				('".$strOrderID."','".$_SESSION["strProductID"][$i]."','".$_SESSION["strQty"][$i]."') 
			  ";
				mysqli_query($objCon,$strSQL);
				
				$sql1="SELECT product.p_material,product.p_material_use FROM product WHERE product.p_id = '".$_SESSION["strProductID"][$i]."'";
                $result1=$objCon->query($sql1);
                while($row1=$result1->fetch_assoc()){
                    $p_m_id = $row1['p_material'];
                    $meterialuse = $row1['p_material_use'];
								}

								$sum_meterial_use = $meterialuse * $_SESSION["strQty"][$i];

								$sql2 = "UPDATE `material` SET `m_amount` = `m_amount`-'$sum_meterial_use' WHERE `material`.`m_id` = '$p_m_id'";
								mysqli_query($objCon,$sql2);
	  }
  }

mysqli_close($objCon);

//session_destroy();
unset ($_SESSION["intLine"]);
unset ($_SESSION["strProductID"]);
unset ($_SESSION["strQty"]);

header("location:cart_view_order.php?OrderID=".$strOrderID);
?>

<?php /* This code download from www.ThaiCreate.Com */ ?>