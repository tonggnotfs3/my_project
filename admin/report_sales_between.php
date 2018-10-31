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
<script type="text/javascript">
  function receipt_click(pic_url) {
    var info = 'pic_url=' + pic_url;
    $.ajax({
      type: "POST",
      url: "../sql/display_p_pic_admin.php",
      data: info,
      success: function (data) {
        $("#display_p_picture").html(data);
      }
    });
  }
</script>

<body>
  <?php include("menu.php"); 
  $datestart = $_POST["datestart"];
  $dateend = $_POST["dateend"];
  //echo $date;
  ?>
  <div class="container">



      <?php 
        require_once 'connect.php';
        $sql="SELECT product.p_name,product.p_pic,product.p_id,sum(order_detail.qty) AS sumqty FROM `orders` INNER JOIN order_detail ON orders.OrderID = order_detail.OrderID INNER JOIN product ON product.p_id = order_detail.p_id WHERE orders.OrderDate BETWEEN '$datestart' AND '$dateend' AND orders.fin_status = 2 GROUP BY order_detail.p_id";
        $result=$conn->query($sql);

        function DateThai($strDate)
        {
          $strYear = date("Y",strtotime($strDate))+543;
          $strMonth= date("n",strtotime($strDate));
          $strDay= date("j",strtotime($strDate));
          $strHour= date("H",strtotime($strDate));
          $strMinute= date("i",strtotime($strDate));
          $strSeconds= date("s",strtotime($strDate));
          $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
          $strMonthThai=$strMonthCut[$strMonth];
          return "$strDay $strMonthThai $strYear";
        }
      ?>

    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>
              <span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span>รายงานยอดขาย</h4>
          </div>
        </div>
        <center>
        <h3>รายงานยอดขาย</h3>
        <h3>ระหว่างวันที่ <?=DateThai($datestart)?> ถึงวันที่ <?=DateThai($dateend)?></h3>
        </center>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>รหัสสินค้า</th>
              <th>ชื่อสินค้า</th>
              <th>รูป</th>
              <th align="right">จำนวนที่ขายได้(ชิ้น)</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row=$result->fetch_assoc()){?>
            <tr>
              <td>
                <?php echo $row['p_id'];?>
              </td>
              <td>
                <?php echo $row['p_name'];?>
              </td>
              <td>
              <img src="<?php echo "../".$row['p_pic']?>" class="img-thumbnail" alt="Produc picture" data-toggle="modal"
                  data-target="#display_p_pic" style="width:50px;height:50px;" onclick="receipt_click('<?php echo $row['p_pic'];?>')">
              </td>
              <td align="right">
                <?php echo number_format($row['sumqty']);?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div id="display_p_pic" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รูปสินค้า</h4>
        </div>
        <div class="modal-body" id="display_p_picture">

        </div>
      </div>

    </div>
  </div>

</body>

</html>