<?php 
include "header.php";

?>
    <div id="user-section-popular-products">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div id="popular-products-header">
                        <h2 class="text-muted text-center">Popular Products</h2>
                    </div>
                    <hr class="my-3 mx-auto border-dark rounded-left rounded-right w-25 ">
                    <div id="popular-products" class="owl-carousel owl-theme">
                        <?php
                        $db->select("options","site_currency_format",null,null,null,null);
                        $currency_form = $db->getResult();
                        $db->select("products","*",null, null, "product_views DESC", null);
                        $popular_products = $db->getResult();
                        if (!empty($popular_products[0])) {
                            foreach ($popular_products[0] as $value) {
                        ?>
                        <div class="item mx-2">
                            <div class="card bg-light products-card">
                                <img src="uploads/images/<?php echo $value["product_featured_image"] ?>" class="card-img-top" alt="Popular Coffee">
                                <div class="card-body">
                                    <div class="class-title">
                                        <h5><?php echo substr($value["product_title"], 0, 30) . "..." ?></h5>
                                    </div>
                                    <div class="card-subtitle">
                                        <h6 class="text-muted"><?php echo $currency_form[0][0]["site_currency_format"] ?> <?php echo $value["product_price"] ?></h6>
                                    </div>
                                    <div class="card-text">
                                        <p><?php echo substr($value["product_description"], 0, 100) . "..." ?></p>
                                    </div>
                                </div>
                                <div class="user-products-hower">
                                    <div class="products-hover-icons mx-auto d-flex flex-row">
                                        <a href="single-product.php?pid=<?php echo $value["product_id"] ?>" class="product-view-btn product-btn">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                        <button class="product-cart-btn product-btn" data-product-cart="<?php echo $value["product_id"] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                        <button class="product-favourite-btn product-btn" data-product-wishlist="<?php echo $value["product_id"] ?>">
                                            <i class="fa-solid fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        } else {
                        ?>
                        <div class="item no-product">
                            <h3 class="text-light">No Products Found</h3>
                        </div>
                        <?php 
                        }
                        ?>
                        
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12">
                    <div id="latest-products-header">
                        <h2 class="text-muted text-center">Latest Products</h2>
                    </div>
                    <hr class="my-3 mx-auto border-dark rounded-left rounded-right w-25 ">
                    <div id="latest-products" class="owl-carousel owl-theme">
                        <?php
                        $db->select("products", "*", null, null, "product_id DESC", null);
                        $latest_pro = $db->getResult();
                        if (!empty($latest_pro[0])) {
                            foreach ($latest_pro[0] as $key1 => $value1) {
                        ?>
                        <div class="item mx-2">
                            <div class="card bg-light products-card">
                                <img src="uploads/images/<?php echo $value1["product_featured_image"] ?>" class="card-img-top" alt="Popular Coffee">
                                <div class="card-body">
                                    <div class="class-title">
                                        <h5><?php echo substr($value["product_title"], 0, 30) . "..." ?></h5>
                                    </div>
                                    <div class="card-subtitle">
                                        <h6 class="text-muted"><?php echo $currency_form[0][0]["site_currency_format"] ?> <?php echo $value1["product_price"] ?></h6>
                                    </div>
                                    <div class="card-text">
                                        <p><?php echo substr($value["product_description"], 0, 100) . "..." ?></p>
                                    </div>
                                </div>
                                <div class="user-products-hower">
                                    <div class="products-hover-icons mx-auto d-flex flex-row">
                                        <a href="single-product.php?pid=<?php echo $value["product_id"] ?>" class="product-view-btn product-btn">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>
                                        <button class="product-cart-btn product-btn" data-product-cart="<?php echo $value["product_id"] ?>">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                        <button class="product-favourite-btn product-btn" data-product-wishlist="<?php echo $value["product_id"] ?>">
                                            <i class="fa-solid fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            }
                        } else {
                        ?>
                        <div class="item no-product">
                            <h3 class="text-light">No Products Found</h3>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php 
include "footer.php";
?>