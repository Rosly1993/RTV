<?php
include('../db/connect.php');

if (isset($_POST['search'])) {
  $month1 = $_POST['month'];
  $model = $_POST['model'];

  $query_table = mysqli_query($conn, "SELECT * FROM (SELECT
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
  WHERE date_requested = '".$month1."' AND request_status = '11' AND model = '".$model."'");

} elseif (isset($_POST['search-week'])) {
  $dateweek = $_POST['dateweek'];
  $formattedDate = date('Y-m-d', strtotime($dateweek));
  $newDate = date('Y-m-d', strtotime($dateweek . ' + 7 days'));

  $query_table = mysqli_query($conn, "SELECT * FROM (SELECT
    control_no,
    tbl_request.id,
    -- DATE_FORMAT(date_requested, '%Y-%m') as date_requested,
    DATE_FORMAT(date_requested,'Y-m-d') as date_requested,
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
  where date_requested between '$formattedDate' and '$newDate' order by  date_requested ASC
  ) a
  WHERE  request_status = '11'");


} else {
  $month = date('M-Y');

  $query_table = mysqli_query($conn, "SELECT
    control_no,
    tbl_request.id,
    date_requested,
    date_requested as abc,
    division,
    section,
    supplier,
    tbl_model.model, 
    is_number,
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
  WHERE request_status = '11' AND month_req = '".$month."' LIMIT 200");
}
?>



<?php
$query = "SELECT * FROM tbl_model "; 
$result = $conn->query($query);
?>