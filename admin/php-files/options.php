<?php 
include "Database.php";
$db = new Database();
if (isset($_POST["options_update"])) {
    $options_id = $_POST["options-id"];
    $site_name = $_POST["options-site-name"];
    $site_title = $_POST["options-site-title"];
    $site_description = $_POST["options-site-description"];
    $site_email = $_POST["options-site-email"];
    $site_contact = $_POST["options-contact"];
    $site_file_name = $_FILES["options-logo"]["name"];
    $site_footer_text = $_POST["options-footer-text"];
    $site_currency_form = $_POST["options-currency-format"];
    $site_address = $_POST["options-current-address"];
    $options_old_logo = $_POST["options-logo-old-image"];

    $options_update = array();
    if ($site_name != "") {
        $options_update["site_name"] = $site_name;
    }
    if ($site_title != "") {
        $options_update["site_title"] = $site_title;
    }
    if ($site_description != "") {
        $options_update["site_description"] = $site_description;
    }
    if ($site_email != "") {
        $options_update["site_email"] = $site_email;
    }
    if ($site_contact != "") {
        $options_update["site_contact"] = $site_contact;
    }
    if ($site_file_name != "") {
        $options_update["site_logo"] = $site_file_name;
        $site_file_tmp_name = $_FILES["options-logo"]["tmp_name"];
        unlink("../../uploads/logo/$options_old_logo");
        move_uploaded_file($site_file_tmp_name, "../../uploads/logo/$site_file_name");
        
    }
    if ($site_footer_text != "") {
        $options_update["site_footer_text"] = $site_footer_text;
    }
    if ($site_currency_form != "") {
        $options_update["site_currency_format"] = $site_currency_form;
    }
    if ($site_address != "") {
        $options_update["site_current_address"] = $site_address;
    }

    

    

    $db->update("options", $options_update, "option_id = $options_id");
    $row = $db->getResult();
    if ($row[0] > 0) {
        echo json_encode(["success"=>"options updated successfully"]);
        exit;
    } else {
        echo json_encode(["failure"=>"failed to update options"]);
        exit;
    }
}