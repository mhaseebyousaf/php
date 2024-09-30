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
                                <h2 class="w-100 d-block">Users</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover w-100" id="users-section-table">
                                    <thead>
                                        <tr>
                                            <th><b>Full Name</b></th>
                                            <th><b>Gmail</b></th>
                                            <th><b>Mobile</b></th>
                                            <th><b>City</b></th>
                                            <th><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $limit = 6;
                                        $db->select("users","*",null,null,"user_id DESC", $limit);
                                        $row = $db->getResult();
                                        foreach ($row[0] as $key => $value) {
                                        ?>
                                        <tr>
                                            <td><span class="users-title"><?php echo $value["user_first_name"] . " " . $value["user_last_name"]; ?></span></td>
                                            <td><span class="users-category"><?php echo $value["user_email"];?></span></td>
                                            <td><span class="users-mobile"><?php echo $value["user_ph_no"];?></span></td>
                                            <td><b class="users-city"><?php echo $value["user_city"];?></b></td>
                                            <td>
                                                <a href="javascript:void(0)" class="mr-1 users-data-show-btn" data-toggle="modal" data-id="<?php echo $value["user_id"];?>" data-target="#user-details" ><i class="fa-regular fa-eye"></i></a>
                                                <?php
                                                switch ($value["user_active_status"]) {
                                                    case 1:
                                                        $user_status_text = "Block";
                                                        $user_status_class = "btn-success";
                                                        break;
                                                    case 0:
                                                        $user_status_text = "UnBlock";
                                                        $user_status_class = "btn-danger";
                                                        break;
                                                    }
                                                ?>
                                                <button class="btn <?php echo $user_status_class ?> btn-sm user-status-btn" data-user-id="<?php echo $value["user_id"];?>" data-user-status="<?php echo $value["user_active_status"];?>"><?php echo $user_status_text ?></button>
                                                <a href="javascript:void(0)" class="ml-1 user-status-del-btn" data-user-delete-id="<?php echo $value["user_id"];?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="container modal-container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal fade" id="user-details" tabindex="-1" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <h3 class="text-center">User Details</h3>
                                                </div>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-sm table-bordered table-striped">
                                                    <tr>
                                                        <td>First Name</td>
                                                        <td><span id="users-details-first-name">Haseeb</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Last Name</td>
                                                        <td><span id="users-details-last-name">Yousaf</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>UserName</td>
                                                        <td><span id="users-details-user-name">Haseeb</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>User email</td>
                                                        <td><span id="users-details-user-email">mhy02749@gmail.com</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td><span id="users-details-mobile">03137316334</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Address</td>
                                                        <td><span id="users-details-address">asdf jkl; asdf jkl;</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>City</td>
                                                        <td><span id="users-details-city">Faisalabad</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td><span id="users-details-status">Blocked</span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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