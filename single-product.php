<?php 
include "header.php";

$single_product_id = $_GET["pid"];
$db->select("options", "site_currency_format", null, null, null, null);
$currency_form = $db->getResult();
$db->select("products", "*", null, "product_id = $single_product_id", null, null);
$single_product = $db->getResult();

?>


<div class="container">
    <div class="row my-5">
        <div class="col-sm-3">
            <div id="single-product-side-images">
                <div class="single-product-side-image-box">
                    <img src="uploads/images/<?php echo $single_product[0][0]["side_img_one"] ?>" alt="">
                </div>
                <div class="single-product-side-image-box">
                    <img src="uploads/images/<?php echo $single_product[0][0]["side_img_two"] ?>" alt="">
                </div>
                <div class="single-product-side-image-box">
                    <img src="uploads/images/<?php echo $single_product[0][0]["side_img_three"] ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div id="single-product-image-box">
                <img src="uploads/images/<?php echo $single_product[0][0]["product_featured_image"] ?>" alt="">
            </div>
        </div>
        <div class="col-sm-4">
            <div id="single-product-product-title">
                <h2><?php echo $single_product[0][0]["product_title"] ?></h2>
            </div>
            <div id="single-product-price">
                <h4 class="lead text-muted"><?php echo $currency_form[0][0]["site_currency_format"] ?> <?php echo $single_product[0][0]["product_price"] ?></h4>
            </div>
            <div id="single-product-description">
                <p><?php echo $single_product[0][0]["product_description"] ?></p>
            </div>
            <div class="row">
        <button class="btn btn-primary mx-auto">Add to Wishlist</button>
        <button class="btn btn-primary mx-auto">Add to Cart</button>
    </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row mt-5 mb-3">
        <h2 class="text-center mx-auto d-block w-100">Related Products</h2><br>
        <hr class="my-3 mx-auto border-dark rounded-left rounded-right w-25 ">
    </div>
    <div class="row">
        <div id="single-product-owl-demo" class="owl-carousel owl-theme">
            <?php
            $sub_cat = $single_product[0][0]["product_sub_cat"];
            $db->select("products", "*", null, "product_sub_cat = $sub_cat", null, null);
            $related_pro = $db->getResult();
            if (!empty($related_pro[0])) {
                foreach ($related_pro[0] as $key1 => $value1) {
            ?>
            <div class="item mx-2">
                <div class="card bg-light products-card">
                    <img src="uploads/images/<?php echo $value1["product_featured_image"] ?>" class="card-img-top">
                    <div class="card-body">
                        <div class="class-title">
                            <h5><?php echo substr($value1["product_title"], 0, 50) . "..." ?></h5>
                        </div>
                        
                    </div>
                    <div class="user-products-hower">
                        <div class="products-hover-icons mx-auto d-flex flex-row">
                            <a href="single-product.php?pid=<?php echo $value1["product_id"] ?>" class="product-view-btn product-btn">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                            <button class="product-cart-btn product-btn" data-product-cart="<?php echo $value1["product_id"] ?>">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                            <button class="product-favourite-btn product-btn" data-product-wishlist="<?php echo $value1["product_id"] ?>">
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
            <div class="col-sm-12">
                <h3 class="text-light">No Related Product Found</h3>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>
</div>





<?php 
include "footer.php";
?>