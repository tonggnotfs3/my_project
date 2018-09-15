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
 $('#login-form').submit(function(){
       var all_data =
        {
          username:$("#username").val(),
          password:$("#password").val(),
         };
           $.ajax({
          type:'POST',
          url:"sql/login_check.php",
          data:all_data,
         success: function(html){  
        var reply = html.replace(/\s+/, "");  
          if(reply=='1')    {
       //$("#add_err").html("right username or password");
       window.location="index.php";
      }
      else if(reply=='2'){
        window.location="admin/index.php";
      }
      else    {
      alert("กรุณาตรวจสอบชื่อผู้ใช้งาน หรือ รหัสผ่าน!");
      }
       },
      });
    return false;
  });

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
                            <span aria-hidden="true"></span> เข้าสู่ระบบ</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="login-form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="username">ชื่อผู้ใช้งาน:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username" placeholder="กรอกชื่อผู้ใช้งาน">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password">รหัสผ่าน:</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="password" placeholder="กรอกรหัสผ่าน">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">เข้าสู่ระบบ</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>