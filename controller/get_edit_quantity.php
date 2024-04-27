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
							qty

							FROM
							tbl_request
							inner join tbl_model on tbl_request.model_id=tbl_model.model_id
							inner join tbl_description on tbl_request.defect_description=tbl_description.id
							inner join tbl_location on tbl_request.defect_location=tbl_location.id
							where request_status='1'
							")->num_rows;

// echo $totalCount;
$search_where = "";
$limits  ="";
if(!empty($search)){
    $search_where = "";
    $search_where .= " model LIKE '%{$search['value']}%' ";
    $search_where .= " OR control_no LIKE '%{$search['value']}%' ";
    // $search_where .= " OR user_name LIKE '%{$search['value']}%' ";
    // $search_where .= " OR area LIKE '%{$search['value']}%' ";
    // $search_where .= " OR user_role LIKE '%{$search['value']}%' ";
    // $search_where .= " OR email_address LIKE '%{$search['value']}%' ";
 
}
$columns_arr = array("id",
                     "model",
                     "control_no",
                    //  "area",
                    //  "user_role",
                    //  "email_address",
                    );
 if($length != -1){
 $limits ='limit '.$length.' offset '.$start;
 }                    
//  '$role' as role1,
$query = $conn->query("SELECT
						'$role' as role1,
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
						qty

						FROM
						tbl_request
						inner join tbl_model on tbl_request.model_id=tbl_model.model_id
						inner join tbl_description on tbl_request.defect_description=tbl_description.id
						inner join tbl_location on tbl_request.defect_location=tbl_location.id
						
						where request_status='1' and  ({$search_where})   ORDER BY control_no ASC ,  {$columns_arr[$order[0]['column']]} {$order[0]['dir']} {$limits} ");

$recordsFilterCount = $conn->query("SELECT
					--    '$role' as role1,
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
						qty

						FROM
						tbl_request
						inner join tbl_model on tbl_request.model_id=tbl_model.model_id
						inner join tbl_description on tbl_request.defect_description=tbl_description.id
						inner join tbl_location on tbl_request.defect_location=tbl_location.id where request_status='1' and    ({$search_where}) ")->num_rows;

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
