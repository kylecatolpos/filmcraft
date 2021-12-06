<?php 


include("database.php");
$conn = $database;

// first booking when customer book a vendor
if(isset($_POST['proceedBookingWithCash'])) {

  $customerID = $_POST['customerID'];
  $vendorID = $_POST['vendorID'];

  $bookingDP = $_POST['vendor_bookingrate'];
  $bookingStatus = 0;
  
  $eventFinalPrice = 0;
  $eventBalance = 0;

  $eventStartDate = $_POST['start_date_event']; 
  $eventEndDate = $_POST['end_date_event'];
  $eventStartTime = $_POST['start_time_event'];
  $eventEndTime = $_POST['end_time_event'];
  $eventDetails = $_POST['event_details'];

  $bookingPaymentMethod = 'Cash';

  $bookingPaymentStatus = 0;

  $date = new DateTime();
  $bookingDateTime = $date->format("Y-m-d H:i:s");
  $bookingStatus = 1;


  $query = "INSERT INTO booking (bookingId,customer_Id,vendor_Id,bookingDp,bookingDpStatus,eventFinalPrice,eventBalance,eventStartDate,eventEndDate,eventStartTime,eventEndTime,eventDetails,bookingPaymentMethod,bookingPaymentStatus,bookingDateTime,bookingStatus) VALUES (NULL,'$customerID','$vendorID','$bookingDP','$bookingStatus','$eventFinalPrice','$eventBalance','$eventStartDate','$eventEndDate','$eventStartTime','$eventEndTime','$eventDetails','$bookingPaymentMethod','$bookingPaymentStatus','$bookingDateTime','$bookingStatus')";
  $result = mysqli_query($conn,$query);
  

  if($result) {
  	header('Location:../user_customer/index.php');
  } else {
  	echo "Error";
  }

}



?>