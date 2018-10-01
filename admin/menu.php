<link href="https://fonts.googleapis.com/css?family=Prompt|Dosis" rel="stylesheet">
<div class="jumbotron" style="margin-bottom: 0px;padding: 20px;background: rgba(204,218,255,1);/* Old Browsers */
background: -moz-linear-gradient(left, rgba(204,218,255,1) 0%, rgba(179,191,250,1) 27%, rgba(164,184,249,1) 51%, rgba(153,188,250,1) 100%); /* FF3.6+ */
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(204,218,255,1)), color-stop(27%, rgba(179,191,250,1)), color-stop(51%, rgba(164,184,249,1)), color-stop(100%, rgba(153,188,250,1)));/* Chrome, Safari4+ */
background: -webkit-linear-gradient(left, rgba(204,218,255,1) 0%, rgba(179,191,250,1) 27%, rgba(164,184,249,1) 51%, rgba(153,188,250,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(left, rgba(204,218,255,1) 0%, rgba(179,191,250,1) 27%, rgba(164,184,249,1) 51%, rgba(153,188,250,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(left, rgba(204,218,255,1) 0%, rgba(179,191,250,1) 27%, rgba(164,184,249,1) 51%, rgba(153,188,250,1) 100%); /* IE 10+ */
background: linear-gradient(to right, rgba(204,218,255,1) 0%, rgba(179,191,250,1) 27%, rgba(164,184,249,1) 51%, rgba(153,188,250,1) 100%);/* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ccdaff', endColorstr='#99bcfa', GradientType=1 );/* IE6-9 */;">
  <div class="container" align="center">

    <a href="index.php"><img style="width:15%;height:15%;font-size: 30px" src="../pic/logo.png"><span style=" color:#FFFFFF;font-family: 'Dosis', sans-serif;font-size: 30px">KPU
        Supply LTD., PART.</span></a>
  </div>
</div>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">การชำระเงิน
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add_payment.php">เพิ่มหลักฐานการชำระเงิน</a></li>
          <li><a href="display_payment.php">ตรวจสอบการชำระเงิน</a></li>
          <li><a href="display_paymentstatus_customer.php">ตรวจสอบสถานะการชำระเงิน</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ข้อมูลสินค้า
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add_product.php">เพิ่มข้อมูลสินค้า</a></li>
          <li><a href="display_product.php">ดู/แก้ไขข้อมูลสินค้า</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ข้อมูลวัตถุดิบ
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add_matti.php">เพิ่มข้อมูลวัตถุดิบ</a></li>
          <li><a href="display_matti.php">ดู/แก้ไขข้อมูลวัตถุดิบ</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ข้อมูลลูกค้า
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add_customer.php">เพิ่มข้อมูลลูกค้า</a></li>
          <li><a href="display_customer.php">ดู/แก้ไข้ข้อมูลลูกค้า</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">ข้อมูลการจองสินค้า
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="testadd_booking.php">เพิ่มข้อจองสินค้า</a></li>
          <li><a href="display_booking.php">ดู/แก้ไข้ข้อมูลจองสินค้า</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-left">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">รายงาน
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="report_product.php">รายงานยอดขาย</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
if(isset($_SESSION['person_id']) ){
 ?>

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <?php echo $_SESSION['person_name'];?>
          <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">ออกจากระบบ</a></li>
        </ul>
      </li>
      <?php }
 else{ ?>
      <li><a href="form_login.php"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>