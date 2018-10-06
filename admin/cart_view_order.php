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


  $strSQL = "SELECT * FROM customer,orders,amphur,province,districts WHERE customer.c_id = orders.customer_id AND customer.province = province.PROVINCE_ID AND customer.amphur = amphur.AMPHUR_ID AND customer.districts = districts.DISTRICT_ID AND OrderID = '".$_GET["OrderID"]."' ";
  $objQuery = mysqli_query($objCon,$strSQL);
  $objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
  <div class="container">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>
              <span aria-hidden="true"></span>ข้อมูลการจองสินค้า</h4>
          </div>
        </div>

        <table class="table table-striped">
          <tr>
            <td width="71">OrderID</td>
            <td width="217">
              <?=$objResult["OrderID"];?>
            </td>
          </tr>
          <tr>
            <td width="71">Name</td>
            <td width="217">
              <?=$objResult["fristname"].$objResult["lastname"];?>
            </td>
          </tr>
          <tr>
            <td>Address</td>
            <td>
              <?=$objResult["address"].$objResult["DISTRICT_NAME"].$objResult["AMPHUR_NAME"].$objResult["PROVINCE_NAME"];?>
            </td>
          </tr>
          <tr>
            <td>Tel</td>
            <td>
              <?=$objResult["tel"];?>
            </td>
          </tr>
        </table>
        <br>

        รายการสินค้า
        <br>

        <table class="table table-striped">
          <tr>
            <td width="101">ProductID</td>
            <td width="82">ProductName</td>
            <td width="82">Price</td>
            <td width="79">Qty</td>
            <td width="79">Total</td>
          </tr>
          <?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM order_detail WHERE OrderID = '".$_GET["OrderID"]."' ";
$objQuery2 = mysqli_query($objCon,$strSQL2);

while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC))
{
		$strSQL3 = "SELECT * FROM product WHERE p_id = '".$objResult2["p_id"]."' ";
		$objQuery3 = mysqli_query($objCon,$strSQL3);
		$objResult3 = $objResult = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);
		$Total = $objResult2["qty"] * $objResult3["p_price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
          <tr>
            <td>
              <?=$objResult2["p_id"];?>
            </td>
            <td>
              <?=$objResult3["p_name"];?>
            </td>
            <td>
              <?=$objResult3["p_price"];?>
            </td>
            <td>
              <?=$objResult2["qty"];?>
            </td>
            <td>
              <?=number_format($Total,2);?>
            </td>
          </tr>
          <?php
 }
  ?>
        </table>
        Sum Total
        <?php echo number_format($SumTotal,2);?>

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