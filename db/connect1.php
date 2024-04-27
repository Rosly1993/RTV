<?php
$host = "10.216.128.114";
$username = "root";
$password = "Ncfldbuser21!";
$database = "db_downtime_upgrade"; 

$conn = new mysqli($host, $username, $password, $database);
if(!$conn)
{
    echo "Database connection failed. Error:".$conn->error;
}
// else
// {
//     echo "connected"; 

// }
?>