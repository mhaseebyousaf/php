<?php 
        include("admin-header.php");
    ?>
    <div class="admin-panel-outer-most-container">
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                <?php
                    include("admin-side-bar.php");
                ?>
                <div class="col-md-10 col-sm-9 px-0">
                    <div class="container dashboard-box-container">
                        <div class="row admin-panel-heading-container">
                            <div class="col-sm-5 py-4 ">
                                <h2 class="w-100 d-block">Change Password</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form class="w-100" method="post" id="change-password-form">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                  <label for="change-password-old-password"><b>Old Password</b></label>
                                                  <input type="text" name="change-password-old-password" id="change-password-old-password" class="form-control" placeholder="Site Name" aria-describedby="change-password-old-password-helpId">
                                                  <div id="change-password-old-password-helpId"></div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="change-password-new-password"><b>New Password</b></label>
                                                  <input type="text" name="change-password-new-password" id="change-password-new-password" class="form-control" placeholder="Site Title" aria-describedby="change-password-new-password-helpId">
                                                  <div id="change-password-new-password-helpId"></div>
                                                </div>
                                                <input type="submit" value="Change Password" id="change-password-button" class="btn btn-primary">
                                                <div id="change-password-message" class="col-sm-6 text-center"></div>
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
        include("footer.php");
    ?>