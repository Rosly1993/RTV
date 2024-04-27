<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "parts_rtv"; 

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