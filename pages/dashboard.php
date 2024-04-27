<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php include'../components/dashboard_body.php';?>
<?php include'../controller/dashboard.php';?>

<?php
$query_page1=mysqli_query($conn, "SELECT * from tbl_pages where page_name='Mfi_GL' ");
while($rows=mysqli_fetch_array($query_page1)){ 
$page1=$rows['is_active'];
} 
?>

<?php $type=$_SESSION['user_role'];?>
<style>
        #myTable tbody tr:hover {
            background-color: #7D7C7C;
            color: white; /* Change this to your desired highlight color */
        }
    </style> 
<?php if($page1 =='1'){?>
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">For Review MFI-GL Info Table</h6>
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
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Remarks</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Requestor</th>
                     
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>View</th>
                     
                    </tr>
                  </thead>
                  <?php while($row4=mysqli_fetch_array($query_table)){ ?>  
                    
                    <tr>

                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_requested']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['control_no']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['model']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['item_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['letter_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['remarks']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['requestor']; ?></td>
                        
                          <td class="px-1 py-1 text-center"><a href="reviewer?control_no=<?php echo $row4["control_no"]; ?>"><i class="ni ni-settings"></i></a></td>
                          <!-- Mold Shots -->
                       

                        </tr>
                       
                       
                    <?php }?>

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



<?php include'../components/footer.php';?> 

<script src="../js/dashboard.js"></script> 

<link href="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type='text/javascript'></script>