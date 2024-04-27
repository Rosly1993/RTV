<?php 
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();

session_start();
require_once('../db/connect.php');
extract($_POST);


$check_if_exist = $conn->query("select * from tbl_description where description='$description'  and is_active='$is_active' and id='$id' ")->num_rows ;
$check_if_exist1 = $conn->query("select * from tbl_description where description='$description' and id!='$id'")->num_rows ;


if($check_if_exist >0)
{
    $resp['status'] = 'failed';
    $resp['msg'] = 'No Changes Made!';


}else if($check_if_exist1 >0 ){

    $resp['status'] = 'failed';
    $resp['msg'] = 'Description Already Exist!';

}
else
{


$update = $conn->query("UPDATE `tbl_description` set `description` = '$description', `is_active` = '$is_active' , `updated_by` = '{$_SESSION['name']}', `date_updated` = '{$datetime->format('Y-m-d H:i')}' where id = '{$id}'");
if($update){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully Update Description Defect Info!';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}}

echo json_encode($resp);