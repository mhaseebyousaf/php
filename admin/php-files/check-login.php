<?php
// header("Content-Type: application/json");
include("Database.php");
$db = new Database();
if (isset($_POST["login"])) {
    // die("This is check-login.php file");
    if (isset($_POST["username"]) && $_POST["password"]) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = md5($password);
        $db->select("admin","user_name,admin_email,admin_password,first_name",null,"user_name='$username' OR admin_email='$username' AND admin_password='$password'",null,null);
        $result = $db->getResult();
        if(!empty($result) && key_exists("admin_email",$result[0][0]) && key_exists("admin_password",$result[0][0])) {
            
            session_start();
            $_SESSION['admin_name'] = $result[0][0]["first_name"];
            $_SESSION['admin_email'] = $result[0][0]["admin_email"];
            echo json_encode(["success"=>"login successfully"]); exit;
        } else {
            echo json_encode(["user_not_exist"=>"user does not exist"]); exit;
        }
    } else {
        echo json_encode(["failure"=>"Either value Not Set"]); exit;
    }
}


// ==========================/
// change password==========|
// ==========================\

if (isset($_POST["changePass"])) {
    session_start();
    $email = $_SESSION['admin_email'];
    $old_ = md5($_POST["change-password-old-password"]);
    $new_ = md5($_POST["change-password-new-password"]);
    $db->select("admin","admin_password",null,"admin_email='{$email}' AND admin_password='{$old_}'",null,null);
    $res = $db->getResult();
    $key = $res[0][0];
    if (key_exists("admin_password", $key)) {
        
        if ($db->update("admin",array("admin_password"=>$new_), "admin_email='{$email}' AND admin_password='{$old_}'")) {
            $db->getResult();
            echo json_encode(array("success"=>"Record Updated")); exit;
        } else {
            echo json_encode(array("failure"=>"Record Not Updated")); exit;
        }
    } else {
        echo json_encode(array("pass_not_match"=>"password Not Matched")); exit;
    }
}

