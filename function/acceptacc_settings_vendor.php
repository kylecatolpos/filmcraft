<?php 


include("database.php");
$conn = $database;

if($_GET['VID']) {
  $vendorId =  $_GET['VID'];

  $query = "UPDATE vendor SET vendorStatus = '1' WHERE vendorId = '$vendorId' ";
  $res = mysqli_query($conn,$query);

  $sql = "UPDATE portfolio SET portfolioStatus = '1' WHERE vendor_Id = '$vendorId' ";
  $result = mysqli_query($conn,$sql);

  if($res AND $result) {
  	header('Location:../user_admin/settings-vendor.php');
  } else {
  	echo "Error";
  }

}



?>