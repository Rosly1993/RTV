
<?php
date_default_timezone_set("Asia/Manila");
$datetime = new DateTime();  

$month=date('M-Y');

session_start();
include ('../db/connect.php');
extract($_POST);

//get letter code
$query1=mysqli_query($conn, "SELECT  * from  tbl_item_code where model_id = '{$model_id}' and item_code = '{$item_code}' ");
while($rows1=mysqli_fetch_array($query1)){ 
$letter_code=$rows1['letter_code'];
}

//Get the Control number
// $query2 = "SELECT COUNT(DISTINCT control_no) as request_id FROM tbl_request where month_req='$month' ";
// $result2 = mysqli_query($conn,$query2);
// $row = mysqli_fetch_array($result2);
// $query2=mysqli_query($conn, "SELECT COUNT(DISTINCT control_no) as request_id FROM tbl_request where month_req='$month'  ");
$query2=mysqli_query($conn, "SELECT COUNT(DISTINCT control_no) as request_id FROM tbl_request  ");
while($rows1=mysqli_fetch_array($query2)){ 
$ctrl=$rows1['request_id'];
}

if($ctrl ==0){

    $ctrl1 = "1";
}else{

    $ctrl1=$ctrl + 1;

}

    $new_cc=$month."-Ctrl-".$ctrl1;


for ($a = 0; $a < count($_POST["defect_location"]); $a++)
{
   


// $check_if_exist = $conn->query("select * from tbl_model where model='$model'")->num_rows ;

// if($check_if_exist > 0)
// {
//     $resp['status'] = 'failed';
//     $resp['msg'] = 'Model Already Existed!';   

// }else{

$query = $conn->query("INSERT INTO `tbl_request` (`control_no`,`date_requested`,`division`,`section`,`supplier`,`model_id`,`item_code`,`letter_code`,`remarks`,`requestor`,`request_status`,`month_req`,`defect_location`,`defect_description`,`qty`) VALUE ('{$new_cc}','{$datetime->format('Y-m-d H:i')}','{$division}','{$section}','{$supplier}','{$model_id}','{$item_code}','{$letter_code}','{$remarks}','{$requestor}','1','{$month}','" . $_POST["defect_location"][$a] . "','" . $_POST["defect_description"][$a] . "','" . $_POST["qty"][$a] . "')");
// include('../mail/request.php');

if($query){
    $resp['status'] = 'success';
    // include('../mail/activate.php');
}else{
    $resp['status'] = 'failed';
    $resp['msg'] = 'An error occured while saving the data. Error: '.$conn->error;
}
}

echo json_encode($resp);