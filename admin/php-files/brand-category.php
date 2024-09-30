<?php 
include "Database.php";
$db = new Database();


// Add Brand Category
if (isset($_POST["add-new-brand-category-name"])) {
    $category_val = $_POST["add-new-brand-category-name"];
    $db->insert("brand_category",["brand_cat_name"=>$category_val]);
    $res = $db->getResult();
    if (is_int($res[0])) {
        echo json_encode(["success"=>"category inserted successfully"]);
        exit;
    }
}




// Delete Brand Category Code 
if (isset($_POST["del_cat_id"])) {
    $del_id = $_POST["del_cat_id"];
    $db->delete("brand_category","brand_cat_id = {$del_id}");
    $result = $db->getResult();
    if ($result[0] > 0 && is_int($result[0])) {
        echo json_encode(array("success"=>"brand category deleted successfully!"));
        exit;
    } else {
        echo json_encode(["array"=>"deleted unsuccessfull"]);
    }
}



// Update Brand Category Code
if (isset($_POST["brand_update_cat_id"])) {
    $up_id = $_POST["brand_update_cat_id"];
    $up_name = $_POST["brand_update_cat_name"];
    $db->update("brand_category", ["brand_cat_name"=>$up_name], "brand_cat_id = $up_id");
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
?>