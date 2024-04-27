<?php
require_once('../db/connect.php');
extract($_POST);
$query = $conn->query("SELECT
                        tbl_model.model, 
                        tbl_item_code.id,
                        tbl_item_code.item_code,
                        tbl_item_code.letter_code,
                        tbl_item_code.created_by,
                        tbl_item_code.date_created,
                        tbl_item_code.updated_by,
                        tbl_item_code.date_updated,
                        tbl_item_code.is_active
                        FROM
                        `tbl_item_code`
                        inner join tbl_model on tbl_item_code.model_id=tbl_model.model_id  where id = '{$id}'");

if($query){
    $resp['status'] = 'success';
    $resp['data'] = $query->fetch_array();
}else{
    $resp['status'] = 'success';
    $resp['error'] = 'An error occured while fetching the data. Error: '.$conn->error;
}
echo json_encode($resp);
