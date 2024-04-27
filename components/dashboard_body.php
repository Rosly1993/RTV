<?php  include('../db/connect.php');
 $totalCount = $conn->query("select * from tbl_request where request_status='1' group by control_no")->num_rows;
 $totalCount1 = $conn->query("select * from tbl_request where request_status='2' group by control_no")->num_rows;
 $totalCount2 = $conn->query("select * from tbl_request where request_status='3' group by control_no")->num_rows;
 $totalCount3 = $conn->query("select * from tbl_request where request_status='4' group by control_no")->num_rows;
 $totalCount4 = $conn->query("select * from tbl_request where request_status='5' group by control_no")->num_rows;
 $totalCount5 = $conn->query("select * from tbl_request where request_status='6' group by control_no")->num_rows;
 $totalCount6 = $conn->query("select * from tbl_request where request_status='10' group by control_no")->num_rows;
 $totalCount7 = $conn->query("select * from tbl_request where request_status='11' ")->num_rows;


?>



<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-2 col-sm-2 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3 nav-link <?php echo isActive('dashboard'); ?>">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold"> For Review</p>
                    <h5 class="font-weight-bolder"><a href='dashboard'>
                    <?php echo $totalCount;?> &nbsp;Entry/S</a>
                    </h5>
                    <p class="mb-0">
                      <span class="text-secondary text-sm font-weight-bolder">MFI GL</span>
                      
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-2 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3 <?php echo isActive('dashboard_note'); ?>">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">For Note</p>
                    <h5 class="font-weight-bolder"><a href='dashboard_note'>
                    <?php echo $totalCount1;?> &nbsp;Entry/S</a>
                    </h5>
                    <p class="mb-0">
                      <span class="text-info text-sm font-weight-bolder">MFI Med</span>
                    
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-2 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3 <?php echo isActive('dashboard_note_efi'); ?>">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">For Note</p>
                    <h5 class="font-weight-bolder">
                    <a href='dashboard_note_efi'>
                    <?php echo $totalCount2;?> &nbsp;Entry/S</a>
                    </h5>
                    <p class="mb-0">
                      <span class="text-warning text-sm font-weight-bolder">EFI Sup.</span>
                    
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-2 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3 <?php echo isActive('dashboard_prod_manager'); ?>">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">For Approval</p>
                    <h5 class="font-weight-bolder">
                    <a href='dashboard_prod_manager'>
                    <?php echo $totalCount3;?> &nbsp;Entry/S</a>
                    </h5>
                    <p class="mb-0">
                      <span class="text-dark text-sm font-weight-bolder">Prod. Manger</span>
                    
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-dark shadow-dark text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-2 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3 <?php echo isActive('dashboard_casting_med'); ?>">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">For Confirm </p>
                    <h5 class="font-weight-bolder">
                    <a href='dashboard_casting_med'>
                    <?php echo $totalCount4;?> &nbsp;Entry/S</a>
                    </h5>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">Casting Med</span>
                 
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-2 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3 <?php echo isActive('dashboard_is_issuance'); ?>">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">For IS Issuance</p>
                    <h5 class="font-weight-bolder">
                    <a href='dashboard_is_issuance'>
                    <?php echo $totalCount5;?> &nbsp;Entry/S</a>
                    </h5>
                    <p class="mb-0">
                      <span class="text-secondary text-sm font-weight-bolder">MFI Requestor</span> 
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="row mt-4">
        <div class="col-xl-2 col-sm-2 mb-xl-0 mb-4">
          <div class="card">
            <!-- <div class="card-body p-3" style='border-color:#E5B8F4;border-radius: 15px'> -->
            <div class="card-body p-3 nav-link <?php echo isActive('dashboard_warehouse'); ?>">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold"> For Ack.</p>
                    <h5 class="font-weight-bolder "><a href='dashboard_warehouse'>
                    <?php echo $totalCount6;?> &nbsp;Entry/S</a>
                    </h5>
                    <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">Warehouse</span>
                      
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-2 col-sm-2 mb-xl-0 mb-4">
          <div class="card">
            <!-- <div class="card-body p-3" style='border-color:#E5B8F4;border-radius: 15px'> -->
            <div class="card-body p-3 <?php echo isActive('dashboard_summary'); ?>">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold"> Summary</p>
                    <h5 class="font-weight-bolder"><a href='dashboard_summary'>
                    <?php echo $totalCount7;?> &nbsp;Entry/S</a>
                    </h5>
                    <p class="mb-0">
                      <span class="text-danger text-sm font-weight-bolder">Approved Req.</span>
                      
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>