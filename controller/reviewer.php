<?php include('../db/connect.php');
$name=$_SESSION['name'];
$type=$_SESSION['user_role']; 


//get details
$query_details=mysqli_query($conn, "SELECT  tbl_request.control_no,tbl_request.requestor,tbl_model.model,
tbl_request.letter_code,tbl_request.item_code,tbl_request.reviewed_by from  tbl_request
inner join tbl_model on tbl_request.model_id=tbl_model.model_id where control_no='" . $_GET['control_no'] . "' ");
while($rows_det=mysqli_fetch_array($query_details)){ 
$ctrl=$rows_det['control_no'];
$req=$rows_det['requestor'];
$let_code=$rows_det['letter_code'];
$item_co=$rows_det['item_code'];
$mod=$rows_det['model'];


} 
//get sum
$query1=mysqli_query($conn, "SELECT  sum(qty) as qty from  tbl_request where control_no='" . $_GET['control_no'] . "' ");
while($rows1=mysqli_fetch_array($query1)){ 
$qty=$rows1['qty'];

} 


$query_table=mysqli_query($conn, "SELECT
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
where  control_no='" . $_GET['control_no'] . "' ");
?> 