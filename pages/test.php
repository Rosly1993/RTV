<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php include'../components/dashboard_body.php';?>
<?php include('../db/connect1.php');
 $date = date('Y-m-d', strtotime("-2 day")); 


$query_table=mysqli_query($conn, "SELECT * FROM tb_downtime_new where production_date >'".$date."' "); ?> 
 
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
                  
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>id</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>production_date</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>work_week</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>downtime_category</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>location</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>customer</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>model</th>
                     
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>build_stage</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>assembly</th>
                    
                    </tr>
                  </thead>
                  <?php while($row4=mysqli_fetch_array($query_table)){ ?>  
                    
                    <tr>

                          <td style="font-size: 12px" class='text-center'><?php echo $row4['id']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['production_date']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['work_week']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['downtime_category']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['location']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['customer']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['model']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['build_stage']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['assembly']; ?></td>
                         
                         
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