<?php 


include("database.php");
$conn = $database;

// code for register when user press 
if(isset($_POST['actionRegister'])) {
 
   if($_POST['usertype'] == 'vendor') {

 	$fname 	  	= $_POST['fname'];
 	$lname 		= $_POST['lname'];
 	$email		= $_POST['email'];
 	$pass 	    = $_POST['password'];
 	$position = "None";
 	$empty = "";
 	$image = "../files/images/profile_pic/default-profile.png";
 	$status = 0;
 	$usertype   = $_POST['usertype'];
 	$bday = '0000-00-00';
 

 	// hash password
 	$hash_password = md5($pass);

 	// creation for vendor account
 	$sql = "INSERT INTO vendor (vendorId,vendorEmail,vendorPassword,vendorFirstName,vendorLastName,vendorGender,vendorBirthdate,vendorNumber,vendorAddress,vendorType,vendorPosition,vendorProfileImage,vendorStatus,vendorUserType, vendorLatitude,vendorLongitude) VALUES (NULL,'$email','$hash_password','$fname','$lname','$empty','$bday','$empty','$empty','$empty','$position','$image','$status','$usertype','$empty','$empty') ";
 	
 	if(mysqli_query($conn,$sql)) {
 	$latest_id = mysqli_insert_id($conn);
 	$portfolioStatus = 0;
 	$porfolioSessionStatus = 0;
 	$rate = 0;
 	// creation for portfolio
 	$createPortfolioSql = "INSERT INTO portfolio (portfolioId,vendor_Id,vendorWork_Id,portfolioFirstName,portfolioLastName,portfolioAddress,portfolioEmail,portfolioVendorPosition,portfolioProfileImage,portfolioRating,portfolioBookingRate,portfolioStartPrice,portfolioEndPrice,portfolioDescription,portfolioStatus,portfolioSessionStatus) VALUES (NULL,'$latest_id','$latest_id','$fname','$lname','$empty','$email','$position','$image','$empty','$rate','$rate','$rate','$empty','$portfolioStatus','$porfolioSessionStatus')";
 	$result = mysqli_query($conn,$createPortfolioSql);

 	// notification; 

 	$notificationAdmin = 1;
 	$notificationVendor = 0;
 	$notificationCustomer = 0;
 	$notificationMessage = "A New Vendor Has Successfully Register An Account";
 	$notificationStatus = 0;
 	$notificationType = 1;
 	
 	$date = new DateTime();
  	$notificationDateTime = $date->format("Y-m-d H:i:s");

 	$sendNotificationVendor = "INSERT INTO notification (notificationId,notificationAdminId,notificationVendorId,notificationCustomerId,notificationMessage,notificationStatus,notificationUserType,notificationDateTime) VALUES (NULL,'$notificationAdmin','$notificationVendor','$notificationCustomer','$notificationMessage','$notificationStatus','$notificationType','$notificationDateTime')";
 	$resultSendNotificationVendor = mysqli_query($conn,$sendNotificationVendor);

 	if($result AND $resultSendNotificationVendor) {
 	  header("Location:../login.php");
 	} else {
 	  echo "Error in system";
 	}
  } else {
  	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  } 

 } else if($_POST['usertype'] == 'customer') {
 	
 	$fname 	  	= $_POST['fname'];
 	$lname 		= $_POST['lname'];
 	$email		= $_POST['email'];
 	$pass 	    = $_POST['password'];
 	$usertype   = $_POST['usertype'];
 	$position = "None";
 	$empty = "";
 	$image = "../files/images/profile_pic/default-profile.png";
 	$status = 1;
 	$usertype   = $_POST['usertype'];
 	$bday = '0000-00-00';
 

 	// hash password
 	$hash_password = md5($pass);

 	// creation for customer account
 	$sql = "INSERT INTO customer (customerId,customerEmail,customerPassword,customerFirstName,customerLastName,customerGender,customerBirthdate,customerNumber,customerAddress,customerProfileImage,customerStatus,customerUserType) VALUES (NULL,'$email','$hash_password','$fname','$lname','$empty','$bday','$empty','$empty','$image','$status','$usertype') ";
 	
 	if(mysqli_query($conn,$sql)) {

 	$latest_id = mysqli_insert_id($conn);

 	$notificationAdmin = 1;
 	$notificationVendor = 0;
 	$notificationCustomer = 0;
 	$notificationMessage = "A New Customer Has Successfully Register An Account";
 	$notificationStatus = 0;
 	$notificationType = 1;
 	
 	$date = new DateTime();
  	$notificationDateTime = $date->format("Y-m-d H:i:s");

 	$sendNotificationVendor = "INSERT INTO notification (notificationId,notificationAdminId,notificationVendorId,notificationCustomerId,notificationMessage,notificationStatus,notificationUserType,notificationDateTime) VALUES (NULL,'$notificationAdmin','$notificationVendor','$notificationCustomer','$notificationMessage','$notificationStatus','$notificationType','$notificationDateTime')";
 	$resultSendNotificationVendor = mysqli_query($conn,$sendNotificationVendor);

 	if($resultSendNotificationVendor) {
 		header("Location:../login.php");
 	} else {
 		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 	}

   }

 }

}

?>