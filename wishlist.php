<?php
include "header.php";
$db->select("options", "site_currency_format", null, null, null, null);
$currency_form = $db->getResult();
?>
    <div id="wishlist-outer-container">
        <div class="container">
            <div class="row mb-5">
                <div class="col-sm-12">
                    <h2 class="section-name-heading text-center"><span>My Wishlist</span></h2>
                </div>
            </div>
            <div class="list-group">
            <?php
            if (isset($_COOKIE["wishlist_total_product_ids"])) {
                $product_ids_list = $_COOKIE["wishlist_product_ids"];
                $product_ids = json_decode($product_ids_list);
                if (!empty($product_ids)) {
                    ?>
                    <div class="list-group-item list-group-item-light">
                    <div class="row">
                        <div class="col-sm-2 wishlist-product-info">
                            <h5 class="text-center">Product Image</h5>
                        </div>
                        <div class="col-sm-8 wishlist-product-info">
                            <h5 class="text-center">Product Name</h5>
                        </div>
                        <div class="col-sm-1 wishlist-product-info">
                            <h5 class="text-center">price</h5>
                        </div>
                        <div class="col-sm-1 wishlist-product-info">
                            <h5 class="text-center">Cancel</h5>
                        </div>
                    </div>
                </div>
                    <?php
                    foreach ($product_ids as $product_id) {
                        $db->select("products", "*", null, "product_id = $product_id", null, null);
                        $single_product = $db->getResult();
                        ?>
                        <div class="list-group-item list-group-item-light">
                    <div class="row">
                        <div class="col-sm-2 wishlist-product-info">
                            <img src="uploads/images/<?php echo $single_product[0][0]["product_featured_image"] ?>" width="100%" alt="">
                        </div>
                        <div class="col-sm-8 wishlist-product-info">
                            <p><?php echo $single_product[0][0]["product_description"] ?></p>
                        </div>
                        <div class="col-sm-1 wishlist-product-info">
                            <p class="my-auto d-block"><?php echo $currency_form[0][0]["site_currency_format"] ?> <?php echo $single_product[0][0]["product_price"] ?></p>
                        </div>
                        <div class="col-sm-1 wishlist-product-info">
                            <button data-wishlist-remove-id="<?php echo $single_product[0][0]["product_id"] ?>" class="btn btn-primary wishlist-cancel-btn wishlist-cancel-icon-box mx-auto my-auto">
                                <i class="fa-solid fa-xmark my-auto"></i>
                            </button>
                        </div>
                    </div>
                </div>
                        <?php 
                    }
                } else {
                    ?>
                <div class="row no-products-added-slide">
                    <div class="col-md-12">
                        <p class="text-center">No Products Added To Wishlist</p>
                    </div>
                </div>
                    <?php
                    
                }
                
            } else {
            ?>
            <div class="row no-products-added-slide">
                    <div class="col-md-12">
                        <p class="text-center">No Products Added To Wishlist</p>
                    </div>
                </div>
            <?php 
            }
            ?>
            </div>

            <div class="row my-3">
                <div class="col-sm-3 mr-auto">
                    <button id="proceed-to-cart-btn" class="btn btn-primary">Proceed To Cart</button>
                </div>
            </div>
            
        </div>
    </div>
<?php 
include "footer.php";
?>