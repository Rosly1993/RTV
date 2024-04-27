
<?php
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();  

session_start();
include ('../db/connect.php');
extract($_POST);

$check_if_exist = $conn->query("select * from tbl_model where model='$model'")->num_rows ;

if($check_if_exist > 0)
{
    $resp['status'] = 'failed';
    $resp['msg'] = 'Model Already Existed!';   

}else{

$query = $conn->query("INSERT INTO `tbl_model` (`model`,`is_active`,`date_created`,`created_by`) VALUE ('{$model}','1','{$datetime->format('Y-m-d H:i')}','{$_SESSION['name']}')");

if($query){
    $resp['status'] = 'success';
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}}

echo json_encode($resp);