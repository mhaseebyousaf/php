$(document).ready(function(){



   // Add product in wishlist

    $(".product-favourite-btn").click(function (event) { 
        event.preventDefault();
        var wishlist_pro_id = $(this).attr("data-product-wishlist");
        console.log(wishlist_pro_id);
        $.ajax({
         type: "POST",
         url: "actions.php",
         data: {pro_id : wishlist_pro_id, add_wishlist : "add to cart"},
         success: function (response) {
            console.log(response);
            var res = JSON.parse(response);
            if (res.hasOwnProperty("wishlist_total")) {
               $("#wishlist-counter").remove();
            $("#wishlist-outer-li").append(`<span id="wishlist-counter">${res.wishlist_total}</span>`)
            // window.location.reload();
            }
            
            

         }
        });
     });




   //   Remove from Wishlist
   $(".wishlist-cancel-btn").click(function () { 
      var wishlist_remove_id = $(this).attr("data-wishlist-remove-id");
      var wishlist_row = (this);
      $.ajax({
         type: "POST",
         url: "actions.php",
         data: {wishlist_remove_id : wishlist_remove_id},
         success: function (response) {
            console.log(response);
            var res = JSON.parse(response);
            if (res.hasOwnProperty("success")) {
               wishlist_row.closest(".list-group-item").remove();
               window.location.reload();
            }
            
         }
      });
    });



     // Add product in Cart

    $(".product-cart-btn").click(function (event) { 
      event.preventDefault();
      var cart_pro_id = $(this).attr("data-product-cart");
      $.ajax({
       type: "POST",
       url: "actions.php",
       data: {pro_id : cart_pro_id, add_cart : "add to cart"},
       success: function (response) {
          console.log(response);
          var res = JSON.parse(response);
          $("#cart").remove();
          $("#cart-outer").append(`<span id="cart">${res.cart_total}</span>`)
       }
      });
   });



   //   Remove from Cart
   $(".cart-remove-product-btn").click(function () { 
      var cart_remove_id = $(this).attr("data-cart-delete-id");
      var cart_row = (this);
      $.ajax({
         type: "POST",
         url: "actions.php",
         data: {cart_remove_id : cart_remove_id},
         success: function (response) {
            console.log(response);
            var res = JSON.parse(response);
            if (res.hasOwnProperty("success")) {
               cart_row.closest(".cart-products-row").remove();
               window.location.reload();
            }
            
         }
      });
    });


    // Net Amount
   function netAmount() {
      var total = 0;
      $(".cart-products-row").each(function () { 
         var quantity = parseInt($(this).children("td").children(".cart-product-quantity").val());
         var price = parseInt($(this).children("td").children(".cart-single-product-price").val());
         var subtotal = quantity * price;
         $(this).children("td").children(".cart-sub-total").text(subtotal);
         total = total + (quantity * price);
         $("#cart-total-price").val(total);
       });
       
   }
   netAmount();


   //  Calculate subtotal in cart products
   $(".cart-product-quantity").change(function (e) { 
      e.preventDefault();
      netAmount();
   });





   // Proceed To Cart
   $("#proceed-to-cart-btn").click(function (e) { 
      $.ajax({
         type: "POST",
         url: "actions.php",
         data: {proceed_to_cart : 1},
         success: function (response) {
            console.log(response);
            window.location.href = "cart.php";
         }
      });
    });

   



   //  Register user
   $("#register-user-form").submit(function (e) { 
      e.preventDefault();
      var rce_flag = true;
      if ($("#register-first-name").val() == "") {
         $("#register-first-name-helpId").addClass("text-danger").text("* First Name Required");
         rce_flag = false;
      }
      if ($("#register-last-name").val() == "") {
         $("#register-last-name-helpId").addClass("text-danger").text("* Last Name Required");
         rce_flag = false;
      }
      if ($("#register-user-name").val() == "") {
         $("#register-user-name-helpId").addClass("text-danger").text("* User Name Required");
         rce_flag = false;
      }
      if ($("#register-email").val() == "") {
         $("#register-email-helpId").addClass("text-danger").text("* Email Required");
         rce_flag = false;
      }
      if ($("#register-password").val() == "") {
         $("#register-password-helpId").addClass("text-danger").text("* Password Required");
         rce_flag = false;
      }
      if ($("#register-mobile-number").val() == "") {
         $("#register-mobile-number-helpId").addClass("text-danger").text("* Phone No Required");
         rce_flag = false;
      }
      if ($("#register-address").val() == "") {
         $("#register-address-helpId").addClass("text-danger").text("* Address Required");
         rce_flag = false;
      }
      if ($("#register-city").val() == "") {
         $("#register-city-helpId").addClass("text-danger").text("* City Required");
         rce_flag = false;
      }
      if (rce_flag == true) {
         var formData = new FormData(this);
         formData.append("user-register", "1");
         $.ajax({
            type: "POST",
            url: "php-files/user.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
               console.log(response);
               var res = JSON.parse(response);
               if (res.hasOwnProperty("success")) {
                  $("#register-message").html("<div class='alert alert-success'>Registered Successsfully</div>");
                  setTimeout(() => {
                     $("#register-message").html("");
                  }, 1500);
               } else {
                  $("#register-message").html("<div class='alert alert-danger'>Registered Un-successsfully</div>");
                  setTimeout(() => {
                     $("#register-message").html("");
                  }, 1500);
               }
            }
         });
      }
    });





   //  User Login
   $("#login-modal-form").submit(function (e) { 
      e.preventDefault();
      var ulc_flag = true;
      if ($("#login-user-name").val() == "") {
         $("#login-user-name-helpId").addClass("text-danger").text("* email or username Required");
         ulc_flag = false;
      }
      if ($("#login-password").val() == "") {
         $("#login-password-helpId").addClass("text-danger").text("* Password Required");
         ulc_flag = false;
      }
      if (ulc_flag == true) {
         var formData = new FormData(this);
         formData.append("user-login", "1");
         $.ajax({
            type: "POST",
            url: "php-files/user.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
               console.log(response);
               var res = JSON.parse(response);
               if (res.hasOwnProperty("success")) {
                  $("#login-message").html("<div class='alert alert-success'>Login Successfully</div>");
                  setTimeout(() => {
                     window.location.reload();
                  }, 1500);
               } else {
                  $("#login-message").html("<div class='alert alert-failure'>User Don't Exist!</div>");
               }
            }
         });
      }
    });



});