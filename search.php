<?php
include "header.php";
$db->select("product_category", "pro_cat_id, pro_cat_title", null, null, null, null);
$category = $db->getResult();
?>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-9 offset-md-3">
                <div id="latest-products-header">
                    <h2 class="text-muted text-center">Search Results</h2>
                </div>
                <hr class="my-3 mx-auto border-dark rounded-left rounded-right w-25 ">

            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <h5 class="list-group-item list-group-item-light">Related Categories</h5>
                    <?php
                    if (!empty($category[0])) {
                        foreach ($category[0] as $cat) {
                    ?>
                    <a href="category.php?cid=<?php echo $cat["pro_cat_id"] ?>" class="list-group-item list-group-item-action list-group-item-light"><?php echo $cat["pro_cat_title"] ?></a>
                    <?php 
                        }
                    } else {
                    ?>
                    <a class="list-group-item list-group-item-action list-group-item-light">No Category Found</a>
                    <?php 
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-9">
            <?php 
                $search = $_GET["search"];
                $db->select("options", "site_currency_format", null, null, null, null);
                $currency_form = $db->getResult();
                $db->select("products", "*", null, "product_title OR product_description LIKE '%$search%'", null, null);
                $search_items = $db->getResult();
                if (!empty($search_items[0])) {
                ?>
                <div id="owl-demo" class="search-owl-carousel owl-theme">
                    <?php 
                    foreach ($search_items[0] as $key => $value) {
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
                    ?>
                </div>
                <?php 
                } else {
                ?>
                <h3 class="bg-light text-center w-100">No Product Found</h3>
                <?php 
                }
                ?>
            </div>
        </div>
    </div>
    <?php 
    include "footer.php";
    ?>