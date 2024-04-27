<?php 
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();

session_start();
require_once('../db/connect.php');
extract($_POST);





$update = $conn->query("UPDATE `tbl_request` set `request_status` = '10', `is_number` = '$is_number' where control_no = '{$control_no}'");
if($update){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully Update Info!';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);