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
                                <h2 class="w-100 d-block">Add New Sub Category</h2>
                            </div>
                        </div>
                        <form id="add-new-sub-category-form" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label for="add-sub-category-title"><b>Title</b></label>
                                    <input type="text" class="form-control" name="add-sub-category-title" id="add-sub-category-title" aria-describedby="add-sub-category-title-namehelpId" placeholder="Sub Category Title">
                                    <small id="add-sub-category-title-helpId" class="form-text text-muted">Enter Sub category</small>
                                    </div>
                                    <div class="form-group">
                                    <label for="add-sub-category-parent-category">Parent Category</label>
                                    <select class="form-control" name="add-sub-category-parent-category" id="add-sub-category-parent-category" aria-describedby="add-parent-category-title-namehelpId">
                                        <option value="" disabled selected>Select Parent Category</option>
                                        <?php 

                                            $db->select("product_category","*",null, null, null, null);
                                            $row = $db->getResult();
                                            foreach ($row[0] as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value["pro_cat_id"]; ?>"><?php echo $value["pro_cat_title"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <small id="add-parent-category-title-namehelpId" class="form-text text-muted">Select Parent category</small>
                                    </div>
                                    <b><input type="submit" id="add-sub-category-submit" class="btn text-light btn-primary btn-sm" value="ADD SUB-CATEGORY"></b>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row mt-4">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <h6>Show In Header</h6>
                                        </div>
                                        <div class="col-sm-6">
                                        <input type="checkbox" name="add-sub-category-show-in-header" id="add-sub-category-show-in-header">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                    <div class="col-sm-2"></div>
                                        <div class="col-sm-4">
                                            <h6>Show In Footer</h>
                                        </div>
                                        <div class="col-sm-6">
                                        <input type="checkbox" name="add-sub-category-show-in-footer" id="add-sub-category-show-in-footer">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-7" id="add-sub-category-message"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include("footer.php");
?>