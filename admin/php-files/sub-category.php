<?php
// Delete Sub Category
include "Database.php";
$db = new Database();
if (isset($_POST["sub_cat_del_id"])) {
    $del_id = $_POST["sub_cat_del_id"];
    $db->delete("product_sub_category","sub_cat_id = $del_id");
    $row = $db->getResult();
    $affected_row = $row[0];
    if ($affected_row > 0) {
        echo json_encode(["success"=>"Deleted Successfully"]);
    }
}

// Add New Sub Category
if (isset($_POST["sub_cat"])) {
    $sub_category = $_POST["sub_cat"];
    $parent_category = $_POST["parent_cat"];
    $show_header = $_POST["in_header"];
    $show_footer = $_POST["in_footer"];
    $db->insert("product_sub_category",["sub_cat_name"=>$sub_category,"sub_cat_parent_cat"=>$parent_category,"sub_cat_in_header"=>$show_header,"sub_cat_in_footer"=>$show_footer]);
    $row = $db->getResult();
    if (!empty($row)) {
        echo json_encode(["success"=>"data inserted successfully"]);
    }
}

// Update Sub Category
if (isset($_POST["update_sub_cat_id"])) {
    $sub_cat_id = $_POST["update_sub_cat_id"];
    $sub_cat_name = $_POST["update_sub_cat_name"];
    $parent_cat_id = $_POST["update_parent_cat_id"];
    $show_in_header = $_POST["update_sub_cat_show_head"];
    $show_in_footer = $_POST["update_sub_cat_show_foot"];
    $values = array();




    $db->update("product_sub_category",["sub_cat_name" => $sub_cat_name, "sub_cat_parent_cat" => $parent_cat_id, "sub_cat_in_header" => $show_in_header, "sub_cat_in_footer" => $show_in_footer],"sub_cat_id = $sub_cat_id");
    unset($values);
    $row = $db->getResult();
    if (!empty($row)) {
        echo json_encode(["success"=>"updated subcategory successfully"]);
        exit;
    } else {
        echo json_encode(["noUpdate"=>"No row updated"]);
        exit;
    }
}