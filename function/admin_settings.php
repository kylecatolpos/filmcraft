<?php 

if($_GET['VID']) {
  $vendorId =  $_GET['VID'];

  $conn = mysqli_connect("localhost","root","","filmcraft");
  $query = "UPDATE vendor SET vendorStatus = '1' WHERE vendorId = '$vendorId' ";
  $res = mysqli_query($conn,$query);

  var_dump($conn);

  if($res) {
  	header('Location:../user_admin/settings.php');
  } else {
  	echo "Error";
  }

}



?>