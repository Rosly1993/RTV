
<?php 
//Session Expires in 6 Hours
session_start();
if ((!isset($_SESSION['web_name_rtv']) or (time() - $_SESSION["login_time_stamp"] >900) )){
session_unset();
// session_destroy();
header('location:../index');

}
$id_session=$_SESSION['id'];
?>