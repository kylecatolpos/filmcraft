<?php 

session_start();

// display current user name
$displayName = $_SESSION['displayName'];
// get current admin id
$displayId = $_SESSION['vendorId'];

$displayImage = $_SESSION['displayImage'];

?>