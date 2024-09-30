
$(document).ready(function () {
    $("#add-product-form").submit(function(e){
        e.preventDefault();
        var add_product_name = $("#add-product-product-title").val();
        var add_product_category = $("#add-product-product-category").val();
        var add_product_brand = $("#add-product-product-brand").val();
        var add_product_description = $("#add-admin-product-description").val();
        var add_product_featured_image = $("#add-product-featured-image").val();
        var add_product_price = $("#add-product-product-price").val();
        var add_product_available_quantity = $("#add-product-quantity").val();
        var add_procuct_status = $("#add-product-status").val();
        var isInvalid = true;
            if (add_product_name=="") {
                $("#add-product-product-title-helpId").removeClass("text-muted").addClass("text-danger").text("* Product Name Required");
                isInvalid = false;
            }
            if (add_product_category=="") {
                $("#add-product-product-category-helpId").removeClass("text-muted").addClass("text-danger").text("* Product Category Required");
                isInvalid = false;
            }
            if (add_product_brand=="") {
                $("#add-product-product-brand-helpId").removeClass("text-muted").addClass("text-danger").text("* Product Brand Required");
                isInvalid = false;
            }
            if (add_product_description=="") {
                $("#add-product-product-description-helpId").removeClass("text-muted").addClass("text-danger").text("* Product Description Required");
                isInvalid = false;
            }
            if (add_product_featured_image.length===0) {
                $("#add-product-featured-image-fileHelpId").removeClass("text-muted").addClass("text-danger").text("* Product Image Required");
                isInvalid = false;
            }
            if (add_product_price=="") {
                $("#add-product-product-price-helpId").removeClass("text-muted").addClass("text-danger").text("* Product Price Required");
                isInvalid = false;
            }
            if (add_product_available_quantity=="") {
                $("#add-product-quantity-helpId").removeClass("text-muted").addClass("text-danger").text("* Product Available Quantity Required");
                isInvalid = false;
            }
            if (add_procuct_status=="") {
                $("#add-product-status-helpId").removeClass("text-muted").addClass("text-danger").text("* Product Status Required");
                isInvalid = false;
            }
            
        if (isInvalid) {
            var origin = window.location.origin;
            var path = window.location.pathname.split("/");

            var url = origin + "/" + path[1] + "/" + path[2];
            console.log(url + "/php-files/add_admin.php");
            console.log(url + "/php-files/add_admin.php");
            $("#add-product-form").serialize();
            var formData = new FormData(this);
            var count = 1;
            files.forEach(function (e) {
                formData.append("file"+count,e);
                count += 1;
            });
            formData.append("add_product_form_data","1");
            $.ajax({
                type: "POST",
                url: url + "/php-files/products.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response2) {
                    console.log(response2);
                    var res2 = JSON.parse(response2);
                    if (res2.hasOwnProperty("success")) {
                        $("#add-product-message-box").html("<div class='alert alert-success'>Product Inserted Successfully</div>");
                        setTimeout(() => {
                            window.location = url + "/admin-products.php";
                        }, 1500);
                    } else if(res2.hasOwnProperty("failure")) {
                        $("#add-product-message-box").html("<div class='alert alert-danger'>Cannot Insert Product</div>");
                        // setTimeout(() => {
                        //     window.location = url + "/admin-products.php";
                        // }, 1500);
                    } else if(res2.hasOwnProperty("file_type_error")) {
                        $("#add-product-message-box").html("<div class='alert alert-danger'>File Not Supported</div>");
                        // setTimeout(() => {
                        //     window.location = url + "/admin-products.php";
                        // }, 1500);
                    } 
                }
            });
        }
            
    });



    var files = null;
document.getElementById("add-product-featured-image").addEventListener("change", function(e){
    e.preventDefault();
    // console.dir(this.files);
    files = Array.from(this.files);
    if (files.length > 4) {
        alert("Only 4 images can be used!");
        files = files.slice(0,4);
        // console.dir(this.files);
    }
    var primary_img = document.createElement("img");
    primary_img.src = URL.createObjectURL(files[0]);
    document.getElementById("add-product-featured-image-inner-box").innerHTML = "";
    document.getElementById("add-product-featured-image-inner-box").appendChild(primary_img);
    document.getElementById("add-product-featured-image-inner-box").style.setProperty("background-image","none","important");
    var images = "";
    for (let i = 1; i < files.length; i++) {
        images += `
        <div class="add-product-featured-image-side-image">
            <img src="`+ URL.createObjectURL(files[i]) +`">
        </div>
        `;
    }
    document.getElementById("add-product-featured-image-side-image-box").innerHTML = images;
    document.querySelectorAll(".add-product-featured-image-side-image").forEach(element => {
        element.style.setProperty("background-image","none","important")
    });
});
});