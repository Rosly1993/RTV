<?php

// include_once("../db_connection/connect2.php");
include_once("../db/connect.php");

if(isset($_POST["export"])){

	
$month1 = $_POST['month'];

// Convert the date to a DateTime object
$dateObject = new DateTime();

// Format the date as 'Ym'
$formattedDate = $dateObject->format('Ym');

  $orderQuery = "SELECT * FROM (SELECT
  control_no,
  tbl_request.id,
 
  DATE_FORMAT(date_requested, '%Y-%m') as date_requested,
  date_requested as abc,
  division,
  section,
  supplier,
  tbl_model.model, 
  request_status, 
  item_code,
  letter_code,
  remarks,
  requestor,
  tbl_description.description,
  tbl_location.location,
  qty,
  reviewed_by,
  date_reviewed,
  mfi_med,
  date_mfi_med,
  is_number,
  efi_sup,
  date_efi_sup,
  prod_manager,
  date_prod_manager,
  casting_med,
  warehouse,
  date_warehouse,
  date_casting_med
FROM
  tbl_request
INNER JOIN tbl_model ON tbl_request.model_id = tbl_model.model_id
INNER JOIN tbl_description ON tbl_request.defect_description = tbl_description.id
INNER JOIN tbl_location ON tbl_request.defect_location = tbl_location.id
) a
WHERE date_requested = '".$month1."' AND request_status = '11' 
 ";


  $orderResult = mysqli_query($conn, $orderQuery) or die("database error:". mysqli_error($conn));
  $filterOrders = array();
  while( $order = mysqli_fetch_assoc($orderResult) ) {
	$filterOrders[] = $order;
  }
  if(count($filterOrders)) {
	  $fileName = "Parts_RTV_".$formattedDate. ".csv";
	  header("Content-Description: File Transfer");
	  header("Content-Disposition: attachment; filename=$fileName");
	  header("Content-Type: application/csv;");
	  $file = fopen('php://output', 'w');
	  $header = array("Date Requested", "Control #","IS #", "Model", "Item Code", "Letter Code","Location","Defect","Quantity", "Remarks", "Requestor", "Reviewed By", "Date Reviewed", "MED MFI", "Date Noted", "Noted By EFI Sup.", "Date Noted","Prod Manager","Date Approved","Casting MED","Date Approved","Warehouse","Date Approved");
	  fputcsv($file, $header);  
	  foreach($filterOrders as $order) {
	   $orderData = array();
	   $orderData[] = $order["abc"];
	   $orderData[] = $order["control_no"];
	   $orderData[] = $order["is_number"];
	   $orderData[] = $order["model"];
	   $orderData[] = $order["item_code"];
	   $orderData[] = $order["letter_code"];
	   $orderData[] = $order["location"];
	   $orderData[] = $order["description"];
	   $orderData[] = $order["qty"];
	   $orderData[] = $order["remarks"];
	   $orderData[] = $order["requestor"];
	   $orderData[] = $order["reviewed_by"];
	   $orderData[] = $order["date_reviewed"];
	   $orderData[] = $order["mfi_med"];
	   $orderData[] = $order["date_mfi_med"];
	   $orderData[] = $order["efi_sup"];
	   $orderData[] = $order["date_efi_sup"];
	   $orderData[] = $order["prod_manager"];
	   $orderData[] = $order["date_prod_manager"];
	   $orderData[] = $order["casting_med"];
	   $orderData[] = $order["date_casting_med"];
	   $orderData[] = $order["warehouse"];
	   $orderData[] = $order["date_warehouse"];
	
	   
	   fputcsv($file, $orderData);
	  }
	  fclose($file);
	  exit;
  } else {
	 $noResult = '<label class="text-danger">There are no record exist with this date range to export. Please choose different date range.</label>';  
  }
 }

?>