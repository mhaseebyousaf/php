<?php 
    include("admin-header.php");
?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                <?php
                    include("admin-side-bar.php");
                    $db->select("brand_category","*",null,null,"brand_cat_id DESC", null);
                    $row = $db->getResult();
                ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Add Brand</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <form id="add-brand-form">
                                    <div class="form-group">
                                      <label for="add-brand-title"><b>Title</b></label>
                                      <input type="text" class="form-control" name="add-brand-title" id="add-brand-title" aria-describedby="add-brand-title-namehelpId" placeholder="Brand Title">
                                      <small id="add-brand-title-helpId" class="form-text text-muted">Brand</small>
                                    </div>
                                    <div class="form-group">
                                      <label for="add-brand-category">Brand Category</label>
                                      <select class="form-control" name="add-brand-category" aria-describedby="add-brand-category-helpId" id="add-brand-category">
                                        <option value="" disabled selected>Select Brand Category</option>
                                        <?php 
                                        foreach ($row[0] as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value["brand_cat_id"]; ?>"><?php echo $value["brand_cat_name"]; ?></option>
                                        <?php 
                                        }
                                        ?>
                                      </select>
                                      <small id="add-brand-category-helpId" class="form-text text-muted">Brand Category</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm"><b>ADD BRAND</b></button>
                                </form>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4" id="add-brand-message"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include("footer.php");
?>