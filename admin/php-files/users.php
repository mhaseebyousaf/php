<?php 
include "Database.php";
$db = new Database();
// Show user
if (isset($_POST["user_show_id"])) {
    $user_id = $_POST["user_show_id"];
    $db->select("users","*",null,"user_id = $user_id",null,null);
    $row = $db->getResult();
    echo json_encode($row[0]);
}

// Update User Actice Status
if (isset($_POST["status_user_id_"])) {
    $status_user_id = $_POST["status_user_id_"];
    $status_user_active_status = $_POST["status_user_active_status_"];

    $db->update("users",["user_active_status"=>$status_user_active_status],"user_id = $status_user_id");
    $affected_rows = $db->getResult();
    if (!empty($affected_rows)) {
        echo json_encode(["success"=>"successfully changed user active status"]);
        exit;
    } else {
        echo json_encode(["fail"=>"fail to update status"]);
        exit;
    }
}


// Delete user
if (isset($_POST["usr_del_id"])) {
    $u_del_id = $_POST["usr_del_id"];
    $db->delete("users","user_id = $u_del_id");
    $row = $db->getResult();
    if ($row[0] > 0) {
        echo json_encode(["success"=>"user deleted successfully"]);
    }
}