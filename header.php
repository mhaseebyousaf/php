<?php 
include "admin/php-files/Database.php";
$db = new Database();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bootstrap-4.4.1-dist/css/bootstrap.css">
    <!-- fontawsome cdn -->


    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">


     <link rel="stylesheet" href="admin/js/fontawesome-free-6.5.2-web/css/all.css">
    <!-- Bootstrap JavaScript and JQuery files -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="CSS/custom-css/user-section.css">
    <link rel="stylesheet" href="CSS/icons-styling.css">
    <link rel="stylesheet" href="../../assets/vendor/aos/dist/aos.css">
    
    <title>Document</title>
</head>
<body>
    <div id="user-header">
        
        <div id="header-top-container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="navbar navbar-expand-md navbar-light">
                            <button class="navbar-toggler" data-toggle="collapse" data-target="#header-top-section-collapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <?php
                                $db->select("options", "site_logo", null, null, null,null);
                                $site_header_logo = $db->getResult();
                                
                            ?>
                            <a href="index.php"><img src="uploads/logo/<?php echo $site_header_logo[0][0]["site_logo"] ?>" height="70px" alt="brand-logo"></a>
                            <div class="collapse navbar-collapse" id="header-top-section-collapse">
                                <form action="search.php" method="GET" class="form-inline  mx-sm-auto" id="user-header-search-form">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" id="user-header-search-prepend">
                                                <i class="fa-solid fa-magnifying-glass" id="header-categories-section-collapse"></i>
                                            </div>
                                            <input type="search" name="search" id="user-header-search-box">
                                            <div class="input-group-append ">
                                                <input type="submit" value="Search" class="btn btn-primary" id="user-header-search-text">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown mx-1">
                                        <a class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa-solid fa-user header-icon-size"></i></a>
                                        <div class="dropdown-menu">
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#login-modal">Login</a>
                                            <a href="register.php" class="dropdown-item">Register</a>
                                        </div>
                                    </li>
                                    <li class="nav-item mx-1" id="wishlist-outer-li">
                                        <a href="wishlist.php" class="nav-link" id="wishlist-btn">
                                            <i class="fa-solid fa-heart header-icon-size" id="wishlish"></i>
                                        </a>
                                        <?php 
                                        if (isset($_COOKIE["wishlist_total_product_ids"]) && $_COOKIE["wishlist_total_product_ids"] != "0") {
                                            $cookie_total_wishlist_pros = $_COOKIE["wishlist_total_product_ids"];
                                        ?>
                                        <span id="wishlist-counter"><?php echo $cookie_total_wishlist_pros ?></span>
                                        <?php 
                                        } else {}
                                        ?>
                                    </li>
                                    <li class="nav-item mx-1" id="cart-outer">
                                        <a href="cart.php" class="nav-link" >
                                            <i class="fa-solid fa-cart-shopping header-icon-size"></i>
                                        </a>
                                        <?php 
                                        if (isset($_COOKIE["cart_total_product_ids"])) {
                                            $cookie_total_cart_pros = $_COOKIE["cart_total_product_ids"];
                                        ?>
                                        <span id="cart"><?php echo $cookie_total_cart_pros ?></span>
                                        <?php 
                                        }
                                        ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
           
            <div class="container modal-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-title">
                                            <h3 class="text-center">Login</h3>
                                        </div>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="login-modal-form">
                                        <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <label for="login-user-name">User Name</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="form-group">
                                                                <input type="text" name="login-user-name" id="login-user-name" class="form-control" placeholder="username or email" aria-describedby="login-user-name-helpId">
                                                                <small id="login-user-name-helpId"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <label for="login-password" class="text-center">Password</label>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="form-group">
                                                                <input type="password" name="login-password" id="login-password" class="form-control" placeholder="Enter Your Password" aria-describedby="login-password-helpId">
                                                                <small id="login-password-helpId"></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            Don't have account? <a href="register.php" id="login-register-btn">Register</a>
                                                        </div>
                                                    </div>
                                            
                                                </div>
                                        
                                            </div>
                                        <div class="modal-footer">
                                            <div id="login-message"></div>
                                            <input type="submit" value="Login" class="btn btn-success">
                                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="header-categories-container" class="bg-primary">
            <div class="container">
                <div class="row">
                        <div class="col">
                            <div class="navbar navbar-expand-sm navbar-light bg-transparent">
                                
                                <div class="collapse navbar-collapse" id="header-categories-section-collapse">
                                    <ul class="navbar-nav mx-sm-auto">
                                        <?php
                                            $db->select("product_category", "*", null, null, null,null);
                                            $header_categories = $db->getResult();
                                            
                                            

                                            $check_sub_cat = "";
                                            $sub_cat_groups = array();
                                            foreach ($header_categories[0] as $value) {
                                                $cat_id = $value["pro_cat_id"];
                                                $db->select("product_sub_category", "sub_cat_id , sub_cat_name", null, "sub_cat_in_header = 1 AND sub_cat_parent_cat = $cat_id", "sub_cat_id DESC", null);
                                                $header_sub_categories = $db->getResult();
                                                if (!empty($header_sub_categories[0])) {

                                                    ?>
                                                    <li class="nav-item dropdown">
                                                        <a href="category.php?cid=<?php echo $value["pro_cat_id"] ?>" id="<?php echo $value["pro_cat_id"] ?>" class="dropdown-toggle text-white nav-link" data-toggle="dropdown"><?php echo $value["pro_cat_title"] ?></a>
                                                        <div class="dropdown-menu" data-target="_blank" aria-haspopup="true" aria-expanded="false" aria-labelledby="<?php echo $value["pro_cat_id"] ?>">
                                                    <?php 
                                                    foreach ($header_sub_categories[0] as $value1) {
                                                        
                                                    ?>
                                        
                                                    <a href="sub-category.php?scid=<?php echo $value1["sub_cat_id"] ?>" class="dropdown-item"><?php echo $value1["sub_cat_name"] ?></a>
                                                    <?php 
                                                    }
                                                    ?>
                                                        
                                                     </li>
                                                    <?php 
                                                } else {
                                                    ?>
                                                    
                                                <li class="nav-item mx-1"><a href="category.php?cid=<?php echo $value["pro_cat_id"] ?>" class="nav-link text-white"><?php echo $value["pro_cat_title"] ?></a></li>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        
                                    </ul>
                                <!-- </div>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    </div>
