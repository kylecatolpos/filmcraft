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

  // 
  $notificationAdmin = 0;
  $notificationVendor = $portfolioID;
  $notificationCustomer = $customerID;
  $notificationMessage = "Customer Has Successfully Booked A Vendor.";
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