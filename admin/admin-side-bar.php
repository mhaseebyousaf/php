<div class="col-md-2 col-sm-3 mt-4">
    <div class="list-group">
        <a href="dashboard.php" <?php if(basename($_SERVER["PHP_SELF"])=="dashboard.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">DASHBOARD</a>
        <a href="admin-products.php" <?php if(basename($_SERVER["PHP_SELF"])=="admin-products.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">PRODUCTS</a>
        <a href="categories.php" <?php if(basename($_SERVER["PHP_SELF"])=="categories.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">CATEGORIES</a>
        <a href="sub-category.php" <?php if(basename($_SERVER["PHP_SELF"])=="sub-category.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">SUB-CATEGORIES</a>
        <a href="brands.php" <?php if(basename($_SERVER["PHP_SELF"])=="brands.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">BRANDS</a>
        <a href="brand-categories.php" <?php if(basename($_SERVER["PHP_SELF"])=="brand-categories.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">BRAND CATEGORIES</a>
        <a href="orders.php" <?php if(basename($_SERVER["PHP_SELF"])=="orders.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">ORDERS</a>
        <a href="users.php" <?php if(basename($_SERVER["PHP_SELF"])=="users.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">USERS</a>
        <a href="options.php" <?php if(basename($_SERVER["PHP_SELF"])=="options.php"){echo "id='active'";} ?> class="list-group-item list-group-item-action list-group-item-primary side-bar-option">OPTIONS</a>
        
    </div>
</div>