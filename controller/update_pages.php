<?php 
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();

session_start();
require_once('../db/connect.php');
extract($_POST);


$check_if_exist = $conn->query("select * from tbl_pages where page_name='$page_name'  and is_active='$is_active' and id='$id' ")->num_rows ;


if($check_if_exist >0)
{
    $resp['status'] = 'failed';
    $resp['msg'] = 'No Changes Made!';


}
else
{


$update = $conn->query("UPDATE `tbl_pages` set `is_active` = '$is_active' , `updated_by` = '{$_SESSION['name']}', `date_update` = '{$datetime->format('Y-m-d H:i')}' where id = '{$id}'");
if($update){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully Update Page!';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}}

echo json_encode($resp);