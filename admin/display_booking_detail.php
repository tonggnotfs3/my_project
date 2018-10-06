<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="asset\css\bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="asset/js/jquery-3.2.1.min.js"></script>
    <script src="asset/js/Chart.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>



<body>
    <?php include("menu.php"); ?>
    <div class="container">


        <?php 
        require_once 'connect.php';
        $bookingid = $_GET["StrOrderID"];
        $sql="SELECT * FROM `order_detail`,product WHERE order_detail.p_id = product.p_id AND order_detail.OrderID = $bookingid";
        $result=$conn->query($sql);
      ?>

        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>
                            <span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span>ข้อมูลการจองสินค้า</h4>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td width="101">รหัสสินค้า</td>
                            <td width="82">ชื่อสินค้า</td>
                            <td width="82">ราคา</td>
                            <td width="79">จำนวนที่สั่ง</td>
                            <td width="79">ราคารวม</td>
                        </tr>
                    </thead>
                    <?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM order_detail WHERE OrderID = '".$_GET["StrOrderID"]."' ";
$objQuery2 = mysqli_query($conn,$strSQL2);

while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC))
{
		$strSQL3 = "SELECT * FROM product WHERE p_id = '".$objResult2["p_id"]."' ";
		$objQuery3 = mysqli_query($conn,$strSQL3);
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
                <div align="right">
                    ยอดทั้งหมด
                    <?php echo number_format($SumTotal,2);?> บาท <br>
                    <a href="add_payment.php?StrOrderID=<?php echo $bookingid;?>" class="btn btn-info">อัพโหลดหลักฐานการชำรเงิน</a>
                    <br>
                </div>
                <br>
            </div>
        </div>
    </div>



</body>

</html>