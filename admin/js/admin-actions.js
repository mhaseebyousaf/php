$(document).ready(function(){
    var origin = window.location.origin;
    var path = window.location.pathname.split("/");

    var url = origin + "/" + path[1] + "/" + path[2];
console.log(url + "/php-files/add_admin.php");
console.log(url + "/php-files/add_admin.php");



// Sidebar options

// $(".side-bar-option").click(function (e) { 
//     e.preventDefault();
//     $(".side-bar-option").removeClass("active");
//     $(this).addClass("active");

// });

//==============\
// Check Login== >
//==============/

$("#admin-login-form").submit(function(e){
    e.preventDefault();
    admin_login_userName = $("#admin-login-username").val();
    admin_login_password = $("#admin-login-password").val();
    if (admin_login_password == "" || admin_login_userName == "") {
        $("#admin-login-message").append("<div class='alert alert-danger'>Both fields are required!</div>");
    } else {
        $.ajax({
            type: "POST",
            url: url + "/php-files/check-login.php",
            data: {login:"1",username: admin_login_userName, password:admin_login_password},
            success: function (response) {
                console.log("raw response : ",response);
                var response = JSON.parse(response);
                if (response.hasOwnProperty("success")) {
                    $("#admin-login-message").html("").append("<div class='alert alert-success'>Login Successfully!</div>");
                    setTimeout(() => {
                        window.location = url + "/dashboard.php";
                    }, 500);
                } else if (response.hasOwnProperty("user_not_exist")) {
                    $("#admin-login-message").html("").append("<div class='alert alert-success'>User does't exist!</div>");
                } else if (response.hasOwnProperty("failure")) {
                    $("#admin-login-message").html("").append("<div class='alert alert-success'>Please Enter Both Fields</div>");
                } else {
                    $("#admin-login-message").html("").append("<div class='alert alert-success'>some other response is coming</div>");
                }
            }
        });
    }
});


//=================\
// Change Password== >
//=================/
    $("#change-password-form").submit(function(e){
        e.preventDefault();
        var old_pass = $("#change-password-old-password").val();
        var new_pass = $("#change-password-new-password").val();
        if (old_pass=="") {
            $("#change-password-old-password-helpId").addClass("text-danger").css({"border":"1px solid red","padding":"5px","margin-top":"3px","width":"fit-content","font-size":"10px"}).slideDown("slow").text("Old Password Required*");
        }
        if (new_pass=="") {
            $("#change-password-new-password-helpId").addClass("text-danger").css({"border":"1px solid red","padding":"5px","margin-top":"3px","width":"fit-content","font-size":"10px"}).slideDown("slow").text("New Password Required*");
        }
        if (old_pass!="" && new_pass!="") {
            var formData = new FormData(this);
            formData.append("changePass","1");
            $.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                url: url + "/php-files/check-login.php",
                data: formData,
                success: function (respo) {
                    $("#change-password-message").html("").hide();
                    console.log(respo);
                    var res = JSON.parse(respo);
                    console.log(res);
                    if (res.hasOwnProperty("success")) {
                        $("#change-password-message").addClass("alert").addClass("alert-success").slideDown("slow").text("Successfully Updated Password!");
                    } else if (res.hasOwnProperty("failure")) {
                        $("#change-password-message").addClass("bg-failure").css({"border":"1px solid red","color":"red","padding":"5px","margin-top":"3px","width":"fit-content"}).slideDown("slow").text("Cann't Update Password!");
                    } else if (res.hasOwnProperty("pass_not_match")) {
                        $("#change-password-message").addClass("bg-failure").css({"border":"1px solid red","color":"red","padding":"5px","margin-top":"3px","width":"fit-content"}).slideDown("slow").text("Password Doesn't Exist!");
                    }
                }
            });
        }
    });


// ============
// Add admin 
// ============

