<?php 
    include("admin-header.php");
?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                 <?php 
                    include("admin-side-bar.php");

                    $brand_update_id = $_GET["id"];
                    $db->select("brand","*",null,"brand_id = $brand_update_id",null, null);
                    $update_brand_name = $db->getResult();
                 ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Update Brand</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <form method="POST" id="update-brand-form">
                                    <div class="form-group">
                                      <label for="update-brand-title"><b>Brand Title</b></label>
                                      <input type="hidden" id="update-brand-brand-id" value="<?php echo $update_brand_name[0][0]["brand_id"]; ?>">
                                      <input type="text" class="form-control" value="<?php echo $update_brand_name[0][0]["brand_name"]; ?>" name="update-brand-title" id="update-brand-title" aria-describedby="update-brand-title-namehelpId" placeholder="Brand Title">
                                      <small id="update-brand-title-helpId" class="form-text text-muted">Brand</small>
                                    </div>
                                    <div class="form-group">
                                      <label for="update-brand-category">Brand Category</label>
                                      <select class="form-control" name="update-brand-category" id="update-brand-category">
                                        <?php 
                                        $db->select("brand_category","*",null,null,"brand_cat_id DESC",null);
                                        $brand_categories = $db->getResult();
                                        if (!empty($brand_categories)) {
                                            foreach ($brand_categories[0] as $key => $value) {
                                                if ($value["brand_cat_id"] == $update_brand_name[0][0]["brand_cat"]) {
                                                    
                                        ?>
                                        <option selected value="<?php echo $value["brand_cat_id"] ?>"><?php echo $value["brand_cat_name"] ?></option>
                                        <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $value["brand_cat_id"] ?>"><?php echo $value["brand_cat_name"] ?></option>
                                                <?php
                                                
                                            }
                                        }
                                    }
                                        ?>
                                      </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-sm" value="Update Brand">
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4" id="update-brand-message">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "footer.php";
?>