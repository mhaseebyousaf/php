<?php
    include("admin-header.php");

?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid" style="min-height:80vh;">
            <div class="row">
                <!-- Side Bar  -->
                <?php
                    include("admin-side-bar.php");
                 ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container dashboard-box-container">
                        <div class="row admin-panel-heading-container">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Sub Categories</h2>
                            </div>
                            <div class="col-sm-3 ml-auto" id="sub-categories-add-new-btn-container">
                                <a href="add-new-subcategory.php" class="btn btn-primary my-auto" id="sub-categories-add-new-btn">Add New</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover w-100" id="sub-categories-section-table">
                                    <thead>
                                        <tr>
                                            <th class="w-50"><b>Title</b></th>
                                            <th>Category</th>
                                            <th>Show In Header</th>
                                            <th>Show In Footer</th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $limit = 6;
                                        $db->select(
                                            "product_sub_category",
                                            "product_sub_category.sub_cat_id, product_sub_category.sub_cat_name, product_sub_category.sub_cat_product,product_sub_category.sub_cat_in_header, product_sub_category.sub_cat_in_footer, product_category.pro_cat_title",
                                            "INNER JOIN product_category ON product_sub_category.sub_cat_parent_cat = product_category.pro_cat_id",
                                            null,
                                            "sub_cat_id DESC",
                                            $limit);
                                        $row = $db->getResult();
                                        // echo "<pre>";
                                        // print_r($row);
                                        // echo "</pre>";
                                        $header_checked = "";
                                        $footer_checked = "";
                                        foreach ($row[0] as $key => $value) {
                                            
                                        ?>
                                        <tr>
                                            <td><span id="sub-category-title"><?php echo $value["sub_cat_name"] ?></span></td>
                                            <td><span id="sub-category-category"><?php echo $value["pro_cat_title"] ?></span></td>
                                            <td>
                                                <?php
                                                if ($value["sub_cat_in_header"] == "1") {
                                                    echo "<input type='checkbox' name='show-in-header' checked class='show-in-header'>";
                                                } else {
                                                    echo "<input type='checkbox' name='show-in-header' class='show-in-header'>";
                                                }
                                                
                                                ?>
                                            </td>
                                            <td>
                                            <?php
                                                if ($value["sub_cat_in_footer"] == "1") {
                                                    echo "<input type='checkbox' name='show-in-footer' checked class='show-in-footer'>";
                                                } else {
                                                    echo "<input type='checkbox' name='show-in-footer' class='show-in-footer'>";
                                                }
                                                
                                                ?>
                                            </td>
                                            <td>
                                                <a href="update-sub-category.php?id=<?php echo $value["sub_cat_id"] ?>" class="mr-1"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="javascript:void()" data-id="<?php echo $value["sub_cat_id"] ?>" class="ml-1 sub-cat-delete-btn"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $header_checked = "";
                                        $footer_checked = "";
                                        }
                                    // }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            $db->pagination("product_sub_category",null,null,$limit);
            ?>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>