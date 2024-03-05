<?php
// // Set error reporting to display all errors
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Connect to the MySQL database
$con = mysqli_connect('localhost', 'root', '@pes1234', 'mystore');

// Check if connection is successful
if (!$con) {
    // If connection fails, print error message and exit script
    die("Connection failed: " . mysqli_connect_error());
}  
// if($con){
//     echo "connected";
// }
?>

