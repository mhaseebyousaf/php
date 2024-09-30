<?php 
    include("admin-header.php");

?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- side Bar  -->
                <?php 
                    include("admin-side-bar.php");
                ?>
                <div class="col-md-10 col-sm-9 px-0 pb-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Add Product</h2>
                            </div>
                        </div>
                        <form id="add-product-form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="add-product-product-title"><b>Product Name</b></label>
                                                <input type="text" name="add-product-product-title" id="add-product-product-title" class="form-control" placeholder="Product Name" aria-describedby="add-product-product-title-helpId">
                                                <small id="add-product-product-title-helpId" class="form-text text-muted">Type Product Name</small>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="add-product-product-category"><b>Product Category</b></label>
                                              <select class="form-control" aria-describedby="add-product-product-category-helpId" name="add-product-product-category" id="add-product-product-category">
                                                <option selected disabled>Categories</option>
                                                <?php 
                                                    $db->select("product_category","*",null,null,"pro_cat_id DESC",null);
                                                    $row = $db->getResult();
                                                    if (!empty($row)) {
                                                    foreach ($row[0] as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value["pro_cat_id"]; ?>"><?php echo $value["pro_cat_title"]; ?></option>
                                                <?php 
                                                    }
                                                } else {
                                                ?>
                                                <option disabled selected>!!! No Category Found</option>
                                                <?php 
                                                }
                                                ?>
                                              </select>
                                              <small id="add-product-product-category-helpId" class="form-text text-muted">Product Category</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="add-product-product-sub-category"><b>Product Sub Category</b></label>
                                              <select class="form-control" name="add-product-product-sub-category" id="add-product-product-sub-category" aria-describedby="add-product-product-sub-category-helpId">
                                              </select>
                                              <small id="add-product-product-sub-category-helpId" class="form-text text-muted">Product Sub-Category</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                              <label for="add-product-product-brand"><b>Product Brand</b></label>
                                              <select class="form-control" name="add-product-product-brand" id="add-product-product-brand" aria-describedby="add-product-product-brand-helpId">
                                                <?php
                                                $db->select("brand","*",null, null, "brand_id DESC", null);
                                                $row = $db->getResult();
                                                if (!empty($row[0])) {
                                                foreach ($row[0] as $key => $value) {
                                                ?>
                                                <option value="<?php echo $value["brand_id"] ?>"><?php echo $value["brand_name"] ?></option>
                                                <?php 
                                                    }
                                                } else {
                                                ?>
                                                <option disabled selected>!!! No Brand Found</option>
                                                <?php 
                                                }
                                                ?>
                                              </select>
                                              <small id="add-product-product-brand-helpId" class="form-text text-muted">Product Brand</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="add-admin-product-description"><b>Product Description</b></label>
                                              <textarea class="form-control" name="add-admin-product-description" id="add-admin-product-description" rows="10" aria-describedby="add-product-product-description-helpId"></textarea>
                                              <small id="add-product-product-description-helpId" class="form-text text-muted">Product Description</small>
                                            </div>
                                            <div id="add-product-message-box"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                              <label for="add-product-featured-image"><b>Featured Image</b></label>
                                              <input type="file" accept=".png, .jpg, .jpeg" multiple class="form-control-file" name="add-product-featured-image[]" id="add-product-featured-image" placeholder="Choose An Image" aria-describedby="add-product-featured-image-fileHelpId">
                                              <div id="add-product-featured-image-box">
                                                <div id="add-product-featured-image-inner-box"></div>
                                                <!-- <img src="" id="add-product-featured-image-box-img" alt=""> -->
                                                <div id="add-product-featured-image-side-image-box">
                                                    <!-- <div class="add-product-featured-image-side-image">
                                                        <img src="" alt="" >
                                                    </div>
                                                    <div class="add-product-featured-image-side-image">
                                                        <img src="" alt="" >
                                                    </div>
                                                    <div class="add-product-featured-image-side-image">
                                                        <img src="" alt="" >
                                                    </div> -->
                                                </div>
                                              </div>
                                              <small id="add-product-featured-image-fileHelpId" class="form-text text-muted">First Image Will Be Selected As Featured Image</small>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                              <label for="add-product-product-price"><b>Product Price</b></label>
                                              <input type="text" name="add-product-product-price" id="add-product-product-price" class="form-control" placeholder="Product Price" aria-describedby="add-product-product-price-helpId">
                                              <small id="add-product-product-price-helpId" class="text-muted">Product Price</small>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                              <label for="add-product-quantity"><b>Available Quantity</b></label>
                                              <input type="text" name="add-product-quantity" id="add-product-quantity" class="form-control" placeholder="Available Quantity" aria-describedby="add-product-quantity-helpId">
                                              <small id="add-product-quantity-helpId" class="text-muted">Product Quantity</small>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="form-group">
                                              <label for="add-product-status"><b>Status</b></label>
                                              <select class="form-control" name="add-product-status" id="add-product-status" aria-describedby="add-product-status-helpId">
                                                <option value="1">Publish</option>
                                                <option value="0">Draft</option>
                                              </select>
                                              <small id="add-product-status-helpId" class="text-muted">Product Status</small>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="submit" id="add-product-submit-btn" value="Add Product" class="btn btn-sm btn-primary d-block mx-auto">
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
    <script src="js/add-product.js"></script>
<?php 
    include("footer.php");
?>