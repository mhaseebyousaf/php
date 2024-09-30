<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <!-- fontawsome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JavaScript and JQuery files -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <!-- Custom CSS Files -->
    <link rel="stylesheet" href="CSS/admin-style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto login-main-container">
                <div class="row pb-3">
                    <div class="col-sm-12">
                        <h2 class="text-center">Admin Login</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form id="admin-login-form" method="POST" class="w-100">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="admin-login-username"><h5>User Name</h5></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="admin-login-username" id="admin-login-username" placeholder="UserName OR Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="admin-login-password"><h5>Password</h5></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                      <input type="password" class="form-control" name="admin-login-password" id="admin-login-password"placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <b><input type="submit" class="btn btn-lg btn-primary mx-auto d-block" value="Login" id="admin-login-button" name="admin-login-button"></b>
                                    <!-- <button type="submit" id="admin-login-button" name="admin-login-button" class="btn btn-lg btn-primary mx-auto d-block"><b>Login</b></button> -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" id="admin-login-message"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/jquery.js"></script>
<script src="js/admin-actions.js"></script>
</html>