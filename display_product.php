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
<script type="text/javascript">
  function receipt_click(pic_url) {
    var info = 'pic_url=' + pic_url;
    $.ajax({
      type: "POST",
      url: "sql/display_p_pic.php",
      data: info,
      success: function (data) {
        $("#display_p_picture").html(data);
      }
    });
  }

  function update_product_click(p_id) {
    var info = 'p_id=' + p_id;
    $.ajax({
      type: "POST",
      url: "../include/update_form_product.php",
      data: info,
      success: function (data) {
        $("#edit_product").html(data);
      }
    });
  }
</script>

<body>
  <?php include("menu.php"); ?>

  <?php 
        require_once 'connect.php';
        $sql="SELECT * FROM `product` WHERE `p_status`= 1 ORDER BY `p_id` ASC";
        $result=$conn->query($sql);
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
        <table class="table table-hover">
          <thead>
            <tr>
              <th>รหัสสินค้า</th>
              <th>ชื่อสินค้า</th>
              <th>รายละเอียดสินค้า</th>
              <th>รูปสินค้า</th>
              <th>วัสดุที่ใช้</th>
              <th>จำนวนนคงเหลือ</th>
              <th>ราคา</th>>
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
                <?php echo $row['p_detail'];?>
              </td>
              <td>
                <img src="<?php echo $row['p_pic']?>" class="img-thumbnail" alt="Produc picture" data-toggle="modal"
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

  <div id="edit_p" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูล</h4>
        </div>
        <div class="modal-body" id="edit_product">

        </div>
      </div>

    </div>
  </div>

  <script>
    $(document).ready(function () {
      $('.table').DataTable({
        ordering: false,
        "language": {
          "lengthMenu": "แสดง _MENU_ เรคคอร์ดต่อหนึ่งหน้า",
          "zeroRecords": "ไม่พบการค้นหา",
          "info": "หน้าที่ _PAGE_ จาก _PAGES_",
          "infoEmpty": "ไม่พบข้อมูล",
          "infoFiltered": "(กรองจาก _MAX_  เรคคอร์ด)",
          "paginate": {
            "first": "หน้าแรก",
            "last": "หน้าสุดท้าย",
            "next": "ถัดไป",
            "previous": "ก่อนหน้า"
          },
          "search": "ค้นหา:"
        }
      });
    });
  </script>

</body>

</html>