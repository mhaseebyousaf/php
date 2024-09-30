<?php 
// Add product to Wishlist
if (isset($_POST["add_wishlist"])) {
    $pro_id = $_POST["pro_id"];
    // echo json_encode($pro_id);
    // exit;
    
    if (isset($_COOKIE["cart_product_ids"])) {
        $prev_pro_ids = json_decode($_COOKIE["cart_product_ids"]);
    } else {
        $prev_pro_ids = [];
    }
    if (is_object($prev_pro_ids)) {
        $prev_pro_ids = get_object_vars($prev_pro_ids);
    }
    if (!in_array($pro_id, $prev_pro_ids)) {
        array_push($prev_pro_ids, $pro_id);
    }
    $cookie_total_pros = count($prev_pro_ids);
    
    $cookie_pro_ids = json_encode($prev_pro_ids);
    // echo $cookie_pro_ids;
    setcookie("wishlist_product_ids", $cookie_pro_ids, time() + (36000), "/", "", false, true);
    setcookie("wishlist_total_product_ids", $cookie_total_pros, time() + (36000), "/", "", false, true);
    echo json_encode(["wishlist_total"=>$cookie_total_pros, "ids"=>$cookie_pro_ids]);
}



// Remove Product From Wishlist
if (isset($_POST["wishlist_remove_id"])) {
    $wishlist_remove_id = $_POST["wishlist_remove_id"];
    if (isset($_COOKIE["wishlist_product_ids"])) {

        $cookie_wishlist_remove_ids = $_COOKIE["wishlist_product_ids"];
        $wishlist_ids = json_decode($cookie_wishlist_remove_ids);
        setcookie("wishlist_product_ids", $_COOKIE["wishlist_product_ids"], time() - (36000), "/", "", false, true);
        setcookie("wishlist_total_product_ids", $_COOKIE["wishlist_total_product_ids"], time() - (36000), "/", "", false, true);
        if (is_object($wishlist_ids)) {
            $wishlist_ids = get_object_vars($wishlist_ids);
        }
        if (($key = array_search($wishlist_remove_id,$wishlist_ids)) !== false) {
            unset($wishlist_ids[$key]);
        }
        $cookie_add_wishlist_ids = json_encode($wishlist_ids);
        $cookie_add_wishlist_total_ids = count($wishlist_ids);
        
        setcookie("wishlist_product_ids", $cookie_add_wishlist_ids, time() + (36000), "/", "", false, true);
        setcookie("wishlist_total_product_ids", $cookie_add_wishlist_total_ids, time() + (36000), "/", "", false, true);
        
        echo json_encode(["success"=>"successfully removed from cookie"]);
        exit;
    }
}


// Add product to Cart
if (isset($_POST["add_cart"])) {
    $pro_id = $_POST["pro_id"];

    
    if (isset($_COOKIE["cart_product_ids"])) {
        $cart_pro_ids = json_decode($_COOKIE["cart_product_ids"]);
    } else {
        $cart_pro_ids = [];
    }
    if (!in_array($pro_id, $cart_pro_ids)) {
        array_push($cart_pro_ids, $pro_id);
    }
    $cookie_total_pros = count($cart_pro_ids);
    
    $cookie_pro_ids = json_encode($cart_pro_ids);
    
    setcookie("cart_product_ids", $cookie_pro_ids, time() + (36000), "/", "", false, true);
    setcookie("cart_total_product_ids", $cookie_total_pros, time() + (36000), "/", "", false, true);
    echo json_encode(["cart_total"=>$cookie_total_pros]);
    exit;

    
}




// Remove Product From Cart
if (isset($_POST["cart_remove_id"])) {
    $cart_remove_id = $_POST["cart_remove_id"];
    if (isset($_COOKIE["cart_product_ids"])) {

        $cookie_cart_remove_ids = $_COOKIE["cart_product_ids"];
        $cart_ids = json_decode($cookie_cart_remove_ids);
        setcookie("cart_product_ids", "", time() - (36000), "/", "", false, true);
        setcookie("cart_total_product_ids", "", time() - (36000), "/", "", false, true);
        if (is_object($cart_ids)) {
            $cart_ids = get_object_vars($cart_ids);
        }
        if (($key = array_search($cart_remove_id,$cart_ids)) !== false) {
            unset($cart_ids[$key]);
        }
        $cookie_add_cart_ids = json_encode($cart_ids);
        $cookie_add_cart_total_ids = count($cart_ids);
        
        setcookie("cart_product_ids", $cookie_add_cart_ids, time() + (36000), "/", "", false, true);
        setcookie("cart_total_product_ids", $cookie_add_cart_total_ids, time() + (36000), "/", "", false, true);
        
        echo json_encode(["success"=>"successfully removed from cookie"]);
        exit;
    }
}





// Proceed to cart
if (isset($_POST["proceed_to_cart"])) {
    if (isset($_COOKIE["cart_product_ids"])) {
        $cart_products = $_COOKIE["cart_product_ids"];
        $cart_products = json_decode($cart_products);
        if (is_object($cart_products)) {
            $cart_products = get_object_vars($cart_products);
        }
        setcookie("cart_product_ids", "", time() - (36000), "/", "", false, true);
        setcookie("cart_total_product_ids", "", time() - (36000), "/", "", false, true);
        if (isset($_COOKIE["wishlist_product_ids"])) {
            $wishlist_products = $_COOKIE["wishlist_product_ids"];
            $wishlist_products = json_decode($wishlist_products);
            if (is_object($wishlist_products)) {
                $wishlist_products = get_object_vars($wishlist_products);
            }
            setcookie("wishlist_product_ids", "", time() - (36000), "/", "", false, true);
            setcookie("wishlist_total_product_ids", "", time() - (36000), "/", "", false, true);
            
        } else {
            $wishlist_products = [];
        }
    } else {
        $cart_products = [];
    }

    $cart_products = $wishlist_products + $cart_products;
    $cart = array_unique($cart_products);
    $cart_total = count($cart);
    $cart = json_encode($cart);
    setcookie("cart_product_ids", $cart, time() + (36000), "/", "", false, true);
    setcookie("cart_total_product_ids", $cart_total, time() + (36000), "/", "", false, true);
    exit;
}

?>