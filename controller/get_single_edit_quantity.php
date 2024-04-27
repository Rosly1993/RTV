<?php
require_once('../db/connect.php');
extract($_POST);
$query = $conn->query("SELECT
tbl_request.id,
tbl_request.date_requested,
tbl_request.control_no,
tbl_request.remarks,
tbl_request.division,
tbl_request.section,
tbl_request.supplier,
tbl_request.item_code,
tbl_request.letter_code,
SUM(tbl_request.qty) as qty,
tbl_request.is_number,
tbl_request.requestor,
tbl_model.model,
tbl_location.location,
tbl_description.description 
FROM
tbl_request
INNER JOIN tbl_model ON tbl_request.model_id = tbl_model.model_id
INNER JOIN tbl_description ON tbl_request.defect_description = tbl_description.id
INNER JOIN tbl_location ON tbl_request.defect_location = tbl_location.id where tbl_request.control_no = '{$control_no}'");

if($query){
    $resp['status'] = 'success';
    $resp['data'] = $query->fetch_array();
}else{
    $resp['status'] = 'success';
    $resp['error'] = 'An error occured while fetching the data. Error: '.$conn->error;
}
echo json_encode($resp);
