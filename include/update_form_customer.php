<?php 
    require_once '../connect.php';
    $c_id = $_POST['c_id'];
    $sql2="SELECT customer.c_id,customer.username,customer.password,customer.fristname,customer.lastname,customer.address,customer.tel,customer.department,province.PROVINCE_NAME,amphur.AMPHUR_NAME,districts.DISTRICT_NAME FROM customer,province,amphur,districts WHERE customer.province = province.PROVINCE_ID AND customer.amphur = amphur.AMPHUR_ID AND customer.districts = districts.DISTRICT_ID AND customer.c_status = 1 AND c_id = $c_id";
    $result2=$conn->query($sql2);
    echo $c_id;
    
?>

<script type="text/javascript">
    < script type = "text/javascript" >
        $(document).ready(function () {
            function selectProvince() {
                $.ajax({
                    type: "POST",
                    url: "../select_province.php",
                    success: function (data) {
                        $("#province").html(data);
                    }
                });
            }
            selectProvince();
            $('#province').change(function () {
                $.ajax({

                    type: "POST",
                    data: {
                        provinceID: $(this).val()
                    },
                    url: "../select_amphur.php",
                    success: function (data) {
                        $("#amphur").html(data);
                    }
                    /*,
                        error:function(jqXHR,text,error){
                          //แสดงข้อผิดพลาด
                          $('#results').html(error);
                        }*/
                });

            });
            $('#amphur').change(function () {

                $.ajax({

                    type: "POST",
                    data: {
                        amphurID: $(this).val()
                    },
                    url: "../select_districts.php",
                    success: function (data) {
                        $("#districts").html(data);
                    }
                    /*,
                        error:function(jqXHR,text,error){
                          //แสดงข้อผิดพลาด
                          $('#results').html(error);
                        }*/
                });

            });
        });
</script>
</script>

<form class="form-horizontal" id="updatecustomer">
    <div class="form-group">
        <?php while($row2=$result2->fetch_assoc()){?>
        <input type="hidden" class="form-control" name="c_id" id="c_id" value=<?php echo $row2['c_id'];?>>
        <div class="form-group">
            <label class="control-label col-sm-2" for="department">หน่วยงาน:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="department" id="department" value=<?php echo $row2['department'];?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="username">ชื่อผู้ใช้:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="username" id="username" value=<?php echo $row2['username'];?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="password">รหัสผ่าน:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" id="password" value=<?php echo $row2['password'];?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="fristname">ชื่อผู้ติดต่อ:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="fristname" id="fristname" value=<?php echo $row2['fristname'];?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="lastname">นามสกุล:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="lastname" id="lastname" value= <?php echo $row2['lastname'];?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="address">ที่อยู่:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="address" id="address" value=<?php echo $row2['address'];?>>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="province">จังหวัด:</label>
            <div class="col-md-4">
                <select class="form-control" id="province" name="province" value=<?php echo $row2['PROVINCE_NAME'];?>>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="amphur">อำเภอ:</label value=<?php echo $row2['AMPHUR_NAME'];?>>
            <div class="col-md-4">
                <select class="form-control" id="amphur" name="amphur">
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="districts">ต่ำบล:</label>
            <div class="col-md-4">
                <select class="form-control" id="districts" name="districts" value=<?php echo $row2['DISTRICT_NAME'];?>>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="tel">เบอร์โทร:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="tel" id="tel" value=<?php echo $row2['tel'];?>>
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
        $('#updatecustomer').submit(function () {
            var fData = new FormData(document.getElementById("updatecustomer"));
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