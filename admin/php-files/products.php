<?php
include "Database.php";
$db = new Database();


// Section to add product in database
if (isset($_POST["add_product_form_data"])) {
    // print_r($_FILES["add-product-featured-image"]);

    

    
    $add_product_name = $_POST["add-product-product-title"];
    $add_product_category = $_POST["add-product-product-category"];
    $add_product_sub_category = $_POST["add-product-product-sub-category"];
    $add_product_brand = $_POST["add-product-product-brand"];
    $add_product_description = $_POST["add-admin-product-description"];
    // $add_product_featured_image = $_FILES["add-product-featured-image"]['name'];
    // $add_procuct_image_tmp_name = $_FILES["add-product-featured-image"]['tmp_name'];
    $add_product_price = $_POST["add-product-product-price"];
    $add_product_available_quantity = $_POST["add-product-quantity"];
    $add_procuct_status = $_POST["add-product-status"];
    if ($add_product_sub_category == "" || $add_product_sub_category == null) {
        $add_product_sub_category = 0;
    }
    $params = [
        "product_code"=>uniqid(),
        "product_cat"=>$add_product_category,
        "product_brand"=>$add_product_brand,
        "product_title"=>$add_product_name,
        "product_price"=>$add_product_price,
        "product_description"=>$add_product_description,
        // "product_featured_image"=>$add_product_featured_image,
        "product_quantity"=>$add_product_available_quantity,
        "product_status"=>$add_procuct_status,
        "product_sub_cat"=> $add_product_sub_category
    ];

    



    $types = ["jpg","png","jpeg"];
    $errors = [];

    foreach ($_FILES["add-product-featured-image"]["tmp_name"] as $key => $value) {
        $file_name = $_FILES["add-product-featured-image"]["name"][$key];
        $file_tmp_name = $value;
        
        $file_ext = explode(".",$file_name);
        if (!in_array(end($file_ext), $types)) {
            $errors[] = "file not supported";
        } else {
            $file_name = $file_ext[0] . time() . "." . end($file_ext);
            // die($file_name);
            move_uploaded_file($file_tmp_name, "../../uploads/images/$file_name");
        }
        switch ($key) {
            case 0:
                $params["product_featured_image"] = $file_name;
                break;
            case 1:
                $params["side_img_one"] = $file_name;
                break;
            case 2:
                $params["side_img_two"] = $file_name;
            case 3:
                $params["side_img_three"] = $file_name;
                break;
        }
    }
    // print_r($params);
    if (empty($errors)) {
        $db->insert("products", $params);
        $insert_id = $db->getResult();
        if (!empty($insert_id) && is_int($insert_id[0])) {
            $db->update("product_sub_category",["sub_cat_product"=>"sub_cat_product + 1"],"sub_cat_id = $add_product_sub_category");
            $update_row = $db->getResult();
            $db->select("product_sub_category","sub_cat_product",null,"sub_cat_id = $add_product_sub_category",null, null);
            $val = $db->getResult()[0][0]["sub_cat_product"];
            $db->update("product_sub_category",["sub_cat_product"=>$val+1],"sub_cat_id = $add_product_sub_category");
            $updated_sub_cat_pro = $db->getResult();
            echo json_encode(["success"=>"successfully inserted"]);
            exit;
        } else {
            echo json_encode(["failure"=>"not inserted"]);
            exit;
        }
    } else {
        echo json_encode(["file_type_error"=>"type not supported"]);
        exit;
    }


    // if (isset($_FILES["file1"])) {
    //     $img1_name = $_FILES["file1"]["name"];
    //     $img1_tmp_name = $_FILES["file1"]["tmp_name"];
    //     $params["side_img_one"] = $img1_name;
    //     move_uploaded_file($img1_tmp_name, "../../uploads/images/$img1_name");
    // }
    // if (isset($_FILES["file2"])) {
    //     $img2_name = $_FILES["file2"]["name"];
    //     $img2_tmp_name = $_FILES["file2"]["tmp_name"];
    //     $params["side_img_two"] = $img2_name;
    //     move_uploaded_file($img2_tmp_name, "../../uploads/images/$img2_name");
    // }
    // if (isset($_FILES["file3"])) {
    //     $img3_name = $_FILES["file3"]["name"];
    //     $img3_tmp_name = $_FILES["file3"]["tmp_name"];
    //     $params["side_img_three"] = $img3_name;
    //     move_uploaded_file($img3_tmp_name, "../../uploads/images/$img3_name");
    // }





    
    



    
    



    // if (!empty($insert_id) && is_int($insert_id[0]) && $updated_sub_cat_pro[0] > 0) {
    //     echo json_encode(["success"=>"successfully inserted product"]);
    //     move_uploaded_file($add_procuct_image_tmp_name, "../../uploads/images/".$add_product_featured_image);
    //     exit;
    // } else {
    //     echo json_encode(["failure"=>"failed to upload product"]);
    //     exit;
    // };
    
}


// Add Product sub-category show
if (isset($_POST["prod_cat"])) {
    $procuct_cat_id = $_POST["prod_cat"];
    $db->select("product_sub_category","*",null, "sub_cat_parent_cat = $procuct_cat_id", "sub_cat_id DESC", null);
    $row = $db->getResult();
    if (!empty($row[0])) {
        echo json_encode($row[0]);
        exit;
    } else {
        echo json_encode(["no_sub_cats"=>"No sub Category found"]);
        exit;
    }
}



