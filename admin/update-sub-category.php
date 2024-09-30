<?php
    include("admin-header.php");
?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                 <?php 
                    include("admin-side-bar.php");

                    $sub_cat_id = $_GET["id"];
                    $db->select("product_sub_category","sub_cat_id,sub_cat_name",null,"sub_cat_id=$sub_cat_id",null,null);
                    $row = $db->getResult();
                    
                 ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Update Sub Category</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <form id="update-sub-category-form">
                                    <div class="form-group">
                                        <input type="hidden" name="update-sub-category-sub-category-id" id="update-sub-category-sub-category-id" value="<?php echo $row[0][0]["sub_cat_id"]; ?>">
                                      <label for="update-sub-category-title"><b>Title</b></label>
                                      <input type="text" class="form-control" value="<?php echo $row[0][0]["sub_cat_name"]; ?>" name="update-sub-category-title" id="update-sub-category-title" aria-describedby="update-sub-category-title-namehelpId" placeholder="Category Title">
                                      <small id="update-sub-category-title-helpId" class="form-text text-muted">Update Sub Category</small>
                                    </div>
                                    <div class="form-group">
                                      <label for="update-sub-category-parent-category">Parent Category</label>
                                      <select class="form-control" name="update-sub-category-parent-category" aria-describedby="update-sub-category-parent-category-helpId" id="update-sub-category-parent-category">
                                        <?php
                                            $db->select("product_category","*",null, null, "pro_cat_id DESC",null);
                                            $row2 = $db->getResult();
                                            if (!empty($row2[0])) {
                                                foreach ($row2[0] as $key => $value) {
                                                    if ($sub_cat_id == $value["pro_cat_id"]) {
                                        ?>
                                        <option selected value="<?php echo $value["pro_cat_id"] ?>"><?php echo $value["pro_cat_title"] ?></option>
                                        <?php 
                                                } else {
                                        ?>
                                        <option value="<?php echo $value["pro_cat_id"] ?>"><?php echo $value["pro_cat_title"] ?></option>
                                        <?php 
                                                }
                                        }
                                    } else {
                                        ?>
                                        <option>No Product Found !</option>
                                        <?php 
                                    }
                                        ?>
                                      </select>
                                      <small id="update-sub-category-parent-category-helpId" class="form-text text-muted">Parent Category</small>
                                    </div>
                                    <b></b><input type="submit" class="btn btn-primary btn-sm"  value="Update SUB-CATEGORY"></b>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <div class="row mt-4">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <h6>Show In Header</h6>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="update-sub-category-show-in-header" id="update-sub-category-show-in-header">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <h6>Show In Footer</h6>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="checkbox" name="update-sub-category-show-in-footer" id="update-sub-category-show-in-footer">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8" id="update-sub-category-message"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include("footer.php");
?>