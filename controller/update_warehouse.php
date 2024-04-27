<?php 
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();

session_start();
require_once('../db/connect.php');
extract($_POST);

if($status_w =='11'){

    $update = $conn->query("UPDATE `tbl_request` set `warehouse_remarks` = '$warehouse_remarks',`request_status` = '$status_w', `is_number` = '$is_number' , `warehouse` = '{$_SESSION['name']}' , `date_warehouse` = '{$datetime->format('Y-m-d H:i')}' where control_no = '{$control_no}'");
}else{

    $update = $conn->query("UPDATE `tbl_request` set `warehouse_remarks` = '$warehouse_remarks',`request_status` = '$status_w', `is_number` = '$is_number' , `rejected_by` = '{$_SESSION['name']}' , `date_rejected` = '{$datetime->format('Y-m-d H:i')}' where control_no = '{$control_no}'");
    include('../mail/rejected_warehouse.php');
}

if($update){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully Update Info!';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}

echo json_encode($resp);