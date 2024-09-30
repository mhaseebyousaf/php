
    <div class="w-100 bg-primary" id="footer">
        <div class="container py-5">
            <div class="row pb-3">
                <div class="col-md-3 footer-menu-1">
                    <h5 class="text-light">Super Market</h5>
                    <p class="text-light">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit, soluta?</p>
                </div>
                <div class="col-md-3 footer-menu-2">
                    <h5 class="text-light">Categories</h5>
                    <ul>
                        <?php 
                        $db->select("product_category", "*", null, null, "pro_cat_id DESC", null);
                        $footer_categories = $db->getResult();
                        if (!empty($footer_categories[0])) {
                            foreach ($footer_categories[0] as $key => $value) {
                            
                        ?>
                        <li><a href="category.php?cid=<?php echo $value["pro_cat_id"] ?>"><?php echo $value["pro_cat_title"] ?></a></li>
                        <?php 
                        }
                    } else {
                        ?>
                        <li>No Category in Footer</li>
                        <?php 
                    }
                        ?>
                    </ul>
                </div>
                <div class="col-md-3 footer-menu-3">
                    <h5 class="text-light">Sub Categories</h5>
                    <ul>
                        <?php
                        $db->select("product_sub_category", "sub_cat_id, sub_cat_name", null, "sub_cat_in_footer = 1", "sub_cat_id DESC", 4);
                        $sub_categories = $db->getResult();

                        if (!empty($sub_categories[0])) {
                            foreach ($sub_categories[0] as $sub_category) {
                        ?>
                        <li><a href="sub-category.php?scid=<?php echo $sub_category["sub_cat_id"] ?>"><?php echo $sub_category["sub_cat_name"] ?></a></li>
                        <?php
                            }
                        } else {
                        ?>
                        <li><a>No Sub Category To Show</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md-3 footer-menu-3">
                    <h5 class="text-light">Contact Us</h5>
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-phone"></i> : +923137316334</a></li>
                        <li><a href="#"><i class="fa-solid fa-building"></i> : p-253 Clarence Road</a></li>
                        <li><a href="#"><i class="fa-solid fa-envelope"></i> : mhaseeb2000@gmail.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-light text-center">
                        <i class="fa-regular fa-copyright"></i> haseebyousaf | All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <script src="admin/js/jquery.js"></script>
    <script src="javascript/site-user-actions.js"></script>
    <script src="owl.carousel.js"></script>
     <script>
        $(document).ready(function() {
 
 $("#popular-products").owlCarousel({
    loop: true,
            margin: 0,
            responsiveClass: true,
            navText : ["",""],
            responsive: {
                0: {
                    items: 4,
                    nav: true

                },
                600: {
                    items: 4,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                    margin: 10
                }
            }
 });


 $("#single-product-owl-demo").owlCarousel({
    loop: true,
            margin: 0,
            responsiveClass: true,
            navText : ["",""],
            responsive: {
                0: {
                    items: 4,
                    nav: true

                },
                600: {
                    items: 4,
                    nav: true
                },
                1000: {
                    items: 6,
                    nav: true,
                    loop: false,
                    margin: 10
                }
            }
 });


 $("#sub-category-items").owlCarousel({
    loop: true,
            margin: 0,
            responsiveClass: true,
            navText : ["",""],
            responsive: {
                0: {
                    items: 4,
                    nav: true

                },
                600: {
                    items: 4,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                    margin: 10
                }
            }
 });









 $("#latest-products").owlCarousel({
    loop: true,
            margin: 0,
            responsiveClass: true,
            navText : ["",""],
            responsive: {
                0: {
                    items: 4,
                    nav: true

                },
                600: {
                    items: 4,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                    margin: 10
                }
            }
 });

});


     </script>
     <script src="../../assets/vendor/aos/dist/aos.js"></script>
     <script>
  $(document).on('ready', function () {
    // initialization of aos
    AOS.init({
      duration: 2000,
      once: true
    });
  });
</script>

</body>
</html>