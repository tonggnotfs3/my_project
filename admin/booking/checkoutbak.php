<?php
session_start();
?>
<html>

<head>
  <title>ThaiCreate.Com</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
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
<table width="400" border="1">
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
    <td>
      <?=$objResult["p_price"];?>
    </td>
    <td>
      <?=$_SESSION["strQty"][$i];?>
    </td>
    <td>
      <?=number_format($Total,2);?>
    </td>
  </tr>
  <?php
	  }
  }
  ?>
</table>
Sum Total
<?php echo number_format($SumTotal,2);?>
<br><br>
<form name="form1" method="post" action="save_checkout.php">
  <div class="form-group">
    <label class="control-label col-sm-2" for="p_id">รหัสลูกค้า:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="p_id" id="p_id">
    </div>
  </div>
  <input type="submit" name="Submit" value="Submit">
</form>
<?php
mysqli_close($objCon);
?>
</body>

</html>

<?php /* This code download from www.ThaiCreate.Com */ ?>