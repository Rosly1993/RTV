<?php 
$type=$_SESSION['user_role'];
$area_now=$_SESSION['area'];
?>
<style>.active-menu {
    background: linear-gradient(90deg, #00f260, #0575e6); /* Highlight color */
    border-radius: 10px;
    color: white !important; /* Text color for highlighted item */
}
</style>

<?php
$current_page = basename($_SERVER['REQUEST_URI']);

function isActive($page) {
    global $current_page;
    return $current_page == $page ? 'active-menu' : '';
}
?>
<?php
$url = "cancelled_summary"; // URL to hash
// Hash the URL using SHA-256 algorithm
$hashedUrl = hash('sha256', $url);
// Echo the hashed URL in the href attribute
//get sum



?>
<body class="g-sidenav-show   bg-gray-100">
<div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('../assets/img/login_bg.jpg'); background-position-y: 50%;">
    <span class="mask bg-primary opacity-6"></span>
  </div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Part's RTV</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('dashboard'); ?>"  href="dashboard">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <?php if ($type=="Admin"){ ?>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">System Maintenance</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('model'); ?>" href="model">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Model</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('item_code'); ?>" href="item_code">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Item Code</span>
          </a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('defect_location'); ?>" href="defect_location">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            
            <span class="nav-link-text ms-1">Defect Location</span>
          </a>
        </li>

    
       
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('defect_description'); ?>" href="defect_description">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            
            <span class="nav-link-text ms-1">Defect Description</span>
          </a>
        </li>
        <?php }else { ?><?php }	?>
        <?php if ($type=="Admin" || $area_now=="Warehouse"){ ?>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('pages'); ?>" href="pages">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pages Settings</span>
          </a>
        </li>
        <?php }else { ?><?php }	?>

        
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Request Page</h6>
        </li><?php if ($type=="Admin" || $type=="Requestor"){ ?>
    
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('request_form'); ?>" href="request_form">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Request Form</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('edit_quantity'); ?>" href="edit_quantity">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Edit Quantity</span>
          </a>
        </li><?php }else { ?><?php }	?>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('rejected_summary'); ?>" href="rejected_summary">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
              <i class="ni ni-circle-08 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Rejected Request</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('cancelled_summary'); ?>" href="cancelled_summary">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Cancelled Request</span>
          </a>
        </li>
        


        <?php if ($type!="guest"){ ?>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <?php }else { ?><?php }	?>

        <?php if ($type=="Admin"){ ?>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('user'); ?>" href="user">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User's</span>
          </a>
        </li>
        <?php }else { ?><?php }	?>

        <?php if ($type!="guest" && $type!=''){ ?>
        <li class="nav-item">
          <a class="nav-link <?php echo isActive('profile'); ?>" href="profile">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08  text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <?php }else { ?><?php }	?>
       
      </ul>
    </div>
   

    <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="../assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="../docs/Manual.pdf" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">View Documentation</a>
      <a href="logout.php"  class="btn btn-danger btn-sm mb-0 w-100" href="#" type="button">Sign Out</a>
    </div>


    
  </aside>
