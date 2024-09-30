<?php
    // header("Content-Type: application/json");
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    // ob_start();
    include("Database.php");
    if (isset($_POST["addAdmin"])) {
        // echo json_encode(array("default"=>"this is default response from add admin"));
        if (isset($_POST["add-admin-first-name"]) && isset($_POST["add-admin-last-name"]) && isset($_POST["add-admin-email"]) && isset($_POST["add-admin-username"]) && isset($_POST["add-admin-password"]) && isset($_POST["add-admin-phone-no"]) && isset($_POST["add-admin-city"])) {
            $db = new Database();
            // die("is setted");
            $fname = $_POST["add-admin-first-name"];
            $lname = $_POST["add-admin-last-name"];
            $email = $_POST["add-admin-email"];
            $username = $_POST["add-admin-username"];
            $password = md5($_POST["add-admin-password"]);
            $phone = $_POST["add-admin-phone-no"];
            $city = $_POST["add-admin-city"];
            $fname = $db->escapeString($fname);
            $lname = $db->escapeString($lname);
            $username = $db->escapeString($username);
            $phone=$db->escapeString($phone);
            $city=$db->escapeString($city);
            if ($db->insert("admin",array("first_name"=>$fname,"last_name"=>$lname,"user_name"=>$username,"admin_email"=>$email,"admin_password"=>$password,"admin_ph_no"=>$phone,"admin_city"=>$city))) {
                $result = $db->getResult();
                if (is_numeric($result[0])) {
                    echo json_encode(array("success"=>"Admin Inserted Successfully!")); exit;
                } else {
                    echo json_encode(array("failure"=>"Failed to Add Admin!")); exit;
                }
            } else {
                echo json_encode(array("insert_fail"=>"failed to insert")); exit;
            }
        } else {
            echo json_encode(array("key_not_set"=>"key does not exist")); exit;
        }
    } else {
        echo json_encode(array("error"=>"form not found")); exit;
    }

    // header("Content-Type: application/json");
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    // ob_start();
    
    // if (isset($_POST["addAdmin"])) {
    //     if (isset($_POST["add-admin-first-name"]) && isset($_POST["add-admin-last-name"]) && isset($_POST["add-admin-email"]) && isset($_POST["add-admin-username"]) && isset($_POST["add-admin-password"]) && isset($_POST["add-admin-phone-no"]) && isset($_POST["add-admin-city"])) {
    //         $db = new Database();
    //         $fname = $_POST["add-admin-first-name"];
    //         $lname = $_POST["add-admin-last-name"];
    //         $email = $_POST["add-admin-email"];
    //         $username = $_POST["add-admin-username"];
    //         $password = md5($_POST["add-admin-password"]);
    //         $phone = $_POST["add-admin-phone-no"];
    //         $city = $_POST["add-admin-city"];
    //         $fname = $db->escapeString($fname);
    //         $lname = $db->escapeString($lname);
    //         $email = $db->escapeString($email);
    //         $username = $db->escapeString($username);
    //         $password = $db->escapeString($password);
    //         $phone = $db->escapeString($phone);
    //         $city = $db->escapeString($city);
    
    //         // Attempt to insert into the database
    //         if ($db->insert("admin", array(
    //             "first_name" => $fname,
    //             "last_name" => $lname,
    //             "user_name" => $username,
    //             "admin_email" => $email,
    //             "admin_password" => $password,
    //             "admin_ph_no" => $phone,
    //             "admin_city" => $city
    //         ))) {
    //             $result = $db->getResult();
    //             if (!empty($result)) {
    //                 echo json_encode(array("success" => "Admin Inserted Successfully!"));
    //                 exit;
    //             } else {
    //                 echo json_encode(array("failure" => "Failed to Add Admin!"));
    //                 exit;
    //             }
    //         } else {
    //             echo json_encode(array("insert_fail" => "Failed to insert"));
    //             exit;
    //         }
    //     } else {
    //         echo json_encode(array("key_not_set" => "Key does not exist"));
    //         exit;
    //     }
    // } else {
    //     echo json_encode(array("error" => "Form not found"));
    //     exit;
    // }
    
    // ob_end_flush();
    // echo json_encode(array("success" => "This is a test response"));
    ?>
