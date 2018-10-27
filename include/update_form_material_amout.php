<?php 
    $m_id = $_POST['m_id'];    
?>
<form class="form-horizontal" id="updatematerial">
    <div class="form-group">
    
        <input type="hidden" class="form-control" name="m_id" id="m_id" value=<?php echo $m_id;?>>
        <label class="control-label col-sm-2" for="m_amount">จำนวน:</label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="m_amount" id="m_amount">
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
    
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('#updatematerial').submit(function () {
            var fData = new FormData(document.getElementById("updatematerial"));
            $.ajax({
                'type': "POST",
                'url': "../sql/update_material_amout.php",
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