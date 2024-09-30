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
                    <div class="container dashboard-box-container">
                        <div class="row admin-panel-heading-container">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">All Products</h2>
                            </div>
                            <div class="col-sm-3 ml-auto" id="admin-products-add-new-btn-container">
                                <a href="add-product.php" class="btn btn-primary my-auto" id="admin-products-add-new-btn">Add New</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover w-100" id="admin-products-section-table">
                                    <thead>
                                        <tr>
                                            <th><b>#</b></th>
                                            <th class="w-25"><b>Title</b></th>
                                            <th><b>Category</b></th>
                                            <th><b>Brand</b></th>
                                            <th><b>Price</b></th>
                                            <th><b>Quantity</b></th>
                                            <th><b width="20px">Image</b></th>
                                            <th><b>Status</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $limit = 10;
                                        $no = 0;
                                        $db->select("products", "products.product_title, product_category.pro_cat_title, brand.brand_name, products.product_price, products.product_quantity, products.product_featured_image, products.product_status, products.product_id, product_sub_category.sub_cat_id", "INNER JOIN product_category ON products.product_cat = product_category.pro_cat_id INNER JOIN brand ON products.product_brand = brand.brand_id INNER JOIN product_sub_category ON products.product_sub_cat = product_sub_category.sub_cat_id", null, "product_id DESC", $limit);
                                        $row = $db->getResult();
                                        if (!empty($row)) {
                                            foreach ($row[0] as $key => $value) {
                                                $no += 1;
                                        ?>
                                        <tr>
                                            <td><b><?php echo $no; ?></b></td>
                                            <td><?php echo $value["product_title"] ?></td>
                                            <td><?php echo $value["pro_cat_title"] ?></td>
                                            <td><?php echo $value["brand_name"] ?></td>
                                            <td>Rs. <span id="admin-products-price"><?php echo $value["product_price"] ?></span></td>
                                            <td>12</td>
                                            <td width="50px"><img src="../uploads/images/<?php echo $value["product_featured_image"] ?>" width="100%" alt=""></td>
                                            <?php 
                                            if ($value["product_status"] == 1) {
                                                $status_class = "bg-success";
                                                $status_text = "Active";
                                            } else {
                                                $status_class = "bg-danger";
                                                $status_text = "Inactive";
                                            }
                                            ?>
                                            <td><span id="admin-products-status-active" class="<?php echo $status_class; ?>"><?php echo $status_text; ?></span></td>
                                            <td>
                                                <a href="edit-product.php?id=<?php echo $value["product_id"] ?>" class="mr-1 admin-product-edit-btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="javascript:void(0)" class="ml-1 admin-product-delete-btn" data-del-id="<?php echo $value["product_id"] ?>" data-del-sub-cat-id="<?php echo $value["sub_cat_id"] ?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="admin-products-pagination">
                        <?php 
                        $db->pagination("products", "INNER JOIN product_category ON products.product_cat = product_category.pro_cat_id INNER JOIN brand ON products.product_brand = brand.brand_id", null, $limit);

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include "footer.php";
?>