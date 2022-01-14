<?php 

include("database.php");
$conn = $database;

if($_GET['PID']) {

  $vendorID = $_GET['UID'];
  $portfolioID = $_GET['PID'];

  
  $portfolioSessionStatus = 1;
  $portfolio_session_status = 1;

  // added one month
  $dt1 = new DateTime();
  $today = $dt1->format("Y-m-d H:i:s");

  $dt2 = new DateTime("+1 month");
  $end_day = $dt2->format("Y-m-d H:i:s");
  //$end_day = '2021-12-05 13:41:00';
  
  $sqlInsert = "INSERT INTO portfolio_session (portfolioSessionId,portfolioSessionPortfolioId,portfolioSessionVendorId,portfolioSessionStartSession,portfolioSessionEndSession,portfolioSessionStatus) VALUES (NULL,'$portfolioID','$vendorID','$today','$end_day','$portfolio_session_status')";
  $res = mysqli_query($conn,$sqlInsert);

  $sqlUpdate = "UPDATE portfolio SET portfolioSessionStatus = '$portfolioSessionStatus' WHERE portfolioId = '$portfolioID' ";
  $result = mysqli_query($conn,$sqlUpdate);

  // 
  $notificationAdmin = 1;
  $notificationVendor = $vendorID;
  $notificationCustomer = 0;
  $notificationMessage = "Vendor Has Successfully Subscribe For 1 Month Using In The System";
  $notificationStatus = 0;
  $notificationType = 1;
  
  $date = new DateTime();
    $notificationDateTime = $date->format("Y-m-d H:i:s");

  $sendNotificationVendor = "INSERT INTO notification (notificationId,notificationAdminId,notificationVendorId,notificationCustomerId,notificationMessage,notificationStatus,notificationUserType,notificationDateTime) VALUES (NULL,'$notificationAdmin','$notificationVendor','$notificationCustomer','$notificationMessage','$notificationStatus','$notificationType','$notificationDateTime')";
  $resultSendNotificationVendor = mysqli_query($conn,$sendNotificationVendor);

  if($res AND $result AND $resultSendNotificationVendor) {
   	echo "<script> windows.href.location = 'index.php' </script>";
   } else {
   	echo "Error";
   }

}



?>