<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php include'../components/dashboard_body.php';?>
<?php include('../db/connect.php');

$query_table=mysqli_query($conn, "SELECT
                            control_no,
                            tbl_request.id,
                            date_requested,
                            division,
                            section,
                            is_number,
                            supplier,
                            tbl_model.model,
                            item_code,
                            letter_code,
                            remarks,
                            warehouse_remarks,
                            requestor,
                            tbl_description.description,
                            tbl_location.location,
                            qty,
                            rejected_by,
                            date_rejected

                            FROM
                            tbl_request
                            inner join tbl_model on tbl_request.model_id=tbl_model.model_id
                            inner join tbl_description on tbl_request.defect_description=tbl_description.id
                            inner join tbl_location on tbl_request.defect_location=tbl_location.id
                            where  request_status in ('8','9','17','15','16','18')
                            ");
                            ?> 
 
    

     
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Rejected Request Info Table</h6>
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
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Description</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Location</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>IS Number</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Quantity</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Remarks</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Requestor</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Rejected By</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Rejected</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Reason of Rejection</th>
                      
                      

                    </tr>
                  </thead>
                  <?php while($row4=mysqli_fetch_array($query_table)){ ?>  
                    
                    <tr>
                          
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_requested']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['control_no']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['model']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['item_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['letter_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['description']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['location']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['is_number']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['qty']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['remarks']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['requestor']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['rejected_by']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_rejected']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['warehouse_remarks']; ?></td>
                         
                          <!-- Mold Shots -->
                        

                        </tr>
                       
                       
                    <?php }?>

                </table>
            </div>
          </div>
        </div>
       
               



<?php include'../components/footer.php';?>

<script src="../js/dashboard.js"></script> 

<link href="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type='text/javascript'></script>