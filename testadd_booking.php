<html>

<head>
  <title>My Cart</title>
  <link rel="stylesheet" href="cart/css/bootstrap.min.css">
  <style>
    .badge-notify{
    background:red;
    position:relative;
    top: -20px;
    right: 10px;
  }
  .my-cart-icon-affix {
    position: fixed;
    z-index: 999;
  }
  </style>
</head>

<body>
  <?php include("menu.php"); ?>
  <<?php require_once 'connect.php' ; $sql="SELECT * FROM `product` WHERE `p_status`= 1 ORDER BY `p_id` ASC" ; $result=$conn->query($sql);
    ?>

    <div class="container">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="panel-title">
              <h4>
                <span aria-hidden="true"></span> ข้อมูสินค้า</h4>
              <div style="float: right; cursor: pointer;">
                <span class="glyphicon glyphicon-shopping-cart my-cart-icon"><span class="badge badge-notify my-cart-badge"></span></span>
              </div>
            </div>
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>รายละเอียดสินค้า</th>
                <th>รูปสินค้า</th>
                <th>วัสดุที่ใช้</th>
                <th>จำนวนนคงเหลือ</th>
                <th>ราคา</th>
                <th>จำนวน</th>
                <th>สั่งสินค้า</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row=$result->fetch_assoc()){?>
              <tr>
                <td>
                  <?php echo $row['p_id'];?>
                </td>
                <td>
                  <?php echo $row['p_name'];?>
                </td>
                <td>
                  <?php echo $row['p_detail'];?>
                </td>
                <td>
                  <img src="<?php echo $row['p_pic']?>" class="img-thumbnail" alt="Produc picture" data-toggle="modal"
                    data-target="#display_p_pic" style="width:50px;height:50px;" onclick="receipt_click('<?php echo $row['p_pic'];?>')">
                </td>
                <td>
                  <?php echo $row['p_material'];?>
                </td>
                <td>
                  <?php echo $row['p_amount'];?>
                </td>
                <td>
                  <?php echo $row['p_price'];?>
                </td>
                <td>
                  <input type="text" name="amount" id="amount">
                </td>
                <th>
                  <button class="btn btn-danger my-cart-btn" data-id="5" data-name="product 5" data-summary="summary 5"
                    data-price="50" data-quantity="$('input:text').val('#amount')" data-image="images/img_5.png">Add to Cart</button>
                </th>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <script src="cart/js/jquery-2.2.3.min.js"></script>
    <script type='text/javascript' src="cart/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="cart/js/jquery.mycart.js"></script>
    <script type="text/javascript">
      $(function () {

        var goToCartIcon = function ($addTocartBtn) {
          var $cartIcon = $(".my-cart-icon");
          var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({
            "position": "fixed",
            "z-index": "999"
          });
          $addTocartBtn.prepend($image);
          var position = $cartIcon.position();
          $image.animate({
            top: position.top,
            left: position.left
          }, 500, "linear", function () {
            $image.remove();
          });
        }

        $('.my-cart-btn').myCart({
          currencySymbol: '$',
          classCartIcon: 'my-cart-icon',
          classCartBadge: 'my-cart-badge',
          classProductQuantity: 'my-product-quantity',
          classProductRemove: 'my-product-remove',
          classCheckoutCart: 'my-cart-checkout',
          affixCartIcon: true,
          showCheckoutModal: true,
          numberOfDecimals: 2,

          clickOnAddToCart: function ($addTocart) {
            goToCartIcon($addTocart);
          },
          afterAddOnCart: function (products, totalPrice, totalQuantity) {
            console.log("afterAddOnCart", products, totalPrice, totalQuantity);
          },
          clickOnCartIcon: function ($cartIcon, products, totalPrice, totalQuantity) {
            console.log("cart icon clicked", $cartIcon, products, totalPrice, totalQuantity);
          },
          checkoutCart: function (products, totalPrice, totalQuantity) {
            var checkoutString = "Total Price: " + totalPrice + "\nTotal Quantity: " + totalQuantity;
            checkoutString += "\n\n id \t name \t summary \t price \t quantity \t image path";
            $.each(products, function () {
              checkoutString += ("\n " + this.id + " \t " + this.name + " \t " + this.summary + " \t " +
                this.price + " \t " + this.quantity + " \t " + this.image);
            });
            alert(checkoutString)
            console.log("checking out", products, totalPrice, totalQuantity);
          },
          getDiscountPrice: function (products, totalPrice, totalQuantity) {
            console.log("calculating discount", products, totalPrice, totalQuantity);
            return totalPrice * 0.5;
          }
        });

        $("#addNewProduct").click(function (event) {
          var currentElementNo = $(".row").children().length + 1;
          $(".row").append(
            '<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' +
            currentElementNo + ' - <strong>$' + currentElementNo +
            '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' + currentElementNo +
            '" data-name="product ' + currentElementNo + '" data-summary="summary ' + currentElementNo +
            '" data-price="' + currentElementNo +
            '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>'
          )
        });
      });

    </script>

</body>

</html>