<?php 
    require_once '../connect.php';
    $b_id = $_POST['b_id'];
    $sql2="SELECT booking.b_cus_id,booking.b_id,product.p_name,booking.b_amount FROM booking,product WHERE booking.b_pro_id = product.p_id AND booking.b_id = $b_id";
    $result2=$conn->query($sql2);
    echo $b_id;
    
?>


<form class="form-horizontal" id="updatebooking">
    <div class="form-group">
        <?php while($row2=$result2->fetch_assoc()){?>
        <input type="hidden" class="form-control" name="b_id" id="b_id" value=<?php echo $row2['b_id'];?>>
        <label class="control-label col-sm-2" for="b_cus_id">รหัสลูกค้า:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="b_cus_id" id="b_cus_id" value=<?php echo $row2['b_cus_id'];?>>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="b_product">สินค้า:</label>
        <div class="col-sm-4">
            <select class="form-control" id="b_product" name="b_product"></select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="b_amount">จำนวน:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="b_amount" id="b_amount" value=<?php echo $row2['b_amount'];?>>
        </div>
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
        <button type="submit" class="btn btn-default">เพิ่มข้อมูล</button>
    </div>
        <?php }?>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('#updatebooking').submit(function () {
            var fData = new FormData(document.getElementById("updatebooking"));
            $.ajax({
                'type': "POST",
                'url': "sql/update_booking.php",
                'data': fData,
                'contentType': false,
                'processData': false,
                'cache': false,
                'success': function (data) {
                    // window.location="display_complain.php";
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