<?php
include("admin/php-files/Database.php");
$db = new Database();
// if ($db->insert("admin",array("first_name"=>"shoukat","last_name"=>"ansari","user_name"=>"shoukat","admin_email"=>"shoukat@gmail.com","admin_password"=>md5("shoukat"),"admin_ph_no"=>"03137316334","admin_city"=>"Faisalabad"))) {
//     echo 'admin inserter';
//     $res = $db->getResult();
//     echo "<pre>";
//     print_r($res);
//     echo "</pre>";
    
//     echo $res[0];
//     if (is_int($res[0])) {
//         "This is a number";
//     } else {
//         "this is not a number";
//     }
// }
// if ($db->getResult()) {
//     echo "successfully inserted";
// }

// echo uniqid("haseeb");

// $db->select("product_sub_category","sub_cat_product",null,"sub_cat_id = 6",null, null);
// echo "<pre>";
// $val = $db->getResult()[0][0]["sub_cat_product"];
// print_r($val);
// var_dump($val);
// echo "value : " . $val;
// $db->update("product_sub_category",["sub_cat_product"=>$val+1],"sub_cat_id = 6");
// print_r($db->getResult());

// $db->update("product_category",array("pro_cat_title"=>"Tables"),"pro_cat_id=17");
// $row = $db->getResult();
// echo "<pre>";
// print_r($row);
// echo "</pre>";
// echo gettype($row[0]);


// $db->select("admin","*",null,null,null,3);
// $pas = md5("sami");


// $db->select("admin","admin_password",null,"admin_email='sami@gmail.com' AND admin_password='$pas'",null,null);

// echo "<pre>";
// print_r($res = $db->getResult());
// echo "</pre>";

// if (key_exists("first_name",$res[0][0])) {
//     echo $res[0][0]["first_name"];
// } else {
//     echo "key does not exist";
// }

// $res = $db->getResult();
// printf($res[0][1]["first_name"]);


// $db->pagination("admin",null,null,3);
// $sami = md5("sami");
// $db->update("admin",array("admin_password"=>md5("sami2")),"admin_id=2");
// $resul = $db->getResult();
// echo "<pre>";
// print_r($resul);
// echo "</pre>";


// $db = new Database();
// $db->select("product_category","COUNT(*) AS total_categories",null,null,null,null);
// $row = $db->getResult();
// echo "<pre>";
// print_r($row);
// echo "</pre>";

// $db = new Database();
// $db->select("product_sub_category","COUNT(*) AS total_sub_categories",null,null,null,null);
// $row = $db->getResult();
// echo $row[0]["total_sub_categories"];
// echo "<pre>";
// print_r($row);
// echo "</pre>";
// 


// $db->select("admin","admin_password",null,"admin_email='sami@gmail.com' AND admin_password='4f8de24d6093ac5d25c7cfafc474d49f'",null,null);
//     $res = $db->getResult();
//     echo "<pre>";
// print_r($res);
// echo "</pre>";
// session_start();
// $email = $_SESSION['admin_email'];
// echo "session email" . $email;





// $db->select("products", "products.product_title, product_category.pro_cat_title, brand.brand_name, products.product_price, products.product_quantity, products.product_featured_image, products.product_status, products.product_id, product_sub_category.sub_cat_id", "INNER JOIN product_category ON products.product_cat = product_category.pro_cat_id INNER JOIN brand ON products.product_brand = brand.brand_id INNER JOIN product_sub_category ON products.product_sub_cat = product_sub_category.sub_cat_id", null, "product_id DESC", 10);
// $row = $db->getResult();
// echo "<pre>";
// print_r($row);


// $db->sql("UPDATE product_sub_category SET sub_cat_product = sub_cat_product - 1 WHERE sub_cat_id = 4");
//     $deleted_sub_cat_pro = $db->getResult();
//     echo "<pre>";
//     print_r($deleted_sub_cat_pro);

// echo "<pre>";
// json_encode($_POST);
// if (isset($_POST["edit_pro_id"])) {
//     echo "yes it is coming ";
// }



$limit = 2;
$db->select("orders",
"orders.order_id, products.product_code, orders.order_product_quantity, orders.total_amount, users.user_userName, users.user_address, orders.order_date, orders.confirm_payment, orders.delivery_status",
"INNER JOIN products ON orders.product_id = products.product_id INNER JOIN users ON orders.user_id = users.user_id",
null,
"order_id DESC",
$limit);
$row = $db->getResult();
echo "<pre>";
print_r($row[0]);