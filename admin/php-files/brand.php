<?php
include "Database.php";
$db = new Database();

// Update Brand
if (isset($_POST["up_brand_id"])) {
    $brand_id = $_POST["up_brand_id"];
    $brand_name = $_POST["up_brand"];
    $brand_cat = $_POST["up_brand_cat"];
    $values = ["brand_cat"=>$brand_cat];
    if ($brand_name != "") {
        $values["brand_name"] = $brand_name;
    }
    $db->update("brand",$values, "brand_id = $brand_id");
    $row =  $db->getResult();
    if (!empty($row)) {
        echo json_encode(["success"=>"brand updated successfully"]);
    }
}

// Delete Brand
if (isset($_POST["brand_del_id"])) {
    $del_id = $_POST["brand_del_id"];
    $db->delete("brand","brand_id = $del_id");
    $row = $db->getResult();
    if ($row[0] > 0) {
        echo json_encode(["success"=>"Brand Deleted Scuccessfully"]);
    }
}

// Add Brand
if (isset($_POST["add_brand_name"])) {
    $brand_name = $_POST["add_brand_name"];
    $brand_cat = $_POST["add_brand_cat"];
    $db->insert("brand",["brand_name"=>$brand_name, "brand_cat"=>$brand_cat]);
    $row = $db->getResult();
    if (!empty($row)) {
        echo json_encode(["success"=>"brand added successfully"]);
    }
}