<?php 

include("database.php");
$conn = $database;

if($_GET['CID']) {

  $customerID = $_GET['CID'];
  $portfolioID = $_GET['PID'];
  $bookingID = $_GET['BID'];

  $sqlBooking = "SELECT * FROM booking WHERE bookingId = '$bookingID' ";
  $resultBooking = mysqli_query($conn,$sqlBooking);

  while($rowBooking = mysqli_fetch_assoc($resultBooking)) {
     $customer_final_price = $rowBooking['eventFinalPrice'];
     $customer_bookingDp = $rowBooking['bookingDp'];
  }

  $balance = $customer_final_price - $customer_bookingDp;

  $sqlBookingUpdate = "UPDATE booking SET `eventBalance` = '$balance', `bookingDpStatus` = 1, `bookingPaymentStatus` = 1 WHERE bookingId = '$bookingID' ";
  $res = mysqli_query($conn,$sqlBookingUpdate);
 
  // $sqlUpdate = "UPDATE portfolio SET portfolioSessionStatus = '$portfolioSessionStatus' WHERE portfolioId = '$portfolioID' ";
  // $result = mysqli_query($conn,$sqlUpdate);

  if($res) {
   	echo "<script> windows.href.location = 'index.php' </script>";
   } else {
   	echo "Error";
   }

}



?>