<?php
include "Database.php";
$db = new Database();
if (isset($_POST["confirm_payment_btn"])) {
    $confirm_payment_id = $_POST["confirm_payment_btn"];
    $confirm_payment_status = $_POST["confirm_payment_status"];
    $db->update("orders", ["confirm_payment"=>$confirm_payment_status],"order_id = $confirm_payment_id");
    $payment_id = $db->getResult();
    if (is_int($payment_id[0]) && $payment_id[0] > 0) {
        echo json_encode(["success"=>"confirm payment updated successfully"]);
        exit;
    } else {
        echo json_encode(["failure"=>"failed to update confirm payment"]);
        exit;
    }
}

// Order Delivery Status 
if (isset($_POST["delivery_id"])) {
    $ord_del_id = $_POST["delivery_id"];
    $ord_del_stat = $_POST["delivery_status"];
    $db->update("orders",["delivery_status"=>$ord_del_stat],"order_id = $ord_del_id");
    $payment_stat = $db->getResult();
    if (is_int($payment_stat[0]) && $payment_stat[0] > 0) {
        echo json_encode(["success"=>"successfully updated payment status"]);
        exit;
    } else {
        echo json_encode(["failure"=>"failed to update payment status"]);
        exit;
    }
}