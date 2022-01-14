<?php 


include("database.php");
$conn = $database;

// first booking when customer book a vendor
if(isset($_POST['proceedPaymentCustomer'])) {

  $customerID = $_POST['customerID'];
  $vendorID = $_POST['vendorID'];

  $bookingDP = $_POST['vendor_bookingrate'];
  
  $bookingDPStatus = 0;
  $eventFinalPrice = $_POST['vendor_startprice'];
  $eventBalance = $eventFinalPrice;

  $eventStartDate = $_POST['start_date_event']; 
  $eventEndDate = $_POST['end_date_event'];
  $eventStartTime = $_POST['start_time_event'];
  $eventEndTime = $_POST['end_time_event'];
  $eventDetails = $_POST['event_details'];

  $bookingPaymentMethod = 'Online';
  $bookingPaymentStatus = 0;

  $date = new DateTime();
  $bookingDateTime = $date->format("Y-m-d H:i:s");
  $bookingStatus = 1;


  $query = "INSERT INTO booking (bookingId,customer_Id,vendor_Id,bookingDp,bookingDpStatus,eventFinalPrice,eventBalance,eventStartDate,eventEndDate,eventStartTime,eventEndTime,eventDetails,bookingPaymentMethod,bookingPaymentStatus,bookingDateTime,bookingStatus) VALUES (NULL,'$customerID','$vendorID','$bookingDP','$bookingDPStatus','$eventFinalPrice','$eventBalance','$eventStartDate','$eventEndDate','$eventStartTime','$eventEndTime','$eventDetails','$bookingPaymentMethod','$bookingPaymentStatus','$bookingDateTime','$bookingStatus')";
  
  if(mysqli_query($conn,$query)) {
    $newly_booking = mysqli_insert_id($conn); 
     header('Location:../user_customer/proceed_payment.php?VID='.$vendorID.'&BID='.$newly_booking);
    } else {
  	 echo "Error";
    }

}



?>