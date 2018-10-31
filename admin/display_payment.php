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
      url: "../sql/display_pay_pic.php",
      data: info,
      success: function (data) {
        $("#display_pay_picture").html(data);
      }
    });
  }
</script>

<body>
  <?php include("menu.php"); ?>
  <div class="container">


    <?php 
        require_once 'connect.php';
        $sql="SELECT * FROM `payment`,pay_status,pay_type,customer WHERE payment.pay_status = pay_status.pay_status_id AND payment.pay_type = pay_type.pay_type_id AND payment.pay_cus_id = customer.c_id AND payment.pay_delete = 1 AND payment.pay_status != 3  ORDER BY `payment`.`pay_id` DESC";
        $result=$conn->query($sql);
      ?>

    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>
              <span aria-hidden="true"></span> ข้อมูลการชำระเงิน</h4>
          </div>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>รหัสใบสั่งซื้อ</th>
              <th>ชื่อผู้สั่งซื้อ</th>
              <th>นามสกุล</th>
              <th>ประเภทการชำระเงิน</th>
              <th>หลักฐาน</th>
              <th>สถานะ</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row=$result->fetch_assoc()){?>
            <tr>
              <td>
                <a href="display_booking_detail.php?StrOrderID=<?php echo $row['pay_booking_id'];?>"><?php echo $row['pay_booking_id'];?></a>
              </td>
              <td>
                <?php echo $row['fristname'];?>
              </td>
              <td>
                <?php echo $row['lastname'];?>
              </td>
              <td>
                <?php echo $row['pay_type_name'];?>
              </td>
              <td>
                <img src="<?php echo "../".$row['pay_pic']?>" class="img-thumbnail" alt="Produc picture" data-toggle="modal"
                  data-target="#display_p_pic" style="width:50px;height:50px;" onclick="receipt_click('<?php echo $row['pay_pic'];?>')">
              </td>
              <td>
              <form action="../sql/update_status_payment.php" method="post">
                <input type="hidden" class="form-control" name="pay_id" id="pay_id" value=<?php echo $row['pay_id'];?>>
                <select class="form-control" id="pay_status" name="pay_status">
                  <option value="">เลือกประเภทการชำรเงิน</option>
                  <option value="1" <?php if($row['pay_status_id']==1 )echo "selected" ?>>การชำระเงินผิดพลาด</option>
                  <option value="2" <?php if($row['pay_status_id']==2 )echo "selected" ?>>ยังไม่ได้รับการตรวจสอบ</option>
                  <option value="3" <?php if($row['pay_status_id']==3 )echo "selected" ?>>ตรวจสอบแล้ว</option>
                </select>
                <input type="text" class="form-control" name="description" id="description" value=<?php echo $row['description'];?>>
                <input type="hidden" class="form-control" name="pay_booking_id" id="pay_booking_id" value=<?php echo $row['pay_booking_id'];?>>
                <input type="hidden" class="form-control" name="pay_type" id="pay_type" value=<?php echo $row['pay_type'];?>>
                <input class="btn btn-info" type="submit" value="บันทึก"></td>
                </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function () {
      $('.table').DataTable({
        ordering: false,
        "language": {
          "lengthMenu": "แสดง _MENU_ เรคอร์ดต่อหนึ่งหน้า",
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



  <div id="display_p_pic" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รูปใบเสร็จ</h4>
        </div>
        <div class="modal-body" id="display_pay_picture">

        </div>
      </div>

    </div>
  </div>
</body>

</html>