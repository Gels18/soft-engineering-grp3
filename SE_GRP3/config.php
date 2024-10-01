<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$database   = "client4";

$connection = mysqli_connect($servername, $username, $password, $database);

if ($connection->connect_error)
{
    die("Connection failed: ".$connection->connect_error);
}
?>
