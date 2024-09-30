var edit_files = null;
        document.getElementById("edit-product-featured-image").addEventListener("change", function(){
            console.dir(this.files);
            edit_files = Array.from(this.files);
            if (edit_files.length > 4) {
                alert("Only 4 images can be used!");
                edit_files = edit_files.slice(0,4);
                console.dir(this.files);
            }
            var primary_img = document.createElement("img");
            primary_img.src = URL.createObjectURL(edit_files[0]);
            document.getElementById("edit-product-featured-image-inner-box").innerHTML = "";
            document.getElementById("edit-product-featured-image-inner-box").appendChild(primary_img);
            document.getElementById("edit-product-featured-image-inner-box").style.setProperty("background-image","none","important");
            var images = "";
            for (let i = 1; i < edit_files.length; i++) {
                images += `
                <div class="edit-product-featured-image-side-image">
                    <img src="`+ URL.createObjectURL(edit_files[i]) +`">
                </div>
                `;
            }
            document.getElementById("edit-product-featured-image-side-image-box").innerHTML = "";
            document.getElementById("edit-product-featured-image-side-image-box").innerHTML = images;
            document.querySelectorAll(".edit-product-featured-image-side-image").forEach(element => {
                element.style.setProperty("background-image","none","important")
            });
        });


$(document).ready(function () {
    var origin = window.location.origin;
    var path = window.location.pathname.split("/");

    var url = origin + "/" + path[1] + "/" + path[2];
console.log(url + "/php-files/add_admin.php");
console.log(url + "/php-files/add_admin.php");
    // Edit Product
    $("#edit-product-form").submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var count = 1;
            edit_files.forEach(function (e) {
                formData.append("file"+count,e);
                count += 1;
            });
        formData.append("edit_pro_id","1");
        $.ajax({
            type: "POST",
            url: url +  "/php-files/products.php",
            processData: false,
            contentType: false,
            data: formData,
            success: function (response) {
                console.log(response);
                var res = JSON.parse(response);
                if (res.hasOwnProperty("success")) {
                    $("#edit-product-message-box").html("");
                    $("#edit-product-message-box").html("<div class='alert alert-success'>Product Updated Successfully!</div>");
                    setTimeout(() => {
                        window.location = url + "/admin-products.php";
                    }, 1500);
                } else {
                    $("#edit-product-message-box").html("");
                    $("#edit-product-message-box").html("<div class='alert alert-danger'>Product Updated Unsuccessful!</div>");
                }
            }
        });
    });
});