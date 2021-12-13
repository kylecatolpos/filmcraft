<?php 


include("database.php");
$conn = $database;

if($_GET['did']) {
  $eventId =  $_GET['did'];

  $query = "DELETE FROM events WHERE eventId = '$eventId' ";
  $res = mysqli_query($conn,$query);

  if($res) {
  	header('Location:../user_admin/settings-events.php');
  } else {
  	echo "Error";
  }

}



?>