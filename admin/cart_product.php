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
  <<?php require_once '../connect.php' ; $sql="SELECT * FROM `product` WHERE `p_status`= 1 ORDER BY `p_id` ASC" ; $result=$conn->query($sql);
    ?>

    <div class="container">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>
                <span aria-hidden="true"></span>สั่งซื้อสินค้า</h4>
              </div>
            </div>
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>รายละเอียดสินค้า</th>
                <th>รูปสินค้า</th>
                <th>วัสดุที่ใช้</th>
                <th>จำนวนนคงเหลือ</th>
                <th>ราคา</th>
                <th>สั่งสินค้า</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row=$result->fetch_assoc()){?>
              <tr>
              <form  action="cart_order.php" method="post">
                <td>
                  <?php echo $row['p_id'];?>
                </td>
                <td>
                  <?php echo $row['p_name'];?>
                </td>
                <td>
                  <?php echo $row['p_detail'];?>
                </td>
                <td>
                  <img src="<?php echo "../".$row['p_pic']?>" class="img-thumbnail" alt="Product picture" data-toggle="modal"
                    data-target="#display_p_pic" style="width:50px;height:50px;" onclick="receipt_click('<?php echo $row['p_pic'];?>')">
                </td>
                <td>
                  <?php echo $row['p_material'];?>
                </td>
                <td>
                  <?php echo $row['p_amount'];?>
                </td>
                <td>
                  <?php echo $row['p_price'];?>
                </td>
                <th>
                <input type="hidden" name="txtProductID" value="<?php echo $row['p_id'];?>" size="2"> <input class="form-control" type="text" name="txtQty" value="1" size="2"> <input class="btn btn-info" type="submit" value="สั่ง"></td>
                </th>
                </form>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

</body>

</html>