<?php
include "Database.php";
$db = new Database();

// Add Category
if (isset($_POST["add-new-cat-signal"])) {
    $category_val = $_POST["add-new-category-name"];
    $db->insert("product_category",["pro_cat_title"=>$category_val]);
    $res = $db->getResult();
    if (is_int($res[0])) {
        echo json_encode(["success"=>"category inserted successfully"]);
        exit;
    }
}


// Update Category Code
if (isset($_POST["update_cat_id"])) {
    $up_id = $_POST["update_cat_id"];
    $up_name = $_POST["update_cat_name"];
    $db->update("product_category", ["pro_cat_title"=>$up_name], "pro_cat_id = $up_id");
    $row = $db->getResult();
    $row1 = $row[0];
    if ($row1 > 0) {
        echo json_encode(array("success"=>"Updated Successfully"));
        exit;
    } else {
        echo json_encode(array("failed"=>"Updated failfully"));
        exit;
    }
}



// Delete Category Code 
if (isset($_POST["del_cat_id"])) {
    $del_id = $_POST["del_cat_id"];
    $db->delete("product_category","pro_cat_id = {$del_id}");
    $result = $db->getResult();
    if ($result[0] > 0) {
        echo json_encode(array("success"=>"category deleted successfully!"));
        exit;
    }
}