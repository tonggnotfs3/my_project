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

    <a href="index.php"><img style="width:15%;height:15%;font-size: 30px" src="pic/logo.png"><span style=" color:#FFFFFF;font-family: 'Dosis', sans-serif;font-size: 30px">KPU
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
          <li><a href="display_paymentstatus_customer.php">ตรวจสอบสถานะการชำระเงิน</a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-left">
      <li>
        <a href="display_product.php">ข้อมูลสินค้า</a>

      </li>
    </ul>
    <ul class="nav navbar-nav navbar-left">
      <li>
        <a href="display_booking.php">ประวัติการจอง</a>

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

<script type="text/javascript">
    (function () {
        var options = {
            facebook: "1105378012810089", // Facebook page ID
            call: "095-740-6555", // Call phone number
            call_to_action: "ติดต่อเรา", // Call to action
            button_color: "#129BF4", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "facebook,call", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>