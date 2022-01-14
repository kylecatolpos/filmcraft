<?php 


include("database.php");
$conn = $database;

// first booking when customer book a vendor
if(isset($_GET['BID'])) {

$BID = $_GET['BID'];
$VID = $_GET['VID'];

$sqlCancel = "DELETE FROM booking WHERE bookingId = '$BID' ";
$resultCancel = mysqli_query($conn,$sqlCancel);

if($resultCancel) {
  header("Location: ../user_customer/book_vendor.php?VID=".$VID);
} else {
  echo "ERROR";
}


}
  





?>