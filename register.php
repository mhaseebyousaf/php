<?php 
include "header.php";
?>
    <div id="register-outer-main-container" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="container border border-dark rounded" id="register-user">
                        <div class="row">
                            <div class="col mx-auto">
                                <h2 class="display-4 text-center">Register</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form id="register-user-form">
                                    <div class="container">
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b>
                                                    <label for="register-first-name">First Name</label>
                                                </b>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" name="register-first-name" id="register-first-name" class="form-control" placeholder="First Name" aria-describedby="register-first-name-helpId">
                                                <small id="register-first-name-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="register-last-name">Last Name</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" name="register-last-name" id="register-last-name" class="form-control" placeholder="Last Name" aria-describedby="register-last-name-helpId">
                                                <small id="register-last-name-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="register-user-name">User Name</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="text" name="register-user-name" id="register-user-name" class="form-control" placeholder="User Name" aria-describedby="register-user-name-helpId">
                                                <small id="register-user-name-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="register-email">User Email</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="email" name="register-email" id="register-email" class="form-control" placeholder="User Email" aria-describedby="register-email-helpId">
                                                <small id="register-email-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="register-password">Password</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="password" name="register-password" id="register-password" class="form-control" placeholder="Password" aria-describedby="register-password-helpId">
                                                <small id="register-password-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="register-mobile-number">Mobile</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="tel" name="register-mobile-number" id="register-mobile-number" class="form-control" placeholder="Mobile Number" aria-describedby="register-mobile-number-helpId">
                                                <small id="register-mobile-number-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="register-address">Address</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="address" name="register-address" id="register-address" class="form-control" placeholder="Address" aria-describedby="register-address-helpId">
                                                <small id="register-address-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-3">
                                                <b><label for="register-city">City</label></b>
                                            </div>
                                            <div class="col-9">
                                                <input type="address" name="register-city" id="register-city" class="form-control" placeholder="City" aria-describedby="register-city-helpId">
                                                <small id="register-city-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="row py-3">
                                            <div class="col-sm-12">
                                                <input type="submit" value="Register" id="register-submit-btn">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12" id="register-message"></div>
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