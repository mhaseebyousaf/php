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
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Add New Category</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <form id="add-new-category-form">
                                    <div class="form-group">
                                      <label for="add-new-category-name"><b>Add Category</b></label>
                                      <input type="text" class="form-control" name="add-new-category-name" id="add-new-category-name" aria-describedby="add-new-category-namehelpId" placeholder="Add New Category">
                                      <small id="add-new-category-name-helpId" class="form-text text-muted">Enter new category</small>
                                    </div>
                                    <input type="submit" value="ADD" class="btn btn-primary btn-sm">
                                </form>
                                <div id="add-category-message"></div>
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