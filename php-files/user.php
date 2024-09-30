<?php 
include "../admin/php-files/Database.php";
$db = new Database();
if (isset($_POST["user-register"])) {
    $fname = $_POST["register-first-name"];
    $lname = $_POST["register-last-name"];
    $uname = $_POST["register-user-name"];
    $email = $_POST["register-email"];
    $password = md5($_POST["register-password"]);
    $phone = $_POST["register-mobile-number"];
    $address = $_POST["register-address"];
    $city = $_POST["register-city"];
    $db->insert("users", ["user_first_name"=>$fname, "user_last_name"=>$lname, "user_userName"=>$uname, "user_email"=>$email, "user_ph_no"=>$phone, "user_address"=>$address, "user_city"=>$city, "user_password"=>$password]);
    $res = $db->getResult();
    if (is_int($res[0])) {
        echo json_encode(["success"=>"successfully registered"]);
        session_start();
        $_SESSION["user_email"] = $email;
        $_SESSION["user_name"] = $uname;
        exit;
    }
}


// User Login
if (isset($_POST["user-login"])) {
    $username = $_POST["login-user-name"];
    $password = md5($_POST["login-password"]);
    $db->select("users", "user_userName, user_email, user_password", null, "user_userName = '$username' OR user_email = '$username' AND user_password = '$password'", null, null);
    $user = $db->getResult();
    if (!empty($user[0]) && array_key_exists("user_userName", $user[0][0])) {
        echo json_encode(["success"=>"user exists"]);
        if (isset($_SESSION["user_name"])) {
            exit;
        } else {
            session_start();
            $_SESSION["user_name"] = $username;
            exit;
        }
    } else {
        echo json_encode(["failure"=>"no"]);
    }
}