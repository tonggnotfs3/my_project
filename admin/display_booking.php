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
    function update_booking_click(b_id) {
        var info = 'b_id=' + b_id;
        $.ajax({
            type: "POST",
            url: "include/update_form_booking.php",
            data: info,
            success: function (data) {
                $("#display_update_form_booking").html(data);
            }
        });
    }
</script>

<body>
    <?php include("menu.php"); ?>
    <div class="container">


            <?php 
        require_once 'connect.php';
        $sql="SELECT booking.b_id,customer.fristname,customer.lastname,customer.department,product.p_name,booking.b_amount,booking.b_paystatus FROM booking,customer,product WHERE booking.b_cus_id = customer.c_id AND booking.b_pro_id = product.p_id AND booking.b_status = 1";
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
                            <th>ชื่อลูกค้า</th>
                            <th>นามสกุล</th>
                            <th>บริษัท</th>
                            <th>ชื่อสินค้า</th>
                            <th>จำนวน</th>
                            <th>สถานะการชำระเงิน</th>
                            <th>การชำระเงิน</th>
                            <th>ลบ</th>
                            <th>แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$result->fetch_assoc()){?>
                        <tr>
                            <td>
                                <?php echo $row['b_id'];?>
                            </td>
                            <td>
                                <?php echo $row['fristname'];?>
                            </td>
                            <td>
                                <?php echo $row['lastname'];?>
                            </td>
                            <td>
                                <?php echo $row['department'];?>
                            </td>
                            <td>
                                <?php echo $row['p_name'];?>
                            </td>
                            <td>
                                <?php echo $row['b_amount'];?>
                            </td>
                            <td>
                                <?php echo $row['b_paystatus'];?>
                            </td>
                            <td>
                                <?php if($row['b_paystatus'] == 0){?>
                                <a href="sql/pay_deposit.php?b_id=<?php echo $row['b_id'];?>" class="btn btn-warning"
                                    onclick="return confirm('ยืนยันการชำระเงินใช่หรือไม่ ?')">ชำระเงินค่ามันจำ</a>
                                <?php }
                                elseif($row['b_paystatus'] == 1){ ?>
                                <a href="sql/pay_total.php?b_id=<?php echo $row['b_id'];?>" class="btn btn-primary"
                                    onclick="return confirm('ยืนยันการชำระเงินใช่หรือไม่ ?')">ชำระเงินทั้งหมด</a>
                                <?php }
                                else{ ?>
                                <button type="button" data-toggle="modal" class="btn btn-info disabled">ชำระเงินแล้ว</button>
                                <?php } ?>
                            </td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#m_edit" class="btn btn-success"
                                    onclick="update_booking_click(<?php echo $row['b_id'];?>)">แก้ไข</button>
                            </td>
                            <th>
                                <a href="sql/delete_booking.php?b_id=<?php echo $row['b_id'];?>" class="btn btn-danger"
                                    onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')">ลบ</a>
                            </th>
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