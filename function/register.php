<?php 

// code for register when user press 
if(isset($_POST['actionRegister'])) {
 	$fname 	  	= $_POST['fname'];
 	$lname 		= $_POST['lname'];
 	$email		= $_POST['email'];
 	$pass 	    = $_POST['password'];
 	$position = "None";
 	$empty = "";
 	$image = "../files/images/profile_pic/default-profile.png";

 	// hash password
 	$hash_password = md5($pass);

 	// creation for vendor account
 	$db  = mysqli_connect("localhost","root","","filmcraft");
 	$sql = "INSERT INTO vendor (vendorId,vendorEmail,vendorPassword,vendorFirstName,vendorLastName,vendorGender,vendorBirthdate,vendorNumber,vendorAddress,vendorType,vendorPosition,vendorProfileImage) VALUES (NULL,'$email','$hash_password','$fname','$lname','$empty','$empty','$empty','$empty','$empty','$position','$image') ";
 	if(mysqli_query($db,$sql)) {

 	$latest_id = mysqli_insert_id($db);
 	// creation for portfolio
 	$createPortfolioSql = "INSERT INTO portfolio (portfolioId,vendor_Id,vendorWork_Id,portfolioFirstName,portfolioLastName,portfolioAddress,portfolioEmail,portfolioVendorPosition,portfolioProfileImage,portfolioRating) VALUES (NULL,'$latest_id','$latest_id','$fname','$lname','$empty','$email','$position','$image','$empty')";
 	$result = mysqli_query($db,$createPortfolioSql);

 	if($result) {
 	  header("Location:../login.php");
 	} else {
 	  echo "Error in system";
	}
  } else {
  	echo "Error: " . $sql . "<br>" . mysqli_error($db);
  }
}

?>