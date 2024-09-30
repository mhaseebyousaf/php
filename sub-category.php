<?php 
include "header.php";
$sub_cat_id = $_GET["scid"];
// $db->select("product_category", "pro_cat_title", null, "pro_cat_id = $sub_cat_id", null, null);
// $category = $db->getResult();

$db->select("product_sub_category", "sub_cat_name", null, "sub_cat_id = $sub_cat_id", "sub_cat_id DESC", null);
$sub_category = $db->getResult();

$db->select("options","site_currency_format",null,null,null,null);
$currency_form = $db->getResult();
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="latest-products-header">
                    <h2 class="text-muted text-center mt-4"><?php echo $sub_category[0][0]["sub_cat_name"] ?></h2>
                </div>
                <hr class="my-3 mx-auto border-dark rounded-left rounded-right w-25 ">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="sub-category-items" class="owl-carousel owl-theme">
                        <?php
                        $db->select("products", "*", null, "product_sub_cat = $sub_cat_id", "product_id DESC", null);
                        $cat_pro = $db->getResult();

                        if (!empty($cat_pro[0])) {
                            foreach ($cat_pro[0] as $value1) {
                        ?>
                        <div class="item mx-2">
                            <div class="card bg-light products-card">
                                <img src="uploads/images/<?php echo $value1["product_featured_image"] ?>" class="card-img-top" alt="Popular Coffee">
                                <div class="card-body">
                                    <div class="class-title">
                                        <h5><?php echo substr($value1["product_title"], 0, 30) . "..." ?></h5>
                                    </div>
                                    <div class="card-subtitle">
                                        <h6 class="text-muted"><?php echo $currency_form[0][0]["site_currency_format"] ?> <?php echo $value1["product_price"] ?></h6>
                                    </div>
                                    <div class="card-text">
                                        <p><?php echo substr($value1["product_description"], 0, 100) . "..." ?></p>
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
    <!-- <script src="Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/assets/js/jquery-1.9.1.min.js"></script>
    <script src="Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/Powerful-Customizable-jQuery-Carousel-Slider-OWL-Carousel/owl-carousel/owl.carousel.js"></script> --> -->
     <!-- <script>
        $(document).ready(function() {
 
 $(".owl-carousel").owlCarousel({
    items: 2
 });

});
    </script> -->
<?php 
include "footer.php";
?>