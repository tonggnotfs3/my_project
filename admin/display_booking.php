<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="..\asset\css\bootstrap.css">
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


        <?php
        $customerID = $_SESSION['person_id']; 
        require_once 'connect.php';
        $sql="SELECT * FROM orders INNER JOIN customer ON orders.customer_id = customer.c_id ORDER BY `orders`.`OrderID` DESC";
        $result=$conn->query($sql);
      ?>

        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>
                            <span class="glyphicon glyphicon-registration-mark" aria-hidden="true"></span>ข้อมูลการจองสินค้า</h4>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>รหัสการจอง</th>
                            <th>วันที่จอง</th>
                            <th>ลูกค้า</th>
                            <th>บริษัท</th>
                            <th>เบอร์</th>
                            <th>ยอดรวมทั้งสิ้น</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$result->fetch_assoc()){?>
                        <tr>
                            <td>
                                <?php echo $row['OrderID'];?>
                            </td>
                            <td>
                                <?php echo $row['OrderDate'];?>
                            </td>
                            <td>
                                <?php echo $row['fristname'];?>&nbsp;&nbsp;<?php echo $row['lastname'];?>
                            </td>
                            <td>
                                <?php echo $row['department'];?>
                            </td>
                            <td>
                                <?php echo $row['tel'];?>
                            </td>
                            <td>
                                <a href="display_booking_detail.php?StrOrderID=<?php echo $row['OrderID'];?>" class="btn btn-info">ลายละเอียด</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            $('.table').DataTable({
                ordering: false,
                "language": {
                    "lengthMenu": "แสดง _MENU_ เรคคอร์ดต่อหนึ่งหน้า",
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