// Delete Product
if (isset($_POST["product_delete_id"])) {
    $product_del_id = $_POST["product_delete_id"];
    $product_del_cat_id = $_POST["product_delete_cat_id"];
    $db->delete("products","product_id = {$_POST["product_delete_id"]}");
    $row = $db->getResult();

    $db->sql("UPDATE product_sub_category SET sub_cat_product = sub_cat_product - 1 WHERE sub_cat_id = $product_del_cat_id");
    $deleted_sub_cat_pro = $db->getResult();
    if (!empty($row) && is_int($row[0])) {
        echo json_encode(["success"=>"deleted successfully"]);
        exit;
    } else {
        echo json_encode(["failure"=>"delete failed"]);
        exit;
    }
}

// Edit Product code
if (isset($_POST["edit_pro_id"])) {
    $edit_product_id = $_POST["edit-product-id"];
    $edit_product_title = $_POST["edit-product-product-title"];
    $edit_product_category = $_POST["edit-product-product-category"];
    $edit_product_sub_category = $_POST["edit-product-product-sub-category"];
    $edit_product_brand = $_POST["edit-product-product-brand"];
    $edit_product_description = $_POST["edit-admin-product-description"];
    $edit_product_img_name = $_FILES["edit-product-featured-image"]["name"];
    $edit_product_img_tmp_name = $_FILES["edit-product-featured-image"]["tmp_name"];
    $edit_product_price = $_POST["edit-product-product-price"];
    $edit_product_quantity = $_POST["edit-product-quantity"];
    $edit_product_status = $_POST["edit-product-status"];
    $edit_product_old_img_name = $_POST["edit-product-featured-old-image"];

    
    
    
    



    $update_product_arr = array();
    if ($edit_product_title != "") {
        $update_product_arr["product_title"] = $edit_product_title;
    }
    if ($edit_product_category != "") {
        $update_product_arr["product_cat"] = $edit_product_category;
    }
    if ($edit_product_sub_category != "") {
        $update_product_arr["product_sub_cat "] = $edit_product_sub_category;
    }
    if ($edit_product_brand != "") {
        $update_product_arr["product_brand"] = $edit_product_brand;
    }
    if ($edit_product_description != "") {
        $update_product_arr["product_description"] = $edit_product_description;
    }
    if ($edit_product_price != "") {
        $update_product_arr["product_price"] = $edit_product_price;
    }
    if ($edit_product_quantity != "") {
        $update_product_arr["product_quantity "] = $edit_product_quantity;
    }
    if ($edit_product_status != "") {
        $update_product_arr["product_status"] = $edit_product_status;
    }
    if ($edit_product_img_name == "") {
        $update_product_arr["product_featured_image"] = $edit_product_old_img_name;
    } elseif($edit_product_img_name != "") {
        $update_product_arr["product_featured_image"] = $edit_product_img_name;
        if (file_exists("../../uploads/images/$edit_product_old_img_name")) {
            unlink("../../uploads/images/$edit_product_old_img_name");
        }
    };


    if (isset($_FILES["file1"]["name"])) {
        $edit_product_img1_name = $_FILES["file1"]["name"];
        $edit_product_img1_tmp_name = $_FILES["file1"]["tmp_name"];
        $edit_product_img1_old = $_POST["edit-product-img1-old-image"];
        move_uploaded_file($edit_product_img1_tmp_name, "../../uploads/images/$edit_product_img1_name");
        $update_product_arr["side_img_one"] = $edit_product_img1_name;
        unlink("../../uploads/images/$edit_product_img1_old");

    }

    if (isset($_FILES["file2"]["name"])) {
        $edit_product_img2_name = $_FILES["file2"]["name"];
        $edit_product_img2_tmp_name = $_FILES["file2"]["tmp_name"];
        move_uploaded_file($edit_product_img2_tmp_name, "../../uploads/images/$edit_product_img2_name");
        $edit_product_img2_old = $_POST["edit-product-img2-old-image"];

        $update_product_arr["side_img_two"] = $edit_product_img2_name;
        unlink("../../uploads/images/$edit_product_img2_old");

    }
    if (isset($_FILES["file3"]["name"])) {
        $edit_product_img3_name = $_FILES["file3"]["name"];
        $edit_product_img3_tmp_name = $_FILES["file3"]["tmp_name"];
        move_uploaded_file($edit_product_img3_tmp_name, "../../uploads/images/$edit_product_img3_name");
        $edit_product_img3_old = $_POST["edit-product-img3-old-image"];

        $update_product_arr["side_img_three"] = $edit_product_img3_name;
        unlink("../../uploads/images/$edit_product_img3_old");

    }

    
    $db->update("products",$update_product_arr, "product_id = $edit_product_id");
    $edit_product_res = $db->getResult();
    if ($edit_product_res[0] > 0) {
        
        move_uploaded_file($edit_product_img_tmp_name, "../../uploads/images/$edit_product_img_name");
        echo json_encode(["success"=>"updated product successfully"]);
        exit;
    }

}

// Edit Product sub-category show
if (isset($_POST["edit_prod_cat"])) {
    $edit_procuct_cat_id = $_POST["edit_prod_cat"];
    $db->select("product_sub_category","*",null, "sub_cat_parent_cat = $edit_procuct_cat_id", "sub_cat_id DESC", null);
    $row = $db->getResult();
    if (!empty($row[0])) {
        echo json_encode($row[0]);
        exit;
    } else {
        echo json_encode(["no_sub_cats"=>"No sub Category found"]);
        exit;
    }
}