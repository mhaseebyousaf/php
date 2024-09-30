<?php 
include "php-files/Database.php";
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap-4.4.1-dist/css/bootstrap-grid.min.css">

    
    <link rel="stylesheet" href="../CSS/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="js/fontawesome-free-6.5.2-web/css/all.min.css">

    
    <!-- <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->


    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="CSS/admin-style.css">
<?php 
$db->select("options","site_name, site_logo",null,null,null,null);
$site_name = $db->getResult();

$title = "";
switch (basename($_SERVER["PHP_SELF"])) {
    case 'add-admin.php':
        $title = "Add Admin";
        break;
    case 'add-brand.php':
        $title = "Add Brand";
        break;
    case 'add-new-category.php':
        $title = "Add Category";
        break;
    case 'add-new-subcategory.php':
        $title = "Add Sub Category";
        break;
    case 'add-product.php':
        $title = "Add Product";
        break;
    case 'admin-products.php':
        $title = "Products";
        break;
    case 'brands.php':
        $title = "Brands";
        break;
    case 'categories.php':
        $title = "Categories";
        break;
    case 'change-password.php':
        $title = "Change Password";
        break;
    case 'dashboard.php':
        $title = "Dashboard";
        break;
    case 'edit-product.php':
        $title = "Edit Product";
        break;
    case 'options.php':
        $title = "Options";
        break;
    case 'orders.php':
        $title = "Orders";
        break;
    case 'sub-category.php':
        $title = "Sub Category";
        break;
    case 'update-brand.php':
        $title = "Update Brand";
        break;
    case 'update-category.php':
        $title = "Update Category";
        break;
    case 'update-sub-category.php':
        $title = "Update Sub Category";
        break;
    case 'users.php':
        $title = "Users";
        break;
    case 'brand-categories.php':
        $title = "Brand Categories";
        break;
    case 'add-new-brand-category.php':
        $title = "Add Brand Category";
        break;
    case 'update-brand-category.php':
        $title = "Update Brand Category";
        break;
    default:
        $title = $site_name[0][0]["site_name"];
        break;
}
?>
    <title><?php echo $title ?></title>
</head>
<body>        
        <div id="admin-header-top-container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="navbar navbar-expand-md navbar-light">
                            <button class="navbar-toggler" data-toggle="collapse" data-target="#header-top-section-collapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <?php 
                            $db->select("options","site_logo", null, null, null, null);
                            $logo = $db->getResult();
                            if (!empty($logo[0])) {
                            ?>
                            <a href="#"><img src="../uploads/logo/<?php echo $logo[0][0]["site_logo"] ?>" height="70px" alt="brand-logo"></a>
                            <?php 
                            } else {
                            ?>
                            <a href="#"><img src="../uploads/images/image-holder.png" height="70px" alt="brand-logo"></a>
                            <?php
                            }
                            ?>
                            <div class="collapse navbar-collapse" id="header-top-section-collapse">
                                
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown mx-1">
                                        <a class="dropdown-toggle nav-link admin-header-admin-btn btn btn-primary text-light" data-toggle="dropdown" data-target="#admin-header-dropdown">Admin</a>
                                        <div class="dropdown-menu" id="admin-header-dropdown">
                                            <a href="change-password.php" class="dropdown-item">Change Password</a>
                                            <a href="add-admin.php" class="dropdown-item">Add Admin</a>
                                            <a href="php-files/logout.php" class="dropdown-item">Logout</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
    </div>
