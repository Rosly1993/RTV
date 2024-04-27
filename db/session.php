<?php
session_start();

// Check if last activity was set 15mns. of inactivity
if (isset($_SESSION['login_time_stamp']) && time() - $_SESSION['login_time_stamp'] > 90000) {
  // last request was more than 15 minutes ago
  session_unset(); // unset $_SESSION variable for the run-time
  session_destroy(); // destroy session data in storage
  header('location:../index');// redirect to login page
}
$_SESSION['login_time_stamp'] = time(); // update last activity time stamp
$id_session=$_SESSION['id'];
?>