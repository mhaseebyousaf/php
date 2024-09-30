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
                        <div class="row">
                            <div class="col-sm-12 px-0 py-4 admin-panel-heading-container">
                                <h2 class="w-100 d-block pl-3">Dashboard</h2>
                            </div>
                        </div>
                        <?php 
                        $db->select("products", "product_id", null, "product_quantity = 0", "product_id DESC", null);
                        $out_of_stock = $db->getResult();
                        if (!empty($out_of_stock[0])) {
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered w-100">
                                    <thead class="thead-light">
                                        <th colspan="2"><b>Out Of Stock</b></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($out_of_stock[0] as $key => $value) {
                                        ?>
                                        <tr>
                                        <td>Product Code</td>
                                        <td>MHY<?php echo $value["product_id"] ?><span id="out-of-stock-product-code">2</span></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="row dashboard-box-outer-container">
                            <div class="col-sm-4 my-4">
                                <div class="dashboard-box d-block mx-auto my-auto">
                                    <h2 class="mt-3">
                                        <?php
                                        
                                        $db->select("products", "COUNT(*)",null,null,null);
                                        $pro = $db->getResult();
                                        echo $pro[0][0]["COUNT(*)"];
                                        ?>
                                    </h2>
                                    <h4>Products</h4>
                                </div>
                            </div>
                            <div class="col-sm-4 my-4">
                                <div class="dashboard-box d-block mx-auto my-auto">
                                    <h2 class="mt-3">
                                    <?php 
                                       
                                        $db->select("product_category","COUNT(*) AS total_categories",null,null,null,null);
                                        $row = $db->getResult();
                                        echo $row[0][0]["total_categories"];
                            
                                    ?>
                                    </h2>
                                    <h4>Categories</h4>
                                </div>
                            </div>
                            <div class="col-sm-4 my-4">
                                <div class="dashboard-box d-block mx-auto my-auto">
                                    <h2 class="mt-3"><?php 
                                   
                                        $db->select("product_sub_category","COUNT(*) AS total_sub_categories",null,null,null,null);
                                        $row = $db->getResult();
                                        echo $row[0][0]["total_sub_categories"];
                            
                                    ?></h2>
                                    <h4>Sub-Categories</h4>
                                </div>
                            </div>
                            <div class="col-sm-4 my-4">
                                <div class="dashboard-box d-block mx-auto my-auto">
                                    <h2 class="mt-3"><?php 
                                        $db->select("brand","COUNT(*) AS total_brands",null,null,null,null);
                                        $row = $db->getResult();
                                        echo $row[0][0]["total_brands"];
                                    ?></h2>
                                    <h4>Brands</h4>
                                </div>
                            </div>
                            <div class="col-sm-4 my-4">
                                <div class="dashboard-box d-block mx-auto my-auto">
                                    <h2 class="mt-3">
                                        <?php 
                                        $db->select("orders", "COUNT(*)",null,null,null);
                                        $orders = $db->getResult();
                                        echo $orders[0][0]["COUNT(*)"];
                                        ?>
                                    </h2>
                                    <h4>Orders</h4>
                                </div>
                            </div>
                            <div class="col-sm-4 my-4">
                                <div class="dashboard-box d-block mx-auto my-auto">
                                    <h2 class="mt-3"><?php 
                                        $db->select("users","COUNT(*) AS total_users",null,null,null,null);
                                        $row = $db->getResult();
                                        echo $row[0][0]["total_users"];
                                    ?></h2>
                                    <h4>Users</h4>
                                </div>
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