<?php 
include "header.php";
?>
    <div id="modify-profile-outer-main-container" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="container border border-dark rounded" id="modify-profile">
                        <div class="row">
                            <div class="col mx-auto">
                                <h2 class="display-4 text-center">Update Profile</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form action="" id="register-user-form">
                                    <div class="container">
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b>
                                                    <label for="#register-first-name">First Name</label>
                                                </b>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" name="register-first-name" id="register-first-name" class="form-control" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="#register-last-name">Last Name</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" name="register-last-name" id="register-last-name" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="#register-email">User Email</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="email" name="register-email" id="register-email" class="form-control" placeholder="User Email">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="#register-password">Password</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="password" name="register-password" id="register-password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="#register-mobile-number">Mobile</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="tel" name="register-mobile-number" id="register-mobile-number" class="form-control" placeholder="Mobile Number">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="#register-address">Address</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="address" name="register-address" id="register-address" class="form-control" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="#register-city">City</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="address" name="register-city" id="register-city" class="form-control" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-sm-12">
                                                <input type="submit" value="Update Profile" class="modify-profile-btn">
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