<?php 
    include("admin-header.php");

    $edit_pro_id = $_GET["id"];
    $db->select("products","*",null, "product_id = $edit_pro_id", null, null);
    $row = $db->getResult();

?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- side Bar  -->
                <?php 
                    include("admin-side-bar.php");
                ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Edit Product</h2>
                            </div>
                        </div>
                        <form id="edit-product-form" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="edit-product-product-title"><b>Product Name</b></label>
                                                <input type="text" value="<?php echo $row[0][0]["product_title"] ?>" name="edit-product-product-title" id="edit-product-product-title" class="form-control" placeholder="First Name" aria-describedby="edit-product-product-title-helpId">
                                                <input type="hidden" name="edit-product-id" value="<?php echo $edit_pro_id ?>">
                                                <small id="edit-product-product-title-helpId">Product Name</small>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="edit-product-product-category"><b>Product Category</b></label>
                                              <select class="form-control" name="edit-product-product-category" aria-describedby="edit-product-category-fileHelpId" id="edit-product-product-category">
                                              <?php
                                               $selected_category = $row[0][0]["product_cat"] ;
                                               $db->select("product_category","*",null,null,"pro_cat_id DESC", null);
                                               $category = $db->getResult();
                                               if (!empty($category[0])) {
                                               foreach ($category[0] as $key => $value) {
                                                if ($selected_category == $value["pro_cat_id"]) {
                                                    $cat_selected = "selected";
                                                } else {
                                                    $cat_selected = "";
                                                }
                                               ?>
                                                <option <?php echo $cat_selected ?> value="<?php echo $value["pro_cat_id"] ?>"><?php echo $value["pro_cat_title"] ?></option>
                                                <?php 
                                               }
                                            } else {
                                                ?>
                                                <option value="" disabled >!!! No Category found</option>
                                                <?php 
                                            }
                                                ?>
                                                <option>Stores</option>
                                              </select>
                                              <small id="edit-product-category-fileHelpId" class="form-text text-muted">Product Category</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="edit-product-product-sub-category"><b>Product Sub Category</b></label>
                                              <select class="form-control" name="edit-product-product-sub-category" id="edit-product-product-sub-category" aria-describedby="edit-product-sub-category-fileHelpId">
                                                <?php
                                                $selected_sub_category = $row[0][0]["product_sub_cat"];
                                                $db->select("product_sub_category","*",null, "sub_cat_id = $selected_sub_category", "sub_cat_id", null);
                                                $sub_cat = $db->getResult();
                                                if (!empty($sub_cat[0])) {
                                                foreach ($sub_cat[0] as $key => $value2) {
                                                    if ($value2["sub_cat_id"] == $selected_sub_category) {
                                                        $sub_cat_selected = "selected";
                                                    } else {
                                                        $sub_cat_selected = "";
                                                    }
                                                ?>
                                                <option <?php echo $sub_cat_selected ?> value="<?php echo $value2["sub_cat_id"] ?>"><?php echo $value2["sub_cat_name"] ?></option>
                                                <?php 
                                                }
                                            } else {
                                                ?>
                                                <option value="">!!! No Sub Category Found</option>
                                                <?php
                                            }
                                                ?>
                                                <option>Stores</option>
                                              </select>
                                              <small id="edit-product-sub-category-fileHelpId" class="form-text text-muted">Product Sub Category</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="edit-product-product-brand"><b>Product Brand</b></label>
                                              <select class="form-control" name="edit-product-product-brand" id="edit-product-product-brand">
                                                <?php 
                                                $selected_brand = $row[0][0]["product_brand"];
                                                $db->select("brand", "*", null, null, "brand_id DESC", null);
                                                $brand = $db->getResult();
                                                if (!empty($brand[0])) {
                                                foreach ($brand[0] as $key => $value3) {
                                                ?>
                                                <option value="<?php echo $value3["brand_id"] ?>"><?php echo $value3["brand_name"] ?></option>
                                                <?php 
                                                }
                                            } else {
                                                ?>
                                                <option disabled value="">! No Brand Found</option>
                                                <?php 
                                            }
                                                ?>
                                              </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="edit-admin-product-description"><b>Product Description</b></label>
                                              <textarea class="form-control" style="width: 100%;" name="edit-admin-product-description" id="edit-admin-product-description" rows="8">
                                              <?php echo $row[0][0]["product_description"] ?>
                                              </textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="edit-product-message-box"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                              <label for="edit-product-featured-image"><b>Featured Image</b></label>
                                              <input type="file" multiple accept=".jpg, .png, .jpeg" class="form-control-file" name="edit-product-featured-image" id="edit-product-featured-image" placeholder="Choose An Image" aria-describedby="edit-product-featured-image-fileHelpId">
                                              <input type="hidden" name="edit-product-featured-old-image" value="<?php echo $row[0][0]["product_featured_image"] ?>">
                                              <input type="hidden" name="edit-product-img1-old-image" value="<?php echo $row[0][0]["side_img_one"] ?>">
                                              <input type="hidden" name="edit-product-img2-old-image" value="<?php echo $row[0][0]["side_img_two"] ?>">
                                              <input type="hidden" name="edit-product-img3-old-image" value="<?php echo $row[0][0]["side_img_three"] ?>">
                                              <small id="edit-product-featured-image-fileHelpId" class="form-text text-muted">Featured Image</small>
                                            </div>
                                            <?php
                                                    $featured_img = $row[0][0]["product_featured_image"];
                                                    $side_img_one = $row[0][0]["side_img_one"];
                                                    $side_img_two = $row[0][0]["side_img_two"];
                                                    $side_img_three = $row[0][0]["side_img_three"];
                                                    if ($featured_img != "") {
                                                        $remove_bg = "style='background-image:none !important'";
                                                    } else {
                                                        $remove_bg = "";
                                                    }

                                                    if ($side_img_one != "") {
                                                        $remove_bg_one = "style='background-image:none !important'";
                                                    } else {
                                                        $remove_bg_one = "";
                                                    }

                                                    if ($side_img_two != "") {
                                                        $remove_bg_two = "style='background-image:none !important'";
                                                    } else {
                                                        $remove_bg_two = "";
                                                    }

                                                    if ($side_img_three != "") {
                                                        $remove_bg_three = "style='background-image:none !important'";
                                                    } else {
                                                        $remove_bg_three = "";
                                                    }
                                                    ?>
                                            <div id="edit-product-featured-image-box">
                                                <div <?php echo $remove_bg ?> id="edit-product-featured-image-inner-box">
                                                    
                                                    <img src="../uploads/images/<?php echo $row[0][0]["product_featured_image"] ?>" alt="">
                                                </div>
                                                <div id="edit-product-featured-image-side-image-box">
                                                    <div <?php echo $remove_bg_one ?> class="edit-product-featured-image-side-image">
                                                        <img src="../uploads/images/<?php echo $side_img_one ?>" alt="" >
                                                    </div>
                                                    <div <?php echo $remove_bg_two ?> class="edit-product-featured-image-side-image">
                                                        <img src="../uploads/images/<?php echo $side_img_two ?>" alt="" >
                                                    </div>
                                                    <div <?php echo $remove_bg_three ?> class="edit-product-featured-image-side-image">
                                                        <img src="../uploads/images/<?php echo $side_img_three ?>" alt="" >
                                                    </div>
                                                </div>
                                              </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                              <label for="edit-product-product-price"><b>Product Price</b></label>
                                              <input type="text" name="edit-product-product-price" value="<?php echo $row[0][0]["product_price"] ?>" id="edit-product-product-price" class="form-control" placeholder="Product Price" aria-describedby="edit-product-product-price-helpId">
                                              <small id="edit-product-product-price-helpId" class="text-muted"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                              <label for="edit-product-quantity"><b>Available Quantity</b></label>
                                              <input type="text" name="edit-product-quantity" value="<?php echo $row[0][0]["product_quantity"] ?>" id="edit-product-quantity" class="form-control" placeholder="Available Quantity" aria-describedby="edit-product-quantity-helpId">
                                              <small id="edit-product-quantity-helpId" class="text-muted"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                              <label for="edit-product-status"><b>Status</b></label>
                                              <select class="form-control" name="edit-product-status" id="edit-product-status">
                                              <?php 
                                              $pro_status = $row[0][0]["product_status"];
                                              if ($pro_status == 1) {
                                               ?>
                                                <option value="1" selected>Publish</option>
                                                <option value="0">Draft</option>
                                                <?php 
                                              } else {
                                                ?>
                                                <option value="1">Publish</option>
                                                <option value="0" selected>Draft</option>
                                                <?php 
                                              }
                                                ?>
                                              </select>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="submit" id="edit-product-submit-btn" value="Edit Product" class="btn btn-sm btn-primary d-block mx-auto mb-3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/edit-product.js"></script>
<?php 
include "footer.php";
?>