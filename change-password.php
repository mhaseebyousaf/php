<?php 
include "header.php";
?>
    <div id="change-password-outer-main-container" class="bg-primary">
        <div class="container change-password-inner-container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="container border border-dark rounded" id="change-password-heading">
                        <div class="row">
                            <div class="col mx-auto">
                                <h2 class="display-4 text-center">Register</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="" id="register-user-form">
                                    <div class="container">
                                        <div class="row py-3">
                                            <div class="col-4">
                                                <b><label for="#register-email">User Email</label></b>
                                            </div>
                                            <div class="col-8">
                                                <input type="email" name="register-email" id="register-email" class="form-control" placeholder="User Email">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-4">
                                                <b><label for="#old-password">Old Password</label></b>
                                            </div>
                                            <div class="col-8">
                                                <input type="password" name="old-password" id="old-password" class="form-control" placeholder="Old Password">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-4">
                                                <b><label for="#new-password">New Password</label></b>
                                            </div>
                                            <div class="col-8">
                                                <input type="password" name="new-password" id="new-password" class="form-control" placeholder="New Password">
                                            </div>
                                        </div>
                                        
                                        <div class="row py-3">
                                            <div class="col-sm-12">
                                                <input type="submit" value="Update Password" class="update-password-btn">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
include "footer.php";
?>