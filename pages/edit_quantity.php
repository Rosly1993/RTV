<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php $type=$_SESSION['user_role'];?>
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
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Model </th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Item Code</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Letter Code</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Defect Location </th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Defect Description </th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Quantity </th>

                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Remarks</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Requestor</th>
                      <!-- <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Status</th> -->
                      <?php if ($type=="Admin" || $type=="Requestor"){ ?>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Action</th>
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
      <?php if ($type=="Admin" || $type=="Requestor"){ ?>


      <?php include('../modals/edit_request_quantity.php'); ?><?php }else { ?><?php }	?>
      
      <?php include'../components/footer.php';?> 


      <script src="../js/edit_quantity.js"></script>   