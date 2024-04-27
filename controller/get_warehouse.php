<?php 
require_once("../db/connect.php");
extract($_POST);
session_start();
$role= ($_SESSION['user_role']);

$totalCount = $conn->query("SELECT
control_no,
tbl_request.id,
date_requested,
division,
section,
supplier,
tbl_model.model,
item_code,
letter_code,
remarks,
requestor,
tbl_description.description,
tbl_location.location,
sum(qty) as qty,
reviewed_by,
date_reviewed,
mfi_med,
date_mfi_med,
efi_sup,
date_efi_sup,
prod_manager,
is_number,
date_prod_manager 
FROM
tbl_request
INNER JOIN tbl_model ON tbl_request.model_id = tbl_model.model_id
INNER JOIN tbl_description ON tbl_request.defect_description = tbl_description.id
INNER JOIN tbl_location ON tbl_request.defect_location = tbl_location.id 
WHERE
request_status = '10' 
GROUP BY
control_no")->num_rows;

// echo $totalCount;
$search_where = "";
$limits  ="";
if(!empty($search)){
    $search_where = "";
    $search_where .= " model LIKE '%{$search['value']}%' ";
    $search_where .= " OR control_no LIKE '%{$search['value']}%' ";
    $search_where .= " OR date_requested LIKE '%{$search['value']}%' ";
    $search_where .= " OR item_code LIKE '%{$search['value']}%' ";
    $search_where .= " OR letter_code LIKE '%{$search['value']}%' ";
    $search_where .= " OR is_number LIKE '%{$search['value']}%' ";
 
}
$columns_arr = array("id",
                     "model",
                     "control_no",
                     "date_requested",
                     "item_code",
                     "letter_code",
                     "is_number",
                    );
 if($length != -1){
 $limits ='limit '.$length.' offset '.$start;
 }                    

$query = $conn->query("SELECT
	'$role' as role1,
	control_no,
	tbl_request.id,
	date_requested,
	is_number,
	division,
	section,
	supplier,
	tbl_model.model,
	item_code,
	letter_code,
	remarks,
	requestor,
	tbl_description.description,
	tbl_location.location,
	sum(qty) as qty,
	reviewed_by,
	date_reviewed,
	mfi_med,
	date_mfi_med,
	efi_sup,
	date_efi_sup,
	prod_manager,
	date_prod_manager 
FROM
	tbl_request
	INNER JOIN tbl_model ON tbl_request.model_id = tbl_model.model_id
	INNER JOIN tbl_description ON tbl_request.defect_description = tbl_description.id
	INNER JOIN tbl_location ON tbl_request.defect_location = tbl_location.id  where request_status = '10' and   ({$search_where}) Group by control_no ORDER BY id ASC,  {$columns_arr[$order[0]['column']]} {$order[0]['dir']} {$limits}");

$recordsFilterCount = $conn->query("SELECT
control_no,
tbl_request.id,
date_requested,
division,
is_number,
section,
supplier,
tbl_model.model,
item_code,
letter_code,
remarks,
requestor,
tbl_description.description,
tbl_location.location,
sum(qty) as qty,
reviewed_by,
date_reviewed,
mfi_med,
date_mfi_med,
efi_sup,
date_efi_sup,
prod_manager,
date_prod_manager 
FROM
tbl_request
INNER JOIN tbl_model ON tbl_request.model_id = tbl_model.model_id
INNER JOIN tbl_description ON tbl_request.defect_description = tbl_description.id
INNER JOIN tbl_location ON tbl_request.defect_location = tbl_location.id 
WHERE
request_status = '10'  and   ({$search_where})  Group by control_no")->num_rows;

$recordsTotal= $totalCount;
$recordsFiltered= $recordsFilterCount;
$data = array();
$i= 1 + $start;
while($row = $query->fetch_assoc()){
    $row['no'] = $i++;
    $data[] = $row;
}
echo json_encode(array('draw'=>$draw,
                       'recordsTotal'=>$recordsTotal,
                       'recordsFiltered'=>$recordsFiltered,
                       'data'=>$data
                       )
);
