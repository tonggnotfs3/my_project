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
  function showPreview(ele) {
    $('#img-product').attr('src', ele.value);
    if (ele.files && ele.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img-product').attr('src', e.target.result);
      }
      reader.readAsDataURL(ele.files[0]);
    }
  }

      $(document).ready(function() {
      function selectMaterial() {
        $.ajax({
          type: "POST",
          url: "select_material.php",
          success: function(data) {
            $("#p_material").html(data);
          }
        });
      }
      selectMaterial();
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
              <span aria-hidden="true"></span> เพิ่มข้อมูลสินค้า</h4>
          </div>
        </div>
        <div class="panel-body">
          <form class="form-horizontal" id="form_insert_product">
            <div class="form-group">
              <label class="control-label col-sm-2" for="p_name">ชื่อสินค้า:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="p_name" id="p_name">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="p_detail">รายระเลียดสินค้า:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="p_detail" id="p_detail">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="p_material">วัตถุดิบที่ใช้:</label>
              <div class="col-sm-4">
                <select class="form-control" id="p_material" name="p_material"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="p_price">ราคา:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="p_price" id="p_price">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="p_amount">จำนวนคงเหลือ:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="p_amount" id="p_amount">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="images">รูปสินค้า:</label>
              <div class="col-sm-4">
                <input class="form-control" id="images" name="images" onchange="showPreview(this)" type="file">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="prrview">
              </label>
              <div class="col-md-4">
                <img border="5" class="thumbnail" height="200" id="img-product" src="pic/uploadpic.png" width="200" />
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
      $('#form_insert_product').submit(function () {
        var fData = new FormData(document.getElementById("form_insert_product"));
        $.ajax({
          'type': "POST",
          'url': "sql/insert_product.php",
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