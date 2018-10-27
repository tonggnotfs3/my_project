<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>


<body  onLoad='javascript:window.print();'>
    <?php

//declare(strict_types=1);

function bahtText(float $amount): string
{
    [$integer, $fraction] = explode('.', number_format(abs($amount), 2, '.', ''));

    $baht = convert($integer);
    $satang = convert($fraction);

    $output = $amount < 0 ? 'ลบ' : '';
    $output .= $baht ? $baht.'บาท' : '';
    $output .= $satang ? $satang.'สตางค์' : 'ถ้วน';

    return $baht.$satang === '' ? 'ศูนย์บาทถ้วน' : $output;
}

function convert(string $number): string
{
    $values = ['', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า'];
    $places = ['', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน'];
    $exceptions = ['หนึ่งสิบ' => 'สิบ', 'สองสิบ' => 'ยี่สิบ', 'สิบหนึ่ง' => 'สิบเอ็ด'];

    $output = '';

    foreach (str_split(strrev($number)) as $place => $value) {
        if ($place % 6 === 0 && $place > 0) {
            $output = $places[6].$output;
        }

        if ($value !== '0') {
            $output = $values[$value].$places[$place % 6].$output;
        }
    }

    foreach ($exceptions as $search => $replace) {
        $output = str_replace($search, $replace, $output);
    }

    return $output;
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

  $strSQL = "SELECT * FROM customer,orders,amphur,province,districts WHERE customer.c_id = orders.customer_id AND customer.province = province.PROVINCE_ID AND customer.amphur = amphur.AMPHUR_ID AND customer.districts = districts.DISTRICT_ID AND OrderID = '".$_GET["StrOrderID"]."' ";
  $objQuery = mysqli_query($objCon,$strSQL);
  $objResult = $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
    <table width="790" height="341">
        <tr>
            <td height="207">
                <table width="765" height="176" >
                    <tr>
                        <td width="146" height="49"><img style="width:90%;height:90%" src="../pic/logo2.png"></td>
                        <td width="603" align="center">ห้างหุ้นส่วนจำกัด เค พี ยู ซัพพลาย<br>99 หมู่ 2 ตำบลบ่ตาโล่
                            อำเภอวังน้อย จังหวัดพระนครศรีอยุทธยา 13170<br>โทร. 095-740-6555</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="126">
                <table width="790" height="112" border="1">
                    <tr>
                        <td width="384">
                            ชื่อบรัษัท
                            <?=$objResult["department"];?><br>
                            ชื่อลูกค้า
                            <?=$objResult["fristname"];?>&nbsp;
                            <?=$objResult["lastname"];?><br>
                            ที่อยู่
                            <?=$objResult["address"].$objResult["DISTRICT_NAME"].$objResult["AMPHUR_NAME"].$objResult["PROVINCE_NAME"];?><br>
                            เบอร์โทร
                            <?=$objResult["tel"];?>
                        </td>

            </td>
            <td width="384">
                เลขที่
                <?=$objResult["OrderID"];?><br>
                <?php
            $date = date('Y-m-d H:i:s');
            echo "วันที่".$date;
            ?>

            </td>
        </tr>
    </table>
    </td>
    </tr>
    </table>
    <br>
    <table width="790" border="1">
        <thead>
            <tr>
                <th width="101">ProductID</th>
                <th width="82">ProductName</th>
                <th width="82">Price</th>
                <th width="79">Qty</th>
                <th width="79">Total</th>
            </tr>
        </thead>
        <?php

$Total = 0;
$SumTotal = 0;

$strSQL2 = "SELECT * FROM order_detail WHERE OrderID = '".$_GET["StrOrderID"]."' ";
$objQuery2 = mysqli_query($objCon,$strSQL2);

while($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC))
{
		$strSQL3 = "SELECT * FROM product WHERE p_id = '".$objResult2["p_id"]."' ";
		$objQuery3 = mysqli_query($objCon,$strSQL3);
		$objResult3 = $objResult = mysqli_fetch_array($objQuery3,MYSQLI_ASSOC);
		$Total = $objResult2["qty"] * $objResult3["p_price"];
		$SumTotal = $SumTotal + $Total;
	  ?>
        <tr >
            <td class="mytable">
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

    <br>

    <table width="790" border="1">
        <tr>
            <td width="260" align="center">
                <?php echo "(".bahtText($SumTotal).")"; ?>
            </td>
            <td width="260" align="right">จำนวนเงินทั้งสิ้น</td>
            <td width="260" align="right">
                <?php echo number_format($SumTotal,2);?> บาท
            </td>
        </tr>
    </table>
</body>

</html>