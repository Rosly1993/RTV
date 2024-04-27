<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php $type=$_SESSION['user_role'];?>
<?php
$query_page1=mysqli_query($conn, "SELECT * from tbl_pages where page_name='Request_Form' ");
while($rows=mysqli_fetch_array($query_page1)){ 
$page1=$rows['is_active'];
} 
?>



<?php if($page1 =='1'){?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
      <div class="col-md-12" id="msg"></div>
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Request Info table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="authors-tbl"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                     
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Date Requested</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Control #</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Model Name</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Item Code</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Letter Code</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Remarks</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Requestor</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Total Quantity</th>
                      <!-- <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Status</th> -->
                      <?php if ($type=="Admin" || $type=="Requestor"){ ?>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Cancel Request</th>
                      <?php }else { ?>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'></th><?php }	?>
                    </tr>
                  </thead> 
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <?php }else{?>
 <!-- End Navbar -->
 <div class="container-fluid py-4">
      <div class="row">
      <div class="col-md-12" id="msg"></div>
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 style="color: red">Application is not available at this moment! Please contact administrator.</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                    
                    </tr>
                  </thead> 
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <?php }?>

  
      <?php if ($type=="Admin" || $type=="Requestor"){ ?> 
      <?php include('../modals/add_request.php'); ?> 

      <?php include('../modals/edit_request.php'); ?><?php }else { ?><?php }	?>
      
      <?php include'../components/footer.php';?> 


      <script src="../js/request_form.js"></script>   