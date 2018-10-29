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
<?php 
$datestart = $_POST["datestart"];
$dateend = $_POST["dateend"];
?>
<script type="text/javascript">
$(document).ready(function(){
    var datestart = "<?= $datestart; ?>";
    var dateend = "<?= $dateend; ?>";
	$.ajax({
		url: "../sql/select_product_chart_low.php",
		method: "GET",
        data: {datestart: datestart, dateend: dateend},
		success: function(data) {
			console.log(data);
			var p_name = [];
			var sumQTY = [];
            var color = Chart.helpers.color;
			for(var i in data) {
				p_name.push(data[i].p_name);
				sumQTY.push(data[i].sumQTY);
			}

			var chartdata = {
				labels: p_name,
				datasets : [
					{
						label: 'จำนวน(ชิ้น)',
						backgroundColor: 'rgb(179, 230, 255, 0.50)',
						borderColor: 'rgba(179, 230, 255, 1)',
						hoverBackgroundColor: 'rgba(179, 230, 255, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: sumQTY
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
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
                            <span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span>รายงานสินค้าขายดี</h4>
                    </div>
                </div>
                <!-- content here -->
                <div id="chart-container">
                    <canvas id="mycanvas" height="25vw" width="80vw"></canvas>
                </div>
                <!-- end content -->
            </div>
        </div>
    </div>

</body>

</html>