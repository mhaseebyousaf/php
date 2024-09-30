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
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 py-4 ">
                                <h2 class="w-100 d-block">Add New Brand Category</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <form id="add-new-brand-category-form">
                                    <div class="form-group">
                                      <label for="add-new-brand-category-name"><b>Add Brand Category</b></label>
                                      <input type="text" class="form-control" name="add-new-brand-category-name" id="add-new-brand-category-name" aria-describedby="add-new-brand-category-name-namehelpId" placeholder="Add New Category">
                                      <small id="add-new-brand-category-name-helpId" class="form-text text-muted">Enter new category</small>
                                    </div>
                                    <input type="submit" value="ADD" class="btn btn-primary btn-sm">
                                </form>
                                <div id="add-brand-category-message"></div>
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