<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="..\asset\css\bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="../asset/js/jquery-3.2.1.min.js"></script>
    <script src="../asset/js/Chart.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css" />
    <script type="text/javascript" src="../DataTables/datatables.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>


<body>
  <?php include("menu.php"); ?>
  <?php

if(!isset($_SESSION["intLine"]))
{
	echo "Cart Empty";
	exit();
}

$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "my_project";

$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($objCon,"utf8");
if (!$objCon) {
    echo $objCon->connect_error;
    exit();
    
  }
?>
  <div class="container">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>
              <span aria-hidden="true"></span> ข้อมูสินค้า</h4>
          </div>
        </div>
        <form action="cart_update.php" method="post">
<table class="table table-striped">
  <tr>
    <td width="101">รหัสสินค้า</td>
    <td width="82">ชื่อสินค้า</td>
    <td align="right" width="82">ราคาต่อชิ้น</td>
    <td width="79">จำนวน</td>
    <td align="right" width="79">ราคา(บาท)</td>
    <td width="10">ลบ</td>
  </tr>
  <?php
  $Total = 0;
  $SumTotal = 0;

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strProductID"][$i] != "")
	  {
		$strSQL = "SELECT * FROM product WHERE p_id = '".$_SESSION["strProductID"][$i]."' ";
		$objQuery = mysqli_query($objCon,$strSQL);
		$objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
		$Total = $_SESSION["strQty"][$i] * $objResult["p_price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
	  <tr>
		<td><?=$_SESSION["strProductID"][$i];?></td>
		<td><?=$objResult["p_name"];?></td>
		<td align="right"><?=$objResult["p_price"];?></td>
		<td><input type="text" name="txtQty<?php echo $i;?>" value="<?php echo $_SESSION["strQty"][$i];?>" size="2"></td>
		<td align="right"><?=number_format($Total,2);?></td>
		<td><a href="cart_delete.php?Line=<?=$i;?>">x</a></td>
	  </tr>
	  <?php
	  }
  }
  ?>
</table>



  <div class="col-md-6"><input class="btn btn-primary" type="submit" value="อัปเดต">
  ยอดรวมทั้งสิ้น <?php echo number_format($SumTotal,2);?> บาท</div>


</form>
<div class="col-md-6" align="right">
<a class="btn btn-success" href="cart_product.php">เลือกสินค้าเพิ่ม</a>
<?php
	if($SumTotal > 0)
	{
?>
	| <a  class="btn btn-info" href="cart_checkout.php">สั่ง</a>
<?php
	}
?>
</div>
<br>
<br>
<?php
mysqli_close($objCon);
?>
      </div>
    </div>
  </div>



</body>

</html>