$("#add-admin-form").submit(function(e){
    e.preventDefault();
    let add_admin_first_name = $("#add-admin-first-name").val();
    let add_admin_last_name = $("#add-admin-last-name").val();
    let add_admin_email = $("#add-admin-email").val();
    let add_admin_username = $("#add-admin-username").val();
    let add_admin_password = $("#add-admin-password").val();
    let add_admin_phone_no = $("#add-admin-phone-no").val();
    let add_admin_city = $("#add-admin-city").val();
    if (add_admin_first_name == "" || add_admin_last_name == "" || add_admin_email == "" || add_admin_username == "" || add_admin_password == "" || add_admin_phone_no == "" || add_admin_city == "") {
        if (add_admin_first_name == "") {
            $("#add-admin-first-name-helpId").html("<div class='alert alert-danger'>First Name Required</div>");
        }
        if (add_admin_last_name == "") {
            $("#add-admin-last-name-helpId").html("<div class='alert alert-danger'>Last Name Required</div>");
        }
        if (add_admin_email == "") {
            $("#add-admin-email-helpId").html("<div class='alert alert-danger'>Email Required</div>");
        }
        if (add_admin_username == "") {
            $("#add-admin-username-helpId").html("<div class='alert alert-danger'>UserName Required</div>");
        }
        if (add_admin_password == "") {
            $("#add-admin-password-helpId").html("<div class='alert alert-danger'>password Required</div>");
        }
        if (add_admin_phone_no == "") {
            $("#add-admin-phone-no-helpId").html("<div class='alert alert-danger'>Phone No Required</div>");
        }
        if (add_admin_city == "") {
            $("#add-admin-city-helpId").html("<div class='alert alert-danger'>City Required</div>");
        }
    } else {
        var formData = new FormData(this);
        formData.append("addAdmin","1");
        console.log("okay");
        $.ajax({
            type: "POST",
            url: url + "/php-files/add_admin.php",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                var add_admin_response = JSON.parse(response);
                console.log("parsed response ",add_admin_response);
                console.log(response);
                if (add_admin_response.hasOwnProperty("success")) {
                    $("#add-admin-message").html("").html("<div class='alert alert-success'>Admin Successfully Inserted!</div>");
                    $("#add-admin-first-name, #add-admin-last-name, #add-admin-email, #add-admin-username, #add-admin-password, #add-admin-phone-no").val("");
                } else if(add_admin_response.hasOwnProperty("failure")){
                    $("#add-admin-message").html("").html("<div class='alert alert-danger'>Admin Inserted Un-successfully</div>");
                } else if(add_admin_response.hasOwnProperty("insert_fail")){
                    $("#add-admin-message").html("").html("<div class='alert alert-danger'>Admin Inserted Un-successfully due to Database file</div>");
                } else if(add_admin_response.hasOwnProperty("key_not_set")){
                    $("#add-admin-message").html("").html("<div class='alert alert-danger'>Issue in key transfer</div>");
                } else{
                    $("#add-admin-message").html("").html("<div class='alert alert-danger'>Undefined Error</div>");
                }
                
                
            }
        });
    }
    
    
});








// change password


    $("#change-password-button").submit(function(e){
        e.preventDefault();
        var old_pass = $("#change-password-old-password").val();
        var new_pass = $("#change-password-new-password").val();
        if (old_pass == "") {
            $("#change-password-old-password-helpId").html("<div class='alert alert-danger'>Old Password Required!</div>");
        }
        if (new_pass == "") {
            $("#change-password-new-password-helpId").html("<div class='alert alert-danger'>New Password Required!</div>");
        }
        $.ajax({
            type: "post",
            url: url + "/php-files/change-password.php",
            data: {old_password:old_pass,new_password:new_pass},
            success: function () {
                
            }
        });
    });



        // ==============\
        // Add Category|
        // ==============/
        $("#add-new-category-form").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("add-new-cat-signal", "1");
            if ($("#add-new-category-name").val() == "") {
                $("#add-new-category-name-helpId").removeClass("text-muted").addClass("text-danger").text("*Category Name Required");
            } else {
                $.ajax({
                    type: "POST",
                    url: url + "/php-files/category.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        var res = JSON.parse(response);
                        if (res.hasOwnProperty("success")) {
                            $("#add-category-message").html("<div class='alert alert-success'>Category Inserted Successfully</div>");
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                });
            }
        });




        // ==============\
        // Update Category|
        // ==============/
        $("#update-category-form").on("submit", function(event){
            event.preventDefault();
            var cat_id = $("#update-category-id").val();
            var cat_name = $("#update-category-name").val();
            $.ajax({
                type: "POST",
                url: url + "/php-files/category.php",
                data: {update_cat_id : cat_id, update_cat_name : cat_name},
                success: function (response) {
                    console.log(response);
                    var res = JSON.parse(response);
                    console.log(res);
                    console.log("hello");
                    if (res.hasOwnProperty("success")) {
                        $("#update-category-message").html("").html("<div class='alert alert-success'>Updated Successfully</div>");
                        setTimeout(() => {
                            window.location = url + "/categories.php";
                            $("#update-category-message").html("");
                        }, 1000);
                    } else {
                        $("#update-category-message").html("").html("<div class='alert alert-danger'>Updated Un-Successful</div>");
                        setTimeout(() => {
                            window.location = url + "/categories.php";
                            $("#update-category-message").html("");
                        }, 1000);
                    }
                }
            });
        });





    // ==============\
    // Delete Category|
    // ==============/
    $(".admin-delete-category").click(function (e) { 
        e.preventDefault();
        var del_icon_anchor = $(this);
        var id = $(this).attr("data-id");
        $.ajax({
            type: "POST",
            url: url + "/php-files/category.php",
            data: {del_cat_id:id},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    del_icon_anchor.parent().parent("tr").remove();
                    window.location.reload();
                }
            }
        });
    });


    //__________
    // Sub CATEGORY |
    //----------


    // ==============\
    // Add New Sub Category|
    // ==============/
    $("#add-sub-category-parent-category option").on("hover",function(){
        $(this).addClass("text-light").addClass("bg-primary");
        console.log("doem");
    });
    

    // ==============\
    // Add New Sub Category|
    // ==============/
    $("#add-new-sub-category-form").submit(function (event) { 
        event.preventDefault();
        var sub_cat_title =  $("#add-sub-category-title").val();
        var sub_cat_parent_cat = $("#add-sub-category-parent-category").val();
        var empty_flag = true;
        if (sub_cat_title == "") {
            $("#add-sub-category-title-helpId").removeClass("text-muted").addClass("text-danger").text("*Sub Category Required");
            empty_flag = false;
        }
        if (sub_cat_parent_cat == "" || sub_cat_parent_cat == null) {
            $("#add-sub-category-parent-category").removeClass("text-muted").addClass("text-danger").text("*Parent Category Required");
            empty_flag = false;
        }
        var add_show_in_header = $("#add-sub-category-show-in-header").prop("checked") ? 1 : 0;
        var add_show_in_footer = $("#add-sub-category-show-in-footer").prop("checked") ? 1 : 0;
        if (empty_flag) {
            $.ajax({
                type: "POST",
                url: url + "/php-files/sub-category.php",
                data: {sub_cat : sub_cat_title, parent_cat : sub_cat_parent_cat, in_header : add_show_in_header, in_footer : add_show_in_footer},
                success: function (response) {
                    console.log(response);
                    var res = JSON.parse(response);
                    if (res.hasOwnProperty("success")) {
                        $("#add-sub-category-message").html("<div class='alert alert-success'>Sub Category Inserted Successfully</div>");
                        setTimeout(() => {
                            window.location = url + "/sub-category.php";
                        }, 1500);
                    } else {
                        $("#add-sub-category-message").html("<div class='alert alert-danger'>Sub Category Inserted Unsuccessfully!</div>");
                    }
                }
            });
        }
     });







    // ==============\
    // Update Sub Category|
    // ==============/
    const before_sub_cat_name = $("#update-sub-category-title").val();
    $("#update-sub-category-form").on("submit",function(event){
        event.preventDefault();
        var sub_cat_id = $("#update-sub-category-sub-category-id").val();
        console.log("this is sub cat id ",sub_cat_id);
        var sub_cat_name = $("#update-sub-category-sub-category-id").val()=="" ? $("#update-sub-category-title").val() : before_sub_cat_name;
        var parent_cat_id = $("#update-sub-category-parent-category").val();
        var show_in_header = $("#update-sub-category-show-in-header").prop("checked") ? 1 : 0;
        var show_in_footer = $("#update-sub-category-show-in-footer").prop("checked") ? 1 : 0;
            $.ajax({
                type: "POST",
                url: url + "/php-files/sub-category.php",
                data: {update_sub_cat_id : sub_cat_id, update_sub_cat_name : sub_cat_name, update_parent_cat_id : parent_cat_id, update_sub_cat_show_head : show_in_header, update_sub_cat_show_foot : show_in_footer},
                success: function (response) {
                    console.log(response);
                    var res = JSON.parse(response);
                    if (res.hasOwnProperty("success")) {
                        $("#update-sub-category-message").html("<div class='alert alert-success'>Updated Successfully</div>");
                        setTimeout(() => {
                            $("#update-sub-category-message").html("");
                        }, 1000);
                        setTimeout(() => {
                            window.location = url + "/sub-category.php";
                        }, 1500);
                    }
                }
            });
    });


    // ==============\
    // Delete Sub Category|
    // ==============/
    $(".sub-cat-delete-btn").click(function(){
        var id = $(this).attr("data-id");
        var del_btn = $(this);
        $.ajax({
            type: "POST",
            url: url + "/php-files/sub-category.php",
            data: {sub_cat_del_id : id},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    del_btn.parent().parent("tr").remove();
                } else {
                    console.log("error in deletion");
                    
                }
            }
        });
    });




    // -------.
    // Brands |
    // -------.

    // ==============\
    // Update Brand |
    // ==============/

    $("#update-brand-form").on("submit", function(e){
        e.preventDefault();
        var update_brand_name = $("#update-brand-title").val();
        var update_brand_cat = $("#update-brand-category").val();
        var update_brand_id = $("#update-brand-brand-id").val();
        
        $.ajax({
            type: "POST",
            url: url + "/php-files/brand.php",
            data: {up_brand_id : update_brand_id, up_brand : update_brand_name, up_brand_cat : update_brand_cat},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    $("#update-brand-message").addClass("alert").addClass("alert-success").text("Updated Successfully");
                    setTimeout(() => {
                        window.location = url + "/brands.php";
                    }, 1500);
                }
                
            }
        });
    });

    // ==============\
    // Delete Brand |
    // ==============/

    $(".brand-del-btn").click(function(e){
        e.preventDefault();
        var brand_del_id = $(this).attr("data-brand-del-id");
        var brand_del_btn = $(this);
        $.ajax({
            type: "POST",
            url: url + "/php-files/brand.php",
            data: {brand_del_id : brand_del_id},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    brand_del_btn.parent().parent("tr").remove();
                }
            }
        });
    });




    // ==============\
    // Add New Brand |
    // ==============/
    $("#add-brand-form").on("submit",function(e){
        e.preventDefault();
        var brand_name = $("#add-brand-title").val();
        var brand_cat = $("#add-brand-category").val();
        if (brand_name=="" || brand_cat==null) {
            if (brand_name=="") {
                $("#add-brand-title-helpId").removeClass("text-muted").addClass("text-danger").text("*Required");
            }
            if (brand_cat==null) {
                $("#add-brand-category-helpId").removeClass("text-muted").addClass("text-danger").text("*Required");
            }
        } else {
            $.ajax({
                type: "POST",
                url: url + "/php-files/brand.php",
                data: {add_brand_name : brand_name, add_brand_cat : brand_cat},
                success: function (response) {
                    var res = JSON.parse(response);
                    if (res.hasOwnProperty("success")) {
                        $("#add-brand-message").addClass("alert").addClass("alert-success").text("Brand Added Successfully");
                        setTimeout(() => {
                            window.location = url + "/brands.php";
                        }, 1500);
                    }
                }
            });
        }
        
    });









    // ==============\
    // Delete Brand Category |
    // ==============/

    $(".admin-delete-brand-category").click(function (e) { 
        e.preventDefault();
        var del_icon_anchor = $(this);
        var id = $(this).attr("data-brand-id");
        $.ajax({
            type: "POST",
            url: url + "/php-files/brand-category.php",
            data: {del_cat_id:id},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    del_icon_anchor.parent().parent("tr").remove();
                    window.location.reload();
                }
            }
        });
    });





        // ==============\
        // Add Brand Category|
        // ==============/
        $("#add-new-brand-category-form").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            formData.append("add-new-brand-cat-signal", "1");
            if ($("#add-new-brand-category-name").val() == "") {
                $("#add-new-brand-category-name-helpId").removeClass("text-muted").addClass("text-danger").text("*Brand Category Name Required");
            } else {
                $.ajax({
                    type: "POST",
                    url: url + "/php-files/brand-category.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        console.log(response);
                        var res = JSON.parse(response);
                        if (res.hasOwnProperty("success")) {
                            $("#add-brand-category-message").html("<div class='alert alert-success'>Category Inserted Successfully</div>");
                            setTimeout(() => {
                                window.location = url + "/brand-categories.php";
                            }, 1000);
                        }
                    }
                });
            }
        });





        // ==============\
        // Update Brand Category|
        // ==============/
        $("#update-brand-category-form").on("submit", function(event){
            event.preventDefault();
            var brand_update_cat_id = $("#update-brand-category-id").val();
            var brand_update_cat_name = $("#update-brand-category-name").val();
            $.ajax({
                type: "POST",
                url: url + "/php-files/brand-category.php",
                data: {brand_update_cat_id : brand_update_cat_id, brand_update_cat_name : brand_update_cat_name},
                success: function (response) {
                    console.log(response);
                    var res = JSON.parse(response);
                    console.log(res);
                    console.log("hello");
                    if (res.hasOwnProperty("success")) {
                        $("#update-brand-category-message").html("").html("<div class='alert alert-success'>Updated Successfully</div>");
                        setTimeout(() => {
                            window.location = url + "/brand-categories.php";
                            $("#update-brand-category-message").html("");
                        }, 1000);
                    } else {
                        $("#update-brand-category-message").html("").html("<div class='alert alert-danger'>Updated Un-Successful</div>");
                        setTimeout(() => {
                            window.location = url + "/brand-categories.php";
                            $("#update-brand-category-message").html("");
                        }, 1000);
                    }
                }
            });
        });







    // ==============\
    // Show User      |
    // ==============/
    $(".users-data-show-btn").click(function(e){
        e.preventDefault();
        var user_id = $(this).attr("data-id");
        $.ajax({
            type: "POST",
            url: url + "/php-files/users.php",
            data: {user_show_id : user_id},
            success: function (response) {
                var res = JSON.parse(response);
                console.log(res);
                console.log(res[0].user_id);
                $("#users-details-first-name").text(res[0].user_first_name);
                $("#users-details-last-name").text(res[0].user_last_name);
                $("#users-details-user-name").text(res[0].user_userName);
                $("#users-details-user-email").text(res[0].user_email);
                $("#users-details-mobile").text(res[0].user_ph_no);
                $("#users-details-address").text(res[0].user_address);
                $("#users-details-city").text(res[0].user_city);
                if (res[0].user_active_status == "1") {
                    $("#users-details-status").text("Active");
                } else {
                    $("#users-details-status").text("Blocked");
                }
            }
        });
    });



    // ==============\
    // Show User      |
    // ==============/
    $(".user-status-btn").click(function(e){
        e.preventDefault();
        var status_user_active_status = $(this).attr("data-user-status") == "1" ? 0 : 1;
        var  status_user_id = $(this).attr("data-user-id");
        $.ajax({
            type: "POST",
            url: url + "/php-files/users.php",
            data: {status_user_id_ : status_user_id, status_user_active_status_ : status_user_active_status},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    location.reload();
                    
                }
            }
        });
    });


    // ==============\
    // Delete User    |
    // ==============/
    $(".user-status-del-btn").click(function(e){
        e.preventDefault();
        var user_del_id = $(this).attr("data-user-delete-id");

        $.ajax({
            type: "POST",
            url: url + "/php-files/users.php",
            data: {usr_del_id : user_del_id},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    $(this).parent().parent("tr").remove();
                    location.reload();
                }
            }
        });
    });



    // ==============\
    // Product       |
    // ==============/


    // ==============\
    // Add Product   |
    // ==============/

    // Input image show function
    // $("#add-product-featured-image").change(function () { 
        
    //     readURL(this);
    // });
    // function readURL(file) {
    //     if (file.files && file.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function (e) {
    //             var file_name = file.files[0]["name"];
    //     var file_size = file.files[0]["size"];
    //     if (file_size > 2097152) {
    //         if ($("#add-procuct-image-selection-error-text").length) {
    //             $("#add-procuct-image-selection-error-text").remove();
    //         }
    //         $("#add-product-featured-image-box-img").attr("src","");
    //         $(file).val("");
    //         $("#add-product-featured-image-box").append("<div class='alert alert-danger' id='add-procuct-image-selection-error-text'>* File Size must be less than 2mb</div>");
    //         $("#add-product-submit-btn").prop("disabled",true);
            
            
    //     } else {
            
    //         if (!(file_name.slice(-4) == ".png" || file_name.slice(-4)==".jpg" || file_name.slice(-4)=="webp" || file_name.slice(-4)=="jpeg")) {
    //             if ($("#add-procuct-image-selection-error-text").length) {
    //                 $("#add-procuct-image-selection-error-text").remove();
    //                 $("#add-product-featured-image-box-img").attr("src","");
    //                 $(file).val("");
                    
    //             }
    //             $("#add-product-featured-image-box").append("<div class='alert alert-danger' id='add-procuct-image-selection-error-text'>* Please select (.jpg, .png, .webp, .jpeg) file format</div>");
    //             $("#add-product-submit-btn").prop("disabled",true);
    //         } else {
    //             $("#add-procuct-image-selection-error-text").remove();
    //             $("#add-product-submit-btn").prop("disabled",false);
    //             $("#add-product-featured-image-box-img").attr("src", e.target.result);
            
    //         }
    //     }
    //           }
    //     }
    //     reader.readAsDataURL(file.files[0]);
        
        
    // }


    // Add Product sub-category show
    $("#add-product-product-category").change(function(){
        var add_prod_cat = $(this).val();
        $("#add-product-product-sub-category").empty();
        $.ajax({
            type: "POST",
            url: url + "/php-files/products.php",
            data: {prod_cat : add_prod_cat},
            // dataType: "json",
            success: function (response) {
                var res = JSON.parse(response);
                console.log(res);
                if (res.hasOwnProperty("no_sub_cats")) {
                    $("#add-product-product-sub-category").append(
                        "<option disabled selected>No Sub Category Found</option>"
                     );
                } else {
                    $.each(res, function (key, value) { 
                    
                        $("#add-product-product-sub-category").append(
                           "<option value='" + value.sub_cat_id + "'>" + value.sub_cat_name + "</option>"
                        );
                   });
                }
                
            }
        });
    });
            
    
    




    // Delete Product
    $(".admin-product-delete-btn").click(function(e){
        e.preventDefault();
        var current_del_btn = $(this);
        var product_del_id = $(this).attr("data-del-id");
        var product_del_cat_id = $(this).attr("data-del-sub-cat-id");
        $.ajax({
            type: "POST",
            url: url + "/php-files/products.php",
            data: {product_delete_id : product_del_id, product_delete_cat_id : product_del_cat_id},
            success: function (response) {
                console.log(response);
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    current_del_btn.parent().parent("tr").remove();
                }
            }
        });
    });




    // Edit product sub category load
    $("#edit-product-product-category").change(function(){
        var edit_prod_cat = $(this).val();
        $("#edit-product-product-sub-category").empty();
        $.ajax({
            type: "POST",
            url: url + "/php-files/products.php",
            data: {edit_prod_cat : edit_prod_cat},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("no_sub_cats")) {
                    $("#edit-product-product-sub-category").append(
                        "<option disabled selected>No Sub Category Found</option>"
                     );
                } else {
                    $.each(res, function (key, value) { 
                    
                        $("#edit-product-product-sub-category").append(
                           "<option value='" + value.sub_cat_id + "'>" + value.sub_cat_name + "</option>"
                        );
                   });
                }
                
            }
        });
    });
    



        
    

    

// $("#edit-product-featured-image").change(function () { 
        
//         editReadUrl(this);
//     });
//     function editReadUrl(file) {
//         if (file.files && file.files[0]) {
//             var reader = new FileReader();
//             reader.onload = function (e) {
//                 var file_name2 = file.files[0]["name"];
//             var file_size2 = file.files[0]["size"];
//             if (file_size2 > 2097152) {
//             if ($("#edit-procuct-image-selection-error-text").length) {
//                 $("#edit-procuct-image-selection-error-text").remove();
//             }
//             $("#edit-product-featured-image-box-img").attr("src","");
//             $(file).val("");
//             $("#edit-product-featured-image-box-img").append("<div class='alert alert-danger' id='add-procuct-image-selection-error-text'>* File Size must be less than 2mb</div>");
//             $("#edit-product-submit-btn").prop("disabled",true);
            
            
//         } else {
            
//             if (!(file_name2.slice(-4) == ".png" || file_name2.slice(-4)==".jpg" || file_name2.slice(-4)=="webp" || file_name2.slice(-4)=="jpeg")) {
//                 if ($("#edit-procuct-image-selection-error-text").length) {
//                     $("#edit-procuct-image-selection-error-text").remove();
//                     $("#edit-product-featured-image-box-img").attr("src","");
//                     $(file).val("");
                    
//                 }
//                 $("#edit-procuct-image-selection-error-text").append("<div class='alert alert-danger' id='add-procuct-image-selection-error-text'>* Please select (.jpg, .png, .webp, .jpeg) file format</div>");
//                 $("#edit-product-submit-btn").prop("disabled",true);
//             } else {
//                 $("#edit-procuct-image-selection-error-text").remove();
//                 $("#edit-product-submit-btn").prop("disabled",false);
//                 $("#edit-product-featured-image-box-img").attr("src", e.target.result);
            
//             }
//         }
//               }
//         }
//         reader.readAsDataURL(file.files[0]);
        
        
//     }



    // Orders Confirm Payment
    $(".orders-confirm-payment-btn").click(function (e) { 
        e.preventDefault();
        var order_confirm_payment_btn = $(this).attr("data-orders-confirm-payment-btn");
        var order_confirm_payment_stat = $(this).attr("data-orders-confirm-payment-status");
        switch (order_confirm_payment_stat) {
            case "1":
                var order_confirm_payment_status = 0;
                break;
        
            case "0":
                var order_confirm_payment_status = 1;
                break;
        }
        $.ajax({
            type: "POST",
            url: url + "/php-files/orders.php",
            data: {confirm_payment_btn : order_confirm_payment_btn, confirm_payment_status : order_confirm_payment_status},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    window.location.reload();
                }
            }
        });

     });




     $(".orders-delivery-status-btn").click(function (e) { 
        e.preventDefault();
        var order_delivery = $(this).attr("data-orders-delivery-status");
        switch (order_delivery) {
            case "1":
                var order_delivery_status = 0;
                break;
            case "0":
                var order_delivery_status = 1;
                break;
        }
        var order_delivery_id = $(this).attr("data-orders-delivery-status-btn");
        $.ajax({
            type: "POST",
            url: url + "/php-files/orders.php",
            data: {delivery_id : order_delivery_id, delivery_status : order_delivery_status},
            success: function (response) {
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    window.location.reload();
                }
            }
        });
      });




    //   Options update data
    $("#options-section-form").submit(function (event) { 
        event.preventDefault();
        var formData = new FormData(this);
        formData.append("options_update","1");
        console.log(formData);
        $.ajax({
            type: "POST",
            url: url + "/php-files/options.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    $("#options-message-box").html("");
                    $("#options-message-box").html("<div class='alert alert-success'>Successfully Updated Options</div>");
                    setTimeout(() => {
                        $("#options-message-box").html("");
                        window.location.reload();
                    }, 2000);
                    
                } else {
                    $("#options-message-box").html("");
                    $("#options-message-box").html("<div class='alert alert-danger'>Update Unsuccessfull!</div>");
                    setTimeout(() => {
                        $("#options-message-box").html("");
                    }, 2000);
                }
            }
        });
     });










});







