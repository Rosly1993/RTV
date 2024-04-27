
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php  


session_start();//session starts here  
$_SESSION["login_time_stamp"] = time();


include('./db/connect.php');
$user_name = $password = "";
$user_name_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if username is empty
// if(empty(trim($_POST["user_name"]))){
//   $user_name_err = "Please enter username.";
// } else{
  $user_name = trim($_POST["user_name"]);
// }

// // Check if password is empty 
// if(empty(trim($_POST["password"]))){
//   $password_err = "Please enter your password.";
// } else{
  $password = trim($_POST["password"]);
// }

  $check_if_lock = $conn->query("select * from tbl_user where user_name='$user_name' and `lock` > 4 ")->num_rows ;

  if($check_if_lock > 0){

    echo "<script>
    swal({
    title: 'Successfully Rejected Request!',
    text: 'Redirecting in 3 seconds.',
    type: 'warning',
    timer: 3000,
    showConfirmButton: false
    }, function(){
    window.location.href = 'index'; 
    });
    </script>";
    $user_name_err = "Account Has Been Locked Please Contact Administrator";
  }else{

    
 
    


if(empty($user_name_err) && empty($password_err)){

  $sql=mysqli_query($conn,"SELECT * FROM tbl_user where user_name='$user_name' and password='$password'and is_active='1' ");
  $row  = mysqli_fetch_array($sql);

  if(is_array($row))
  {
      $_SESSION["id"] = $row['id'];
      $_SESSION["user_name"]=$row['user_name'];
      $_SESSION["name"]=$row['name'];
      $_SESSION["area"]=$row['area']; 
      $_SESSION["user_role"]=$row['user_role']; 
      $id_1=$row['id'];
      // $_SESSION["session_name"] = "Simplilearn";
      $_SESSION['web_name_rtv']='Parts_RTV';

      $update = $conn->query("UPDATE `tbl_user` set `active_now` = '1' ,`lock` = '0'  where id = '{$id_1}'");


      header("Location: pages/dashboard"); 
  }
  else
  {
    $user_name_err = "Invalid or Inactive Account";
    $lock=0;
    //get user account
    $user=mysqli_query($conn, "SELECT  * from  tbl_user where user_name='$user_name'  ");
    while($rows1=mysqli_fetch_array($user)){ 
    $lock=$rows1['lock'];
    }

    //update number of attemp
    $a= $lock + 1;

    $update = $conn->query("UPDATE `tbl_user` set `lock` = '$a' where user_name = '{$user_name}'");

  }

  }
}
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
   Part's RTV
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="#">
            Part's RTV 
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <!-- <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="#">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link me-2" href="sign-up">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    Sign Up
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="index">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="guest">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In As Guest
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                  <a href="./docs/Manual.pdf" class="btn btn-sm mb-0 me-1 btn-primary" target='_blank'> Download User's Manual</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <!-- <p class="mb-0">Enter your username and password to sign in</p> -->
                </div>
                <div class="card-body">
                  <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='POST'>
                    <center><div class="form-group mb-3"><span class="text-danger"><?php echo $user_name_err; ?></span></div></center>
                    <div class="mb-3">
                      <input type="text" class="form-control form-control-lg" placeholder="Username" name='user_name'aria-label="Username" required>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control form-control-lg" placeholder="Password" name='password' aria-label="Password" required>
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit"  class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" name='save'>Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="sign-up" class="text-primary text-gradient font-weight-bold">Sign up</a>
             

                  </p>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('./assets/img/login_bg.jpg');
          background-size: cover;">
                <span class="mask bg-gradient-success opacity-3"></span>
                <h4 class="mt-5 text-white font-weight-bolder position-relative">"Part's RTV"</h4>
                <p class="text-white position-relative"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>