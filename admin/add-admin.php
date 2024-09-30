<?php
    include("admin-header.php");
?>

<div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- side Bar  -->
                <?php 
                    include("admin-side-bar.php");
                ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Add Admin</h2>
                            </div>
                        </div>
                        <form id="add-admin-form" method="post">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="add-admin-first-name">First Name</label>
                                                <input type="text" name="add-admin-first-name" id="add-admin-first-name" class="form-control" placeholder="First Name" aria-describedby="add-admin-first-name-helpId">
                                                <small id="add-admin-first-name-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="add-admin-last-name">Last Name</label>
                                                <input type="text" name="add-admin-last-name" id="add-admin-last-name" class="form-control" placeholder="Last Name" aria-describedby="add-admin-last-name-helpId">
                                                <small id="add-admin-last-name-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="add-admin-email">Email</label>
                                              <input type="email" class="form-control" name="add-admin-email" id="add-admin-email" placeholder="email" aria-describedby="add-admin-email-helpId">
                                              <small id="add-admin-email-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="add-admin-username">Username</label>
                                              <input type="text" name="add-admin-username" id="add-admin-username" class="form-control" placeholder="Username" aria-describedby="add-admin-username-helpId">
                                              <small id="add-admin-username-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                              <label for="add-admin-password">Password</label>
                                              <input type="password" class="form-control" name="add-admin-password" id="add-admin-password" placeholder="Password" aria-describedby="add-admin-password-helpId">
                                              <small id="add-admin-password-helpId"></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="add-admin-phone-no">Phone No</label>
                                              <input type="text" name="add-admin-phone-no" id="add-admin-phone-no" class="form-control" placeholder="Phone No" aria-describedby="add-admin-phone-no-helpId">
                                              <small id="add-admin-phone-no-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="add-admin-city">City</label>
                                              <input type="text" name="add-admin-city" id="add-admin-city" class="form-control" placeholder="City" aria-describedby="add-admin-city-helpId">
                                              <small id="add-admin-city-helpId"></small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" value="Add Admin" name="add-admin-submit" id="add-admin-submit" class="btn btn-primary d-block mx-auto">
                                            
                                            <!-- <button type="submit" name="add-admin-submit" id="add-admin-submit" class="btn btn-primary d-block mx-auto"><b>Add Admin</b></button> -->
                                        </div>
                                        <div class="col-md-12">
                                        <div id="add-admin-message"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include("footer.php");
?>