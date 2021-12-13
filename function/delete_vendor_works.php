<?php 


include("database.php");
$conn = $database;

if($_GET['did']) {
  $worksId =  $_GET['did'];

  $query = "DELETE FROM works WHERE worksId = '$worksId' ";
  $res = mysqli_query($conn,$query);

  if($res) {
  	header('Location:../user_vendor/manage-portfolio.php');
  } else {
  	echo "Error";
  }

}



?>