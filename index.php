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
  <body>
    <?php include("menu.php"); ?>
    <div class="container">

    <div class="col-md-12">
        <h2>ข่าวประชาสัมพันธ์</h2>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <center><img src="pic/pic1.jpg"  style="width:40%;" align="middle"></center>
      <div class="carousel-caption">
        <h3>ทดสอบข่าว1</h3>
        <p>ทดสอบข่าว1</p>
      </div>
    </div>

    <div class="item">
      <center><img src="pic/pic2.jpg"  style="width:40%;" align="middle"></center>
      <div class="carousel-caption">
        <h3>ทดสอบข่าว2</h3>
        <p>ทดสอบข่าว2</p>
      </div>
    </div>

    <div class="item">
    <center><img src="pic/pic3.jpg"  style="width:40%;" align="middle"></center>
      <div class="carousel-caption">
        <h3>ทดาสอบข่าว3</h3>
        <p>ทดสอบข่าว2</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div>
    </div>
  </body>
</html>
