<?php 
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();

session_start();
require_once('../db/connect.php');
extract($_POST);


// $check_if_exist = $conn->query("select * from tbl_model where model='$model'  and is_active='$is_active' and model_id='$model_id' ")->num_rows ;
// $check_if_exist1 = $conn->query("select * from tbl_model where model='$model' and model_id!='$model_id'")->num_rows ;


// if($check_if_exist >0)
// {
//     $resp['status'] = 'failed';
//     $resp['msg'] = 'No Changes Made!';


// }else if($check_if_exist1 >0 ){

//     $resp['status'] = 'failed';
//     $resp['msg'] = 'Model Already Exist!'; 

// }
// else
// {


$update = $conn->query("UPDATE `tbl_request` set `request_status` = '7', `reason_cancelled` = '$reason' , `cancelled_by` = '{$_SESSION['name']}', `date_cancelled` = '{$datetime->format('Y-m-d H:i')}' where control_no = '{$control_no}'");
if($update){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully Cancelled Request!';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}
// }

echo json_encode($resp);