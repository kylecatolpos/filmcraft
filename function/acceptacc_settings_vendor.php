<?php 


include("database.php");
$conn = $database;

if($_GET['VID']) {
  $vendorId =  $_GET['VID'];

  $query = "UPDATE portfolio SET portfolioStatus = '1' WHERE vendor_Id = '$vendorId' ";
  $res = mysqli_query($conn,$query);

  if($res) {
  	header('Location:../user_admin/settings-vendor.php');
  } else {
  	echo "Error";
  }

}



?>