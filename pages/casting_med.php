<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php include'../components/dashboard_body.php';?>
<?php include('../db/connect.php');
$name=$_SESSION['name'];
$type=$_SESSION['area']; 


//get details
$query_details=mysqli_query($conn, "SELECT  tbl_request.control_no,tbl_request.requestor,tbl_model.model,
tbl_request.letter_code,tbl_request.item_code,tbl_request.reviewed_by,tbl_request.mfi_med,tbl_request.prod_manager,tbl_request.efi_sup from  tbl_request
inner join tbl_model on tbl_request.model_id=tbl_model.model_id where control_no='" . $_GET['control_no'] . "' ");
while($rows_det=mysqli_fetch_array($query_details)){ 
$ctrl=$rows_det['control_no'];
$req=$rows_det['requestor'];
$let_code=$rows_det['letter_code'];
$item_co=$rows_det['item_code'];
$mod=$rows_det['model'];
$rev_by=$rows_det['reviewed_by'];
$med_by=$rows_det['mfi_med'];
$manager=$rows_det['prod_manager'];
$sup=$rows_det['efi_sup'];

} 

//get sum
$query1=mysqli_query($conn, "SELECT  sum(qty) as qty from  tbl_request where control_no='" . $_GET['control_no'] . "' ");
while($rows1=mysqli_fetch_array($query1)){ 
$qty=$rows1['qty'];} 


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
 
    

     
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Total Requested Quantity - <b style='color:red;font-size:20px'><?php echo $qty; ?></b></h6>
              </div>
            </div>
            <div class="table-responsive">
            <table  id="myTable" class="table align-items-center mb-0"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                  
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Requested</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Control #</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Model</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Item Code</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Letter Code</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Defect Location</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Defect Description</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Quantity</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Remarks</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Requestor</th>
                   

                    </tr>
                  </thead>
                  <?php while($row4=mysqli_fetch_array($query_table)){ ?>  
                    
                    <tr>

                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_requested']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['control_no']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['model']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['item_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['letter_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['location']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['description']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['qty']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['remarks']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['requestor']; ?></td>
                        </tr>
                       
                    <?php }?>

                </table>
                <form action='' method='POST'>
                  
                  
                <div style="float: left;">
                <?php if($qty > 0 && $type=='admin' || $qty > 0 && $type=='MED-Casting') {?>
                <input type='submit'class="btn bg-gradient-success"style="width:150px" value='Accept' name='ACCEPT'>&nbsp;
                <!-- <input type='submit'class="btn bg-gradient-danger"style="width:140px" value='Reject' name='REJECT'> -->
                <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                 Reject
                </button>
                <?php }else { ?><?php }	?>
              </div>

                
                </form>
            </div>
          </div>
        </div>
       
               



<?php include'../components/footer.php';?>
<?php include('../modals/reject_modal.php'); ?> 

<script src="../js/reviewer.js"></script> 

<link href="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type='text/javascript'></script>

   <!-- accept -->
   <?php include ('../db/connect.php');
   date_default_timezone_set("Asia/Manila");
   $datetime = new DateTime();
   $time=$datetime->format('Y-m-d H:i');

    if(isset($_POST['ACCEPT'])){
    $query = $conn->query("update  tbl_request set request_status='6', casting_med='".$name."', date_casting_med='".$time."'  where  control_no='" . $_GET['control_no'] . "' ");
    include('../mail/casting_done.php');
    if($query){
    echo "<script>
    swal({
    title: 'Successfully Accepeted Request!',
    text: 'Redirecting in 3 seconds.',
    type: 'success',
    timer: 3000,
    showConfirmButton: false
    }, function(){
    window.location.href = 'dashboard_casting_med'; 
    });
    </script>"; 
    }else{
    echo 'error'.$conn->error;}} ?>



   <!-- reject -->
   <?php include ('../db/connect.php');
   date_default_timezone_set("Asia/Manila");
   $datetime = new DateTime();
   $time=$datetime->format('Y-m-d H:i');

    if(isset($_POST['REJECT'])){
    $remarks=$_POST['remarks'];
    $query = $conn->query("update  tbl_request set warehouse_remarks='".$remarks."',request_status='16', rejected_by='".$name."', date_rejected='".$time."'  where  control_no='" . $_GET['control_no'] . "' ");
    include('../mail/review_rejected.php');
    if($query){
    echo "<script>
    swal({
    title: 'Successfully Rejected Request!',
    text: 'Redirecting in 3 seconds.',
    type: 'warning',
    timer: 3000,
    showConfirmButton: false
    }, function(){
    window.location.href = 'dashboard_casting_med'; 
    });
    </script>"; 
    }else{
    echo 'error'.$conn->error;}} ?>