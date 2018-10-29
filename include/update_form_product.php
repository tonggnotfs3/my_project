<?php 
    require_once '../connect.php';
    $p_id = $_POST['p_id'];
    $sql2="SELECT * FROM `product` WHERE p_id = $p_id";
    $result2=$conn->query($sql2);
    echo $p_id;
    
?>

<script type="text/javascript">
  function showPreview(ele) {
    $('#img-product').attr('src', ele.value);
    if (ele.files && ele.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#img-product').attr('src', e.target.result);
      }
      reader.readAsDataURL(ele.files[0]);
    }
  }
</script>

<form class="form-horizontal" id="updateproduct">
    <div class="form-group">
    <?php while($row2=$result2->fetch_assoc()){?>
        <input type="hidden" class="form-control" name="p_id" id="p_id" value=<?php echo $row2['p_id'];?>>
         <div class="form-group">
              <label class="control-label col-sm-2" for="p_name">ชื่อสินค้า:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="p_name" id="p_name" value=<?php echo $row2['p_name'];?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="p_detail">รายระเลียดสินค้า:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="p_detail" id="p_detail" value=<?php echo $row2['p_detail'];?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="p_material">วัตถุดิบที่ใช้:</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="p_material" id="p_material" value=<?php echo $row2['p_material'];?>>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="images">รูปสินค้า:</label>
              <div class="col-sm-4">
                <input class="form-control" id="images" name="images" onchange="showPreview(this)" type="file">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="prrview">
              </label>
              <div class="col-md-4">
                <img border="5" class="thumbnail" height="200" id="img-product" src="pic/uploadpic.png" width="200" />
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
        $('#updateproduct').submit(function () {
            var fData = new FormData(document.getElementById("updateproduct"));
            $.ajax({
                'type': "POST",
                'url': "sql/update_product.php",
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