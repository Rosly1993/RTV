<?php 
require_once("../db/connect.php");
extract($_POST);
session_start();
$role= ($_SESSION['user_role']);

$totalCount = $conn->query("SELECT
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
							inner join tbl_model on tbl_item_code.model_id=tbl_model.model_id")->num_rows;

// echo $totalCount;
$search_where = "";
$limits  ="";
if(!empty($search)){
    $search_where = "";
    $search_where .= " model LIKE '%{$search['value']}%' ";
    // $search_where .= " OR user_name LIKE '%{$search['value']}%' ";
    // $search_where .= " OR area LIKE '%{$search['value']}%' ";
    // $search_where .= " OR user_role LIKE '%{$search['value']}%' ";
    // $search_where .= " OR email_address LIKE '%{$search['value']}%' ";
 
}
$columns_arr = array("id",
                     "model",
                    //  "user_name",
                    //  "area",
                    //  "user_role",
                    //  "email_address",
                    );
 if($length != -1){
 $limits ='limit '.$length.' offset '.$start;
 }                    

$query = $conn->query("SELECT
                        '$role' as role1,
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
						inner join tbl_model on tbl_item_code.model_id=tbl_model.model_id  where  ({$search_where}) ORDER BY model ASC,  {$columns_arr[$order[0]['column']]} {$order[0]['dir']} {$limits}");

$recordsFilterCount = $conn->query("SELECT
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
						inner join tbl_model on tbl_item_code.model_id=tbl_model.model_id  where   ({$search_where}) ")->num_rows;

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
