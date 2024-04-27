<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php include'../components/dashboard_body.php';?>
<?php $type=$_SESSION['user_role'];?>
<?php $area=$_SESSION['area'];?>
<style>
        #myTable tbody tr:hover {
            background-color: #7D7C7C;
            color: white; /* Change this to your desired highlight color */
        }
    </style> 
<?php include('../db/connect.php');

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
                            qty,
                            reviewed_by,
                            date_reviewed,
                            mfi_med,
                            date_mfi_med,
                            efi_sup,
                            date_efi_sup,
                            prod_manager,
                            date_prod_manager

                            FROM
                            tbl_request
                            inner join tbl_model on tbl_request.model_id=tbl_model.model_id
                            inner join tbl_description on tbl_request.defect_description=tbl_description.id
                            inner join tbl_location on tbl_request.defect_location=tbl_location.id
                            where request_status='5'
                            group by control_no");
                            ?> 
 
 <?php
$query_page1=mysqli_query($conn, "SELECT * from tbl_pages where page_name='Casting_Med' ");
while($rows=mysqli_fetch_array($query_page1)){ 
$page1=$rows['is_active'];
} 
?>
    

    <?php if($page1 =='1'){?>  


     
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">For Confirm Casting-MED Info Table</h6>
              </div>
            </div>
            <div class="table-responsive">
            <table  id="myTable" class="table align-items-center mb-0"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
  
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>View</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Requested</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Control #</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Model</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Item Code</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Letter Code</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Remarks</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Requestor</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Reviewed By</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Reviewed</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>MED MFI</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Noted</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Noted By EFI Sup.</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Noted</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Prod Manager</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Approved</th>
                      
                      
                      

                    </tr>
                  </thead>
                  <?php while($row4=mysqli_fetch_array($query_table)){ ?>  
                    
                    <tr>
                          
                          <td class="px-1 py-1 text-center"><a href="casting_med?control_no=<?php echo $row4["control_no"]; ?>&&model=<?php echo $row4["model"]; ?> " ><i class="ni ni-settings"></i></a></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_requested']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['control_no']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['model']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['item_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['letter_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['remarks']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['requestor']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['reviewed_by']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_reviewed']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['mfi_med']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_mfi_med']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['efi_sup']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_efi_sup']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['prod_manager']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_prod_manager']; ?></td>
                         
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