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

      $(document).ready(function() {
      function selectProduct() {
        $.ajax({
          type: "POST",
          url: "select_product.php",
          success: function(data) {
            $("#b_product").html(data);
          }
        });
      }
      selectProduct();
    });

</script>

<body>
  <?php include("menu.php"); ?>
  <div class="container">

    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title">
            <h4>
              <span aria-hidden="true"></span> เพิ่มข้อการจองสินค้า</h4>
          </div>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" id="form_insert_booking">
            <div class="form-group">
              <label class="control-label col-sm-2" for="b_c_id">รหัสลูกค้า:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="b_c_id" id="b_c_id">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="b_product">สินค้า:</label>
              <div class="col-sm-4">
                <select class="form-control" id="b_product" name="b_product"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="b_amount">จำนวน:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="b_amount" id="b_amount">
              </div>
            </div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-4">
              <button type="submit" class="btn btn-default">เพิ่มข้อมูล</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#form_insert_booking').submit(function () {
        var fData = new FormData(document.getElementById("form_insert_booking"));
        $.ajax({
          'type': "POST",
          'url': "sql/insert_booking.php",
          'data': fData,
          'contentType': false,
          'processData': false,
          'cache': false,
          'success': function (data) {
            alert("success");
            location.reload();
          },
          'error': function (jqXHR, text, error) {
            alert(error);
          }
        });
        return false;

      });
    });
  </script>


</body>

</html>