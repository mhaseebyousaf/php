<?php 
    include("admin-header.php");
?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                 <?php
                    include("admin-side-bar.php");
                 ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Update Brand Category</h2>
                            </div>
                        </div>
                        <?php 
                            $id = $_GET["brand_cat_edit_id"];

                            $db->select("brand_category","*",null, "brand_cat_id={$id}", null, null);
                            $row = $db->getResult();
                            ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <form id="update-brand-category-form" action="">
                                    <div class="form-group">
                                      <label for="update-brand-category-name"><b>Update Category</b></label>
                                      <input type="hidden" name="update-brand-category-id" id="update-brand-category-id" value="<?php echo $row[0][0]["brand_cat_id"] ?>">
                                      <input type="text" class="form-control" name="update-brand-category-name" value="<?php echo $row[0][0]["brand_cat_name"] ?>" id="update-brand-category-name" aria-describedby="update-category-namehelpId" required placeholder="Update Brand Category">
                                      <small id="update-category-name-helpId" class="form-text text-muted">Update category</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">UPDATE</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div id="update-brand-category-message" class="col-sm-4">
                                
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