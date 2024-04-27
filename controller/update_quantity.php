<?php 
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();

session_start();
require_once('../db/connect.php');
extract($_POST);


$check_if_exist = $conn->query("select * from tbl_request where qty='$qty'  and id='$id' ")->num_rows ;
// $check_if_exist1 = $conn->query("select * from tbl_model where model='$model' and model_id!='$model_id'")->num_rows ;


if($check_if_exist >0)
{
    $resp['status'] = 'failed';
    $resp['msg'] = 'No Changes Made!';


// }else if($check_if_exist1 >0 ){

//     $resp['status'] = 'failed';
//     $resp['msg'] = 'Model Already Exist!';

}
else
{


$update = $conn->query("UPDATE `tbl_request` set `qty` = '$qty', `requestor` = '{$_SESSION['name']}', `date_requested` = '{$datetime->format('Y-m-d H:i')}' where id = '{$id}'");
if($update){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully Update Info!';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}
}

echo json_encode($resp);