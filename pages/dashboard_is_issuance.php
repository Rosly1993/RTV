<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php include'../components/dashboard_body.php';?>
<?php $type=$_SESSION['user_role'];?>
<?php $area=$_SESSION['area'];?>
<?php include('../db/connect.php');?>
<style>
        #authors-tbl tbody tr:hover {
            background-color: #7D7C7C;
            color: white; /* Change this to your desired highlight color */
        }
    </style>


<?php
$query_page1=mysqli_query($conn, "SELECT * from tbl_pages where page_name='Is_Issuance' ");
while($rows=mysqli_fetch_array($query_page1)){ 
$page1=$rows['is_active'];
} 
?>
    

    <?php if($page1 =='1'){?>  

<div class="container-fluid py-4">
      <div class="row">
      <div class="col-md-12" id="msg"></div>
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>IS Number Issuance Info table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="authors-tbl"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      
                     
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Date Requested</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>Control #</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>model</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>item code</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>letter code</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>quantity</th>
                      <th class="text-uppercase" style='height:50px;background-color:#454545;color:white'>remarks</th>
                      <th class="text-center text-uppercase" style='height:50px;background-color:#454545;color:white'>requestor</th>
                      <?php if ($type=="Requestor" || $type=="Admin"){ ?>
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
          
          <?php if ($type=="Requestor" || $type=="Admin"){ ?>
     

      <?php include('../modals/edit_is_issuance.php'); ?><?php }else { ?><?php }	?>
      
      <?php include'../components/footer.php';?> 


      <script src="../js/is_issuance.js"></script>   