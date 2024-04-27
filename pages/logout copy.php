<?php
require_once('../db/connect.php');
session_start(); 
$id = $_SESSION['id'];
$update = $conn->query("UPDATE `tbl_user` set `active_now` = '0'  where id = '{$id}'");

$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['login']);
session_destroy(); // destroy session
header("location:../index"); 
?>