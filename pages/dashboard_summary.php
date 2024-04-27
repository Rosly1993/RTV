<?php include('session.php')?>
<?php include'export.php';?>

<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include'../components/navbar.php';?>
<?php include'../components/dashboard_body.php';?>
<?php include'../controller/dashboard_summary copy.php';?>

<?php
$query_page1=mysqli_query($conn, "SELECT * from tbl_pages where page_name='Summary' ");
while($rows=mysqli_fetch_array($query_page1)){ 
$page1=$rows['is_active'];
} 
?>
    

 <?php if($page1 =='1'){?>  
<style>
        #myTable tbody tr:hover {
            background-color: #7D7C7C;
            color: white; /* Change this to your desired highlight color */
        }
    </style> 

      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
              <div class="col-md-12" id="msg">
                <h6 class="mb-2">Summary of Defect </h6>
              </div>
              </div>
           
            <div class="table-responsive">
            <!-- Monthly Filter:
            <form method='post' action=''>
           <select type="text" class="btn bg-gradient-primary" id="model" name="model" required autocomplete="off" style='border-radius:5px;padding: 8px;color:white;width:180px'>
                <option value=''>Select Model</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($_POST['model'] == $row['model']) ? 'selected' : '';
                        echo '<option value="' . $row['model'] . '" ' . $selected . '>' . $row['model'] . '</option>';
                    }
                } else {
                    echo '<option value="">Model not available</option>';
                }
                ?>
            </select> &nbsp;&nbsp;
            <input type='month' name='month' class="btn bg-gradient-primary" max='<?php echo date('Y-m'); ?>' style='border-radius:5px;padding: 8px;color:white;width:130px' required value='<?php echo isset($_POST['month']) ? $_POST['month'] : ''; ?>'>&nbsp;&nbsp;
            <button class="btn bg-gradient-primary" name="search" style='border-radius:5px;padding: 8px;color:white;width:50px'><span class="fa fa-search"></span></button>
          </form> -->

          Monthly Download:
          <form method='post' action=''>
            
            <input type='month' name='month' class="btn bg-gradient-secondary" style='border-radius:5px;padding: 8px;color:white;width:180px' required >&nbsp;&nbsp;
            <button class="btn bg-gradient-secondary" name="export" style='border-radius:5px;padding: 8px;color:white;width:50px'><span class="fa fa-search"></span></button>
          </form>

            <table  id="myTable" class="table align-items-center mb-0"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <!-- <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>View</th> -->
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Requested</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Control #</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>IS #</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Model</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Item Code</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Letter Code</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Location</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Defect</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Quantity</th>
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
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Casting MED</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Approved</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Warehouse</th>
                      <th class="text-center text-uppercase" style='font-size:12px;height:30px;background-color:#454545;color:white'>Date Approved</th>

                      
                      
                      

                    </tr>
                  </thead> <tbody>
                  <?php while($row4=mysqli_fetch_array($query_table)){ ?>  
                   
                    <tr>
                          <!-- <td class="px-1 py-1 text-center"><a href="casting_med?control_no=<?php echo $row4["control_no"]; ?>"><i class="ni ni-settings"></i></a></td> -->
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['abc']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['control_no']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['is_number']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['model']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['item_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['letter_code']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['location']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['description']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['qty']; ?></td>
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
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['casting_med']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_casting_med']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['warehouse']; ?></td>
                          <td style="font-size: 12px" class='text-center'><?php echo $row4['date_warehouse']; ?></td>
                         
                          <!-- Mold Shots -->
                        

                        </tr>
                       
                       
                    <?php 
                    }

                    mysqli_close($conn);
                    
                    ?>
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



<?php include'../components/footer.php';?>

<script src="../js/dashboard copy.js"></script> 

<link href="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type='text/javascript'></script>