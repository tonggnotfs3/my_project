<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../asset\css\bootstrap.css">
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

        <table class="table table-striped">
          <tr>
            <td width="101">รหัสสินค้า</td>
            <td width="82">ชื่อสินค้า</td>
            <td align="right" width="82">ราคาต่อชิ้น</td>
            <td align="right" width="79">จำนวน</td>
            <td align="right" width="79">ราคา</td>
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
            <td>
              <?=$_SESSION["strProductID"][$i];?>
            </td>
            <td>
              <?=$objResult["p_name"];?>
            </td>
            <td align="right">
              <?=$objResult["p_price"];?>
            </td>
            <td align="right">
              <?=$_SESSION["strQty"][$i];?>
            </td>
            <td align="right">
              <?=number_format($Total,2);?>
            </td>
          </tr>
          <?php
	  }
  }
  ?>
        </table>
        <br>

        <div align="right" style="font-size:16px;">
          ราคารวม
          <?php echo number_format($SumTotal,2);?>
          บาท
        </div>
        <br>
        <div align="right">
          <form class="form-inline" name="form1" method="post" action="cart_save_checkout.php">
            <div class="form-group">
            <input type="hidden" class="form-control" name="sumtotal" id="sumtotal" value=<?php echo number_format($SumTotal,2);?>>
              <label for="p_id">รหัสลูกค้า:</label>
              <input type="text" class="form-control" name="p_id" id="p_id">
              <label for="p_id">กำหนดส่งสินค้า:</label>
              <input type="date" class="form-control" id="datesend" name="datesend"
           min="2018-01" value="2018-01" />
            </div>
            <input class="btn btn-info" type="submit" name="Submit" value="ตกลง">
          </form>
        </div>

        <?php
mysqli_close($objCon);
?>

        <br>
        <br>

      </div>
    </div>
  </div>



</body>

</html>