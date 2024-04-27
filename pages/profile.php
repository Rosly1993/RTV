<?php include('session.php')?>
<?php include'../components/header.php';?>
<?php include'../components/sidebar.php';?>
<?php include('../db/connect.php');
    $conn = new mysqli($host, $username, $password, $database);       
    $query = "SELECT * FROM tbl_user where id='{$_SESSION['id']}' "; 
    $result = $conn->query($query); 
    ?>
    <?php while($row = $result->fetch_assoc()){
    $id = $row['id'];
    $name = $row['name'];
    $user_name = $row['user_name'];
    $area = $row['area'];
    $user_role = $row['user_role'];
    $email_address = $row['email_address'];
    $password = $row['password'];

}?> 

  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2 mt-n11">
      <div class="container-fluid py-1">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
          </ol>
          <h6 class="text-white font-weight-bolder ms-2">Profile</h6>
        </nav>
        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark me-3">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- End Navbar -->
    <div class="card shadow-lg mx-4 card-profile-bottom">
      <div class="card-body p-3">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="../docs/PROFILE.png" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
              <?php echo $name; ?>  
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
              <?php echo $area; ?>&nbsp;<?php echo $user_role; ?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <i class="ni ni-building"></i>
                    <span class="ms-2"><?php echo $area; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <i class="ni ni-trophy"></i>
                    <span class="ms-2"><?php echo $user_role; ?></span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                    <!-- <i class="ni ni-settings-gear-65"></i> -->
                    <i class="ni ni-email-83"></i>
                    <span class="ms-2"><?php echo $email_address; ?></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
   
    <div class="container-fluid py-4">
      <div class="row">

      <form role="form" method="post" action="" enctype="multipart/form-data">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Password</p>
                <button type="submit" name='submit' class="btn  bg-gradient-success btn-sm ms-auto">UPDATE</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">User Information</p>
              <div class="row">
              <input class="form-control" type="hidden" name='id' value="<?php echo $id; ?>">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input class="form-control" type="text" name='user_name' value="<?php echo $user_name; ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Email address</label>
                    <input class="form-control" type="email" name='email_address' value="<?php echo $email_address; ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Full name</label>
                    <input class="form-control" type="text" name='name' value="<?php echo $name; ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Password</label>
                    <input class="form-control" type="password" name='password' value="<?php echo $password; ?>" pattern="(?=.*\d)(?=.*[A-Za-z])[A-Za-z0-9]+" 
            title="Password must contain at least one letter and one number" 
            minlength="5" data-toggle="password" />
            <input class="form-control" type="hidden" name='old_password' value="<?php echo $password; ?>" readonly>

                  </div>
                </div>
              </div>
            </div>
          </div>       
      </form> 

      
      <?php include'../components/footer.php';?>

      <?php  
          if (isset($_POST['submit'])){

          $id = $_POST['id'];
          $name = $_POST['name'];
          $email_address = $_POST['email_address'];
          $user_name = $_POST['user_name'];
          $password = $_POST['password'];
          $old_password = $_POST['old_password'];

          $check_if_exist = $conn->query("SELECT * FROM tbl_password_history WHERE user_name='$user_name' and password='$password' order by id desc limit 5 ")->num_rows;

          if ($user_name === $password) {

            echo "<script> 
            swal({
            title: 'Username and password cannot be the same. Please choose different ones!',
            text: 'Username and password cannot be the same. Please choose different ones!',
            type: 'warning',
            timer: 2500,
            showConfirmButton: false
            }, function(){
                window.location.href = 'profile.php';
            });
            </script>"; 

           }else if($old_password === $password){


            echo "<script> 
            swal({
            title: 'No Changes!',
            text: 'No Changes Made!',
            type: 'warning',
            timer: 2500,
            showConfirmButton: false
            }, function(){
                window.location.href = 'profile.php';
            });
            </script>"; 
            
         
         
          }elseif ($check_if_exist > 0){


            echo "<script> 
            swal({
            title: 'Password has been used recently!',
            text: 'Password has been used recently!',
            type: 'warning',
            timer: 2500,
            showConfirmButton: false
            }, function(){
                window.location.href = 'profile.php';
            });
            </script>"; 
          

          } else {

          $query2 = $conn->query("INSERT INTO `tbl_password_history` (`user_name`, `password`) VALUES ('{$user_name}', '{$password}')");

        
          $update = $conn->query("UPDATE `tbl_user` set `name` = '$name',`email_address` = '$email_address',`user_name` = '$user_name',`password` = '$password'  where id = '{$id}'");

          


         if($query2){

          echo "<script> 
            swal({
            title: 'Success!',
            text: 'Successfully Updated Information',
            type: 'success',
            timer: 2500,
            showConfirmButton: false
            }, function(){
                window.location.href = 'profile.php';
            });
            </script>"; 

      }else{
          echo 'failed'.$conn->error;
      }
      }
    }
      
      
      ?>