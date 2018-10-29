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
  <body>
    <?php include("menu.php"); ?>
    <div class="container">

      <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="panel-title"><h4><span  aria-hidden="true"></span> เลือกวันที่</h4>
        </div>
        </div>
        <div class="panel-body">
        
      <form class="form-horizontal" action="report_sales.php" method="post">
        <div class="form-group">
          <label class="control-label col-sm-2" for="m_name">เลือกเดือน:</label>
          <div class="col-sm-4">
          <input type="month" id="date" name="date"
           min="2018-01" value="2018-01" />
          </div>
        </div>
        

        <div class="col-sm-2">
        </div>
         <div class="col-sm-4">
         <input class="btn btn-info" type="submit" name="Submit" value="Submit">
        </div>
      </form>

        </div>
      </div></div>
    </div>

    

  </body>
</html>
