<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
      <div class="col-md-12" id="msg"></div>
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>User's table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="authors-tbl"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Name</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>User Name</th>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Area</th>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Role</th>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Email Address</th>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Status</th>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>Action</th>
                      <!-- <th class="text-secondary opacity-7"></th> -->
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      
      <?php include('../modals/add_user.php'); ?>
      <?php include('../modals/edit_user.php'); ?>
      
      <?php include'../components/footer.php';?>


      <script src="../js/user.js"></script>   