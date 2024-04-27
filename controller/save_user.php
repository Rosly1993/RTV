<?php
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();  

session_start();
include ('../db/connect.php');
extract($_POST);

$check_if_exist = $conn->query("SELECT * FROM tbl_user WHERE user_name='$user_name'")->num_rows;

if ($check_if_exist > 0) {
    $resp['status'] = 'failed';
    $resp['msg'] = 'Username Already Taken!';   
} elseif ($user_name === $password) {
    $resp['status'] = 'failed';
    $resp['msg'] = 'Username and password cannot be the same. Please choose different ones.';
} else {
    $query = $conn->query("INSERT INTO `tbl_user` (`name`, `user_name`, `password`, `area`, `user_role`, `is_active`, `email_address`, `profile`) VALUES ('{$name}', '{$user_name}', '{$password}', '{$area}', '{$user_role}', '1', '{$email_address}', 'PROFILE.png')");

    if ($query) {
        $resp['status'] = 'success';
    } else {
        $resp['status'] = 'failed';
        $resp['msg'] = 'An error occurred while saving the data. Error: '.$conn->error;
    }
}

echo json_encode($resp);
?>
