<?php 
include "header.php";
?>
    <div id="cart-outer-container">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-12">
                    <h2 class="section-name-heading text-center"><span>My Cart</span></h2>
                </div>
            </div>
            
            <?php
            $db->select("options", "site_currency_format", null, null, null, null);
            $currency_form = $db->getResult();
            if (isset($_COOKIE["cart_product_ids"])) {
                $cart_products_ids = $_COOKIE["cart_product_ids"];
                $pro_ids = json_decode($cart_products_ids);
                if (is_object($pro_ids)) {
                    $pro_ids = get_object_vars($pro_ids);
                }
                
            ?>
            <div class="row">
            <form action="javascript:void(0)" style="width:100%">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="30px"><h6>Product Image</h6></th>
                            <th class="w-50"><h6>Product Name</h6></th>
                            <th><h6>Product Price</h6></th>
                            <th width="30px"><h6>Product Qty.</h6></th>
                            <th><h6>Sub Total</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($pro_ids)) {
                        foreach ($pro_ids as $pro_id) {
                            $db->select("products", "*", null, "product_id = $pro_id", null, null);
                            $single_product = $db->getResult();
                            if ((int)$single_product[0][0]["product_price"] > 0) {
                                $max_pro = $single_product[0][0]["product_price"];
                            } else {
                                $max_pro = 1;
                            }
                        ?>
                        <tr class="cart-products-row">
                            <td><img src="uploads/images/<?php echo $single_product[0][0]["product_featured_image"] ?>" width="100%" alt=""></td>
                            <td><?php echo $single_product[0][0]["product_title"] ?></td>
                            <td><?php echo $currency_form[0][0]["site_currency_format"] ?> <input type="text" value="<?php echo $single_product[0][0]["product_price"] ?>" name="cart-single-product-price" class="cart-single-product-price"></td>
                            <td><input type="number" class="form-control cart-product-quantity" value="1" min="1" max="<?php echo $max_pro ?>" name="cart-product-quantity"></td>
                            <td><?php echo $currency_form[0][0]["site_currency_format"] ?> <span class="cart-sub-total"><?php echo $single_product[0][0]["product_price"] ?></span></td>
                            <td><button data-cart-delete-id="<?php echo $single_product[0][0]["product_id"] ?>" class="btn btn-primary cart-remove-product-btn"><i class="fa fa-times" aria-hidden="true"></i></button></td>
                        </tr>
                        <?php
                        }
                    }
                        ?>
                            <td colspan="3"></td>
                            <td>Total</td>
                            <td colspan="2"><?php echo $currency_form[0][0]["site_currency_format"] ?><input id="cart-total-price" type="text" name="" readonly ></td>
                        </tr>
                    </tbody>
                </table>
                </form>
            </div>
            <?php
            } else {
            ?>
            <div class="row no-products-added-slide">
                <div class="col-md-12">
                    <p class="text-center">No Products Added To Cart</p>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="row my-3">
                <div class="col-sm-3 mr-auto">
                    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                </div>
                <div class="col-sm-3 ml-auto">
                    <button class="btn btn-success ml-auto d-block">Proceed To Checkout</button>
                </div>
            </div>

            
        </div>
    </div>
<?php 
include "footer.php";
?>