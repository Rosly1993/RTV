<?php
require_once('../db/connect.php');
extract($_POST);
$query = $conn->query("SELECT * FROM tbl_model where model_id = '{$model_id}'");

if($query){
    $resp['status'] = 'success';
    $resp['data'] = $query->fetch_array();
}else{
    $resp['status'] = 'success';
    $resp['error'] = 'An error occured while fetching the data. Error: '.$conn->error;
}
echo json_encode($resp);
