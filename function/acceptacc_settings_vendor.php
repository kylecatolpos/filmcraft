<?php 


include("database.php");
$conn = $database;

if($_GET['VID']) {
  $vendorId =  $_GET['VID'];

  $query = "UPDATE vendor SET vendorStatus = '1' WHERE vendorId = '$vendorId' ";
  $res = mysqli_query($conn,$query);

  $sql = "UPDATE portfolio SET portfolioStatus = '1' WHERE vendor_Id = '$vendorId' ";
  $result = mysqli_query($conn,$sql);

  // 
  $notificationAdmin = 0;
  $notificationVendor = $vendorId;
  $notificationCustomer = 0;
  $notificationMessage = "Vendor Account Is Successfully Verified";
  $notificationStatus = 0;
  $notificationType = 1;
  
  $date = new DateTime();
    $notificationDateTime = $date->format("Y-m-d H:i:s");

  $sendNotificationVendor = "INSERT INTO notification (notificationId,notificationAdminId,notificationVendorId,notificationCustomerId,notificationMessage,notificationStatus,notificationUserType,notificationDateTime) VALUES (NULL,'$notificationAdmin','$notificationVendor','$notificationCustomer','$notificationMessage','$notificationStatus','$notificationType','$notificationDateTime')";
  $resultSendNotificationVendor = mysqli_query($conn,$sendNotificationVendor);

  if($res AND $result AND $resultSendNotificationVendor) {
  	header('Location:../user_admin/settings-vendor.php');
  } else {
  	echo "Error";
  }

}



?>