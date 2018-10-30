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
  function update_customer_click(c_id) {
    var info = 'c_id=' + c_id;
    $.ajax({
      type: "POST",
      url: "../include/update_form_customer.php",
      data: info,
      success: function (data) {
        $("#display_update_form_customer").html(data);
      }
    });
  }
</script>
<style type="text/css">
div.side-menu{
    left:-100px;
    width: 200px;
}
div.content{
    left:-50px;

}
</style>
<body>
  <?php include("menu.php"); ?>

  <?php 
        require_once 'connect.php';
        $sql="SELECT customer.c_id,customer.username,customer.password,customer.fristname,customer.lastname,customer.address,customer.tel,customer.department,province.PROVINCE_NAME,amphur.AMPHUR_NAME,districts.DISTRICT_NAME FROM customer,province,amphur,districts WHERE customer.province = province.PROVINCE_ID AND customer.amphur = amphur.AMPHUR_ID AND customer.districts = districts.DISTRICT_ID AND customer.c_status = 1";
        $result=$conn->query($sql);
      ?>
  <div class="container">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>
              <span aria-hidden="true"></span> ข้อมูลลูกค้า</h4>
          </div>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>รหัสสมาชิก</th>
              <th>หน่วยงาน</th>
              <th>ชื่อผู้ใช้</th>
              <th>ชื่อผู้ติดต่อ</th>
              <th>นามสกุล</th>
              <th>ที่อยู่</th>
              <th>จังหวัด</th>
              <th>อำเภอ</th>
              <th>ต่ำบล</th>
              <th>เบอร์โทร</th>
              <th>แก้ไข</th>
              <th>ลบ</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row=$result->fetch_assoc()){?>
            <tr>
              <td>
                <?php echo $row['c_id'];?>
              </td>
              <td>
                <?php echo $row['department'];?>
              </td>
              <td>
                <?php echo $row['username'];?>
              </td>
              <td>
                <?php echo $row['fristname'];?>
              </td>
              <td>
                <?php echo $row['lastname'];?>
              </td>
              <td>
                <?php echo $row['address'];?>
              </td>
              <td>
                <?php echo $row['PROVINCE_NAME'];?>
              </td>
              <td>
                <?php echo $row['AMPHUR_NAME'];?>
              </td>
              <td>
                <?php echo $row['DISTRICT_NAME'];?>
              </td>
              <td>
                <?php echo $row['tel'];?>
              </td>
              <td>
                <button type="button" data-toggle="modal" data-target="#c_edit" class="btn btn-success" onclick="update_customer_click(<?php echo $row['c_id'];?>)">แก้ไข</button>
              </td>
              <th>
                <a href="sql/delete_customer.php?c_id=<?php echo $row['c_id'];?>" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>
              </th>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  <div id="c_edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไข้ข้อมูลวัตถุดิบ</h4>
        </div>
        <div class="modal-body" id="display_update_form_customer">

        </div>
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
</body>

</html>