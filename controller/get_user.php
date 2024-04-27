<?php 
require_once("../db/connect.php");
extract($_POST);

$totalCount = $conn->query("SELECT * from `tbl_user` ")->num_rows;

// echo $totalCount;
$search_where = "";
$limits  ="";
if(!empty($search)){
    $search_where = "";
    $search_where .= " name LIKE '%{$search['value']}%' ";
    $search_where .= " OR user_name LIKE '%{$search['value']}%' ";
    $search_where .= " OR area LIKE '%{$search['value']}%' ";
    $search_where .= " OR user_role LIKE '%{$search['value']}%' ";
    $search_where .= " OR email_address LIKE '%{$search['value']}%' ";
 
}
$columns_arr = array("id",
                     "name",
                     "user_name",
                     "area",
                     "user_role",
                     "email_address",
                    );
 if($length != -1){
 $limits ='limit '.$length.' offset '.$start;
 }                    

$query = $conn->query("SELECT * from `tbl_user` where user_role!='Admin' and user_role!='guest'  and ({$search_where}) ORDER BY  {$columns_arr[$order[0]['column']]} {$order[0]['dir']} {$limits}");

$recordsFilterCount = $conn->query("SELECT * from `tbl_user`where   ({$search_where}) ")->num_rows;

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
