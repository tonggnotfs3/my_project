<?php 
    require_once '../connect.php';
    $m_id = $_POST['m_id'];
    $sql2="SELECT * FROM `material` WHERE m_id = $m_id";
    $result2=$conn->query($sql2);
    echo $m_id;
    
?>
<form class="form-horizontal" id="updatematerial">
    <div class="form-group">
    <?php while($row2=$result2->fetch_assoc()){?>
        <input type="hidden" class="form-control" name="m_id" id="m_id" value=<?php echo $row2['m_id'];?>>
        <label class="control-label col-sm-2" for="m_name">ชื่อวัตถุดิบ:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="m_name" id="m_name" value=<?php echo $row2['m_name'];?>>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="m_amm_amountount">จำนวนคงเหลือ:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="m_amount" id="m_amount" value=<?php echo $row2['m_amount'];?>>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="m_unit">หน่วย:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="m_unit" id="m_unit"value=<?php echo $row2['m_unit'];?>>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="prrview">
        </label>
        <div class="col-md-4">
            <button class="btn btn-success" type="submit">
                เพิ่มข้อมูล
            </button>

        </div>
    </div>
    <?php }?>
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('#updatematerial').submit(function () {
            var fData = new FormData(document.getElementById("updatematerial"));
            $.ajax({
                'type': "POST",
                'url': "sql/update_material.php",
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