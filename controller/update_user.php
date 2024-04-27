<?php 
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();

session_start();
require_once('../db/connect.php');
extract($_POST);


$check_if_exist = $conn->query("select * from tbl_user where name='$name'  and user_name='$user_name'  and password='$password' and area='$area' and user_role='$user_role' and email_address='$email_address' and is_active='$is_active'  ")->num_rows ;


if($check_if_exist >0)
{
    $resp['status'] = 'failed';
    $resp['msg'] = 'No Changes Made!';
} elseif ($user_name === $password) {
    $resp['status'] = 'failed';
    $resp['msg'] = 'Username and password cannot be the same. Please choose different ones.';
} else {





$update = $conn->query("UPDATE `tbl_user` set `name` = '$name',`user_name` = '$user_name',`password` = '$password',`area` = '$area',`user_role` = '$user_role', `email_address` = '{$email_address}', `is_active` = '{$is_active}' where id = '{$id}'");

include('../mail/activate.php');

if($update){
    $resp['status'] = 'success';
    $resp['msg'] = 'Successfully Update User Info!';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}}

echo json_encode($resp);