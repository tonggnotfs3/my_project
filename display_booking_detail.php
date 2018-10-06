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

        
        <?php 
        require_once 'connect.php';
        $bookingid = $_GET["StrOrderID"];
        $sql="SELECT * FROM `order_detail`,product WHERE order_detail.p_id = product.p_id AND order_detail.OrderID = $bookingid";
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
                            <th>ชื่อสินค้า</th>
                            <th>รูปภาพ</th>
                            <th>จำนวนที่สั่ง</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$result->fetch_assoc()){?>
                        <tr>
                            <td>
                                <?php echo $row['p_name'];?>
                            </td>
                            <td>
                            <img src="<?php echo $row['p_pic']?>" class="img-thumbnail" alt="Produc picture" data-toggle="modal"
                  data-target="#display_p_pic" style="width:50px;height:50px;" onclick="receipt_click('<?php echo $row['p_pic'];?>')">
                            </td>
                            <td>
                                <?php echo $row['qty'];?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="m_edit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ข้อมูลการจอง</h4>
                </div>
                <div class="modal-body" id="display_update_form_booking">

                </div>
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