<?php 

include("database.php");
$conn = $database;

if($_GET['CID']) {

  $customerID = $_GET['CID'];
  $portfolioID = $_GET['PID'];
  $bookingID = $_GET['BID'];
  $balance = $_GET['BAL'];

  $sqlBooking = "SELECT * FROM booking WHERE bookingId = '$bookingID' ";
  $resultBooking = mysqli_query($conn,$sqlBooking);

  while($rowBooking = mysqli_fetch_assoc($resultBooking)) {
     $customer_balance = $rowBooking['eventBalance'];
  }

  $fullpayment = $customer_balance - $balance;

  $sqlBookingUpdate = "UPDATE booking SET `eventBalance` = '$fullpayment', `bookingDpStatus` = 1, `bookingPaymentStatus` = 2 WHERE bookingId = '$bookingID' ";
  $res = mysqli_query($conn,$sqlBookingUpdate);
 
  // $sqlUpdate = "UPDATE portfolio SET portfolioSessionStatus = '$portfolioSessionStatus' WHERE portfolioId = '$portfolioID' ";
  // $result = mysqli_query($conn,$sqlUpdate);

  // 
  $notificationAdmin = 0;
  $notificationVendor = $portfolioID;
  $notificationCustomer = $customerID;
  $notificationMessage = "Customer Has Successfully Fully Paid The Vendor.";
  $notificationStatus = 0;
  $notificationType = 1;
  
  $date = new DateTime();
    $notificationDateTime = $date->format("Y-m-d H:i:s");

  $sendNotificationVendor = "INSERT INTO notification (notificationId,notificationAdminId,notificationVendorId,notificationCustomerId,notificationMessage,notificationStatus,notificationUserType,notificationDateTime) VALUES (NULL,'$notificationAdmin','$notificationVendor','$notificationCustomer','$notificationMessage','$notificationStatus','$notificationType','$notificationDateTime')";
  $resultSendNotificationVendor = mysqli_query($conn,$sendNotificationVendor);

  if($res) {
   	echo "<script> windows.href.location = 'index.php' </script>";
   } else {
   	echo "Error";
   }

}



?>