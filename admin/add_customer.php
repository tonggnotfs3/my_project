<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เพิ่มข้อมูลลูกค้า</title>

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
    $(document).ready(function() {
      function selectProvince() {
        $.ajax({
          type: "POST",
          url: "select_province.php",
          success: function(data) {
            $("#province").html(data);
          }
        });
      }
      selectProvince();
      $('#province').change(function() {
        $.ajax({

          type: "POST",
          data: {
            provinceID: $(this).val()
          },
          url: "select_amphur.php",
          success: function(data) {
            $("#amphur").html(data);
          }
          /*,
              error:function(jqXHR,text,error){
                //แสดงข้อผิดพลาด
                $('#results').html(error);
              }*/
        });

      });
      $('#amphur').change(function() {

        $.ajax({

          type: "POST",
          data: {
            amphurID: $(this).val()
          },
          url: "select_districts.php",
          success: function(data) {
            $("#districts").html(data);
          }
          /*,
              error:function(jqXHR,text,error){
                //แสดงข้อผิดพลาด
                $('#results').html(error);
              }*/
        });

      });
    });
  </script>

  <body>
    <?php include("menu.php"); ?>
    <div class="container">

    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title"><h4><span  aria-hidden="true"></span>เพิ่มข้อมูลลูกค้า</h4>
        </div>
        </div>
        <div class="panel-body">
      <form class="form-horizontal" id="register_cus">
        <div class="form-group">
          <label class="control-label col-sm-2" for="department">หน่วยงาน:</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" name="department" id="department">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="username">ชื่อผู้ใช้:</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" name="username" id="username">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="password">รหัสผ่าน:</label>
          <div class="col-sm-4">
          <input type="password" class="form-control" name="password" id="password">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="fristname">ชื่อผู้ติดต่อ:</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" name="fristname" id="fristname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="lastname">นามสกุล:</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" name="lastname" id="lastname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="address">ที่อยู่:</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" name="address" id="address">
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="province">จังหวัด:</label>
          <div class="col-md-4">
            <select class="form-control" id="province" name="province">
        </select>
        </div>
      </div>
         <div class="form-group">
          <label class="control-label col-sm-2" for="amphur">อำเภอ:</label>
          <div class="col-md-4">
            <select class="form-control" id="amphur" name="amphur">
        </select>
        </div>
      </div>
       <div class="form-group">
          <label class="control-label col-sm-2" for="districts">ต่ำบล:</label>
          <div class="col-md-4">
            <select class="form-control" id="districts" name="districts">
        </select>
        </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="tel">เบอร์โทร:</label>
          <div class="col-sm-4">
          <input type="text" class="form-control" name="tel" id="tel">
          </div>
        </div>
        <div class="col-sm-2">
        </div>
         <div class="col-sm-4">
        <button type="submit" class="btn btn-default">เพิ่มข้อมูล</button>
        </div>
      </form>

        </div>
      </div></div>
    </div>

     <script type="text/javascript">
      $(document).ready(function () {
             $('#register_cus').submit(function() {
              var fData = new FormData(document.getElementById("register_cus"));
               $.ajax({
        'type':"POST",
        'url':"sql/insert_customer.php",
        'data':fData,
        'contentType':false,
        'processData':false,
        'cache':false,
        'success':function(data) {
          // window.location="display_complain.php";
          alert("success");
          location.reload();
        },
        'error':function(jqXHR,text,error) { alert(error); }
      });
      return false;

            });
        });


      </script>


  </body>
</html>
