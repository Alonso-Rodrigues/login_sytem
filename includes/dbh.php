<?php
$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'login_system_tutorial';

$connection = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Here is to check if the connection with the database is working
if (!$connection) {
// die - Equivalent to exit
//  mysqli_connect_error — Returns a description of the last connection error
   die("Connection failed: ".mysqli_connect_error());
}