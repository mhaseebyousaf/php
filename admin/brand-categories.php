<?php
    include("admin-header.php");
?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid mb-2">
            <div class="row">
                <!-- Side Bar  -->
                 <?php
                    include("admin-side-bar.php");
                 ?>
                <div class="col-md-10 col-sm-9 px-0 w-100">
                    <div class="container dashboard-box-container">
                        <div class="row admin-panel-heading-container">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Brand Categories</h2>
                            </div>
                            <div class="col-sm-3 ml-auto" id="brand-categories-add-new-btn-container">
                                <a href="add-new-brand-category.php" class="btn btn-primary my-auto" id="brand-categories-products-add-new-btn">Add New</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover w-100" id="admin-products-section-table">
                                    <thead>
                                        <tr>
                                            <th class="w-50"><b>Title</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                                $limit = 5;

                                                $db->select("brand_category","*", null, null, "brand_cat_id DESC", $limit);
                                                $row = $db->getResult();
                                                foreach ($row[0] as $key => $value) {
                                                    
                                                    
                                            ?>
                                            <tr>
                                                <td><?php echo $value["brand_cat_name"]; ?></td>
                                                <td>
                                                    <a href="update-brand-category.php?brand_cat_edit_id=<?php echo $value["brand_cat_id"]; ?>" class="mr-1"><i class="fa-regular fa-pen-to-square"></i></a>
                                                    <a href="javascript:void()" data-brand-id="<?php echo $value["brand_cat_id"]; ?>" class="ml-1 admin-delete-brand-category"><i class="fa-solid fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                            <div class="col">
                                <?php
                                    $db->pagination("brand_category",null, null, $limit);
                                ?>
                            </div>
                        </div>
                </div>
            </div>
            
        </div>
    </div>
    
    <?php
        include "footer.php";
    ?>