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
                                <h2 class="w-100 d-block">Update Category</h2>
                            </div>
                        </div>
                        <?php 
                            $id = $_GET["pro_cat_edit_id"];

                            $db->select("product_category","*",null, "pro_cat_id={$id}", null, null);
                            $row = $db->getResult();
                            ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <form id="update-category-form" action="">
                                    <div class="form-group">
                                      <label for="update-category-name"><b>Update Category</b></label>
                                      <input type="hidden" name="update-category-id" id="update-category-id" value="<?php echo $row[0][0]["pro_cat_id"] ?>">
                                      <input type="text" class="form-control" name="update-category-name" value="<?php echo $row[0][0]["pro_cat_title"] ?>" id="update-category-name" aria-describedby="update-category-namehelpId" required placeholder="Update Category">
                                      <small id="update-category-name-helpId" class="form-text text-muted">Update category</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">UPDATE</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div id="update-category-message" class="col-sm-4">
                                
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