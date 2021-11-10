<?php 

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
 

 	// hash password
 	$hash_password = md5($pass);

 	// creation for vendor account
 	$db  = mysqli_connect("localhost","root","","filmcraft");
 	$sql = "INSERT INTO vendor (vendorId,vendorEmail,vendorPassword,vendorFirstName,vendorLastName,vendorGender,vendorBirthdate,vendorNumber,vendorAddress,vendorType,vendorPosition,vendorProfileImage,vendorStatus,vendorUserType) VALUES (NULL,'$email','$hash_password','$fname','$lname','$empty','$empty','$empty','$empty','$empty','$position','$image','$status','$usertype') ";
 	
 	if(mysqli_query($db,$sql)) {
 	$latest_id = mysqli_insert_id($db);
 	$portfolioStatus = 0;
 	$rate = 0;
 	// creation for portfolio
 	$createPortfolioSql = "INSERT INTO portfolio (portfolioId,vendor_Id,vendorWork_Id,portfolioFirstName,portfolioLastName,portfolioAddress,portfolioEmail,portfolioVendorPosition,portfolioProfileImage,portfolioRating,portfolioBookingRate,portfolioStartPrice,portfolioEndPrice,portfolioDescription,portfolioStatus) VALUES (NULL,'$latest_id','$latest_id','$fname','$lname','$empty','$email','$position','$image','$empty','$rate','$rate','$rate','$empty','$portfolioStatus')";
 	$result = mysqli_query($db,$createPortfolioSql);

 	if($result) {
 	  header("Location:../login.php");
 	} else {
 	  echo "Error in system";
	}
  } else {
  	echo "Error: " . $sql . "<br>" . mysqli_error($db);
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
 	$status = 0;
 	$usertype   = $_POST['usertype'];
 

 	// hash password
 	$hash_password = md5($pass);

 	// creation for customer account
 	$db  = mysqli_connect("localhost","root","","filmcraft");
 	$sql = "INSERT INTO customer (customerId,customerEmail,customerPassword,customerFirstName,customerLastName,customerGender,customerBirthdate,customerNumber,customerAddress,customerProfileImage,customerStatus,customerUserType) VALUES (NULL,'$email','$hash_password','$fname','$lname','$empty','$empty','$empty','$empty','$image','$status','$usertype') ";
 	$result = mysqli_query($db,$sql);

 	if($result) {
 		header("Location:../login.php");
 	} else {
 		echo "Error: " . $sql . "<br>" . mysqli_error($db);
 	}

 }

}

?>