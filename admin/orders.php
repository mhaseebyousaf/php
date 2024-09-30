<?php
    include("admin-header.php");

    
?>
    <div class="admin-panel-outer-most-container" style="min-height: calc(100vh - 126px) !important">
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
                                <h2 class="w-100 d-block">Orders</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover w-100" id="admin-orders-section-table">
                                    <thead>
                                        <tr>
                                            <th><b>Order No</b></th>
                                            <th width="100px"><b>Product Code</b></th>
                                            <th><b>Qty.</b></th>
                                            <th><b>Total Amount</b></th>
                                            <th width="230px"><b>Customer Details</b></th>
                                            <th><b>Order Date</b></th>
                                            <th><b>Payment Status</b></th>
                                            <th><b>Delivery Status</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $limit = 7;
                                            $db->select("orders",
                                            "orders.order_id, products.product_code, orders.order_product_quantity, orders.total_amount, users.user_userName, users.user_address, orders.order_date, orders.confirm_payment, orders.delivery_status, users.user_city",
                                            "INNER JOIN products ON orders.product_id = products.product_id INNER JOIN users ON orders.user_id = users.user_id",
                                            null,
                                            "order_id DESC",
                                            $limit);
                                            $row = $db->getResult();
                                            if (!empty($row[0])) {
                                            foreach ($row[0] as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><b>MHY00<?php echo $value["order_id"] ?></b></td>
                                            <td><span class="orders-product-code"><?php echo $value["product_code"] ?></span></td>
                                            <td><?php echo $value["order_product_quantity"] ?></td>
                                            <td>Rs. <span class="orders-total-amount"><?php echo $value["total_amount"] ?></span></td>
                                            <td>
                                                <b>Name</b> <span class="orders-customer-name"><?php echo $value["user_userName"] ?></span><br>
                                                <b>Address</b> <span class="orders-customer-address"><?php echo $value["user_address"] ?></span><br>
                                                <b>City</b> <span class="orders-customer-city"><?php echo $value["user_city"] ?></span><br>
                                            </td>
                                            <td><span class="orders-order-date"><?php echo $value["order_date"] ?></span></td>
                                            <?php  
                                            if ($value["confirm_payment"] == 1) {
                                                $confirm_payment_class = "btn-success";
                                                $confirm_payment_text = "Paid";
                                            } else {
                                                $confirm_payment_class = "btn-danger";
                                                $confirm_payment_text = "Unpaid";
                                            }
                                            ?>
                                            <td><button data-orders-confirm-payment-status="<?php echo $value["confirm_payment"] ?>" data-orders-confirm-payment-btn="<?php echo $value["order_id"] ?>" class="btn btn-sm orders-confirm-payment-btn <?php echo $confirm_payment_class ?>"><?php echo $confirm_payment_text ?></button></td>
                                            <?php  
                                            if ($value["delivery_status"] == 1) {
                                                $delivery_status_class = "btn-success";
                                                $delivery_status_text = "Completed";
                                            } else {
                                                $delivery_status_class = "btn-primary";
                                                $delivery_status_text = "Complete";
                                            }
                                            ?>
                                            <td><button data-orders-delivery-status="<?php echo $value["delivery_status"] ?>" data-orders-delivery-status-btn="<?php echo $value["order_id"] ?>" class="btn <?php echo $delivery_status_class ?> btn-sm orders-delivery-status-btn"><?php echo $delivery_status_text ?></button></td>
                                        </tr>
                                        <?php 
                                            }
                                        } else {
                                        ?>
                                        <tr>
                                            <td><h3>No Orders Found</h3></td>
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
        <div id="pagination-outer">
            <?php 
            $db->pagination("orders",
            "INNER JOIN products ON orders.product_id = products.product_id INNER JOIN users ON orders.user_id = users.user_id",
            null,
            $limit
            );
            ?>
        </div>
    </div>
<?php
include "footer.php";
?>