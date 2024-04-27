<?php
require_once('../db/connect.php');
extract($_POST);
$query = $conn->query("SELECT *,tbl_model.model FROM tbl_request inner join tbl_model on tbl_request.model_id=tbl_model.model_id where id = '{$id}'");

if($query){
    $resp['status'] = 'success';
    $resp['data'] = $query->fetch_array();
}else{
    $resp['status'] = 'success';
    $resp['error'] = 'An error occured while fetching the data. Error: '.$conn->error;
}
echo json_encode($resp);
