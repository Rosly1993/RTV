<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php include'../components/dashboard_body.php';?>
<?php include'../controller/reviewer.php';?>

 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

     
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Total Requested Quantity - <b style='color:red;font-size:20px'><?php echo $qty; ?>  </b></h6>
              </div>
            </div>
            <div class="table-responsive">
          <form action='' method='POST'>
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

                        <input type='hidden' value='<?php echo $row4['model']; ?>' name='model'>
                       
                    <?php }?>

                   </table>
                
                  
                  
                  <div style="float: left;">
                  <?php if($qty > 0 && $type=='Admin' || $qty > 0 && $type=='Reviewer') {?>
                  <input type='submit'class="btn bg-gradient-success"style="width:150px" value='Approve' name='ACCEPT'>&nbsp;
                  <!-- <input type='submit'class="btn bg-gradient-danger"style="width:140px" value='Reject' name='REJECT'> -->
                   <!-- Button trigger modal -->
                 <button type="button" class="btn bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                 Reject
                </button>
                  <?php }else { ?><?php }	?>
                </div>
             



                
                </form>
            </div>
          </div>
        </div>

        <!-- Button trigger modal -->



               



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
    $query = $conn->query("update  tbl_request set request_status='2', reviewed_by='".$name."', date_reviewed='".$time."'  where  control_no='" . $_GET['control_no'] . "' ");
    include('../mail/review_done.php');
    if($query){

    echo "<script>
    swal({
    title: 'Successfully Accepted Request!',
    text: 'Redirecting in 3 seconds.',
    type: 'success',
    timer: 500,
    showConfirmButton: false
    }, function(){
    window.location.href = 'dashboard'; 
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
    $query = $conn->query("update  tbl_request set warehouse_remarks='".$remarks."',request_status='8', rejected_by='".$name."', date_rejected='".$time."'  where  control_no='" . $_GET['control_no'] . "' ");
    include('../mail/review_rejected.php');
    if($query){
    echo "<script>
    swal({
    title: 'Successfully Rejected Request!',
    text: 'Redirecting in 3 seconds.',
    type: 'warning',
    timer: 500,
    showConfirmButton: false
    }, function(){
    window.location.href = 'dashboard'; 
    });
    </script>"; 
    }else{
    echo 'error'.$conn->error;}} ?>