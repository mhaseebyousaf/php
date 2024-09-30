<?php
    include("admin-header.php");

?>
    <div class="admin-panel-outer-most-container mb-3">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                <?php
                    include("admin-side-bar.php");
                 ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container dashboard-box-container">
                        <div class="row admin-panel-heading-container">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Brands</h2>
                            </div>
                            <div class="col-sm-3 ml-auto" id="brands-new-btn-container">
                                <a href="add-brand.php" class="btn btn-primary my-auto" id="brands-add-new-btn">Add New</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped table-hover w-100" id="brands-section-table">
                                    <thead>
                                        
                                        <tr>
                                            <th><b>Title</b></th>
                                            <th><b>Category</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    <?php
                                        $limit = 6;
                                        $db->select("brand",
                                        "brand.brand_id, brand.brand_name, brand_category.brand_cat_name",
                                        "JOIN brand_category ON brand.brand_cat = brand_category.brand_cat_id",
                                        null,
                                        "brand_id DESC",
                                        $limit);
                                        $row = $db->getResult();
                                        foreach ($row[0] as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><span id="brands-brand-title"><?php echo $value["brand_name"] ?></span></td>
                                            <td><span id="brands-category"><?php echo $value["brand_cat_name"] ?></span></td>
                                            <td>
                                                <a href="update-brand.php?id=<?php echo $value["brand_id"] ?>" class="mr-1"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="javascript:void(0)" data-brand-del-id="<?php echo $value["brand_id"] ?>" class="ml-1 brand-del-btn"><i class="fa-solid fa-trash"></i></a>
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
                </div>
            </div>
        </div>
        <?php
        $db->pagination("brand",null, null, $limit);
        ?>
    </div>
    <?php
    include "footer.php";
    ?>