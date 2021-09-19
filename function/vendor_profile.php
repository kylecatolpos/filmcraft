<?php 

if(isset($_POST['actionVendorProfile'])) {
	$id				= $_POST["id"];
	$email 			= $_POST["email"];
	$firstname		= $_POST["firstname"];
	$lastname		= $_POST["lastname"];
	$address		= $_POST["address"];
	$phonenumber	= $_POST["phonenumber"];
	$birthdate		= $_POST["birthdate"];
	$gender			= $_POST["gender"];

	$conn = mysqli_connect("localhost","root","","filmcraft");
	$updateProfileQuery = "UPDATE vendor SET `vendorEmail` = '$email', `vendorFirstName` = '$firstname', `vendorLastName` = '$lastname', `vendorAddress` = '$address', `vendorNumber` = '$phonenumber', `vendorBirthdate` = '$birthdate', `vendorGender` = '$gender' WHERE `vendorId` = '$id' ";
	$updateProfileResult = mysqli_query($conn,$updateProfileQuery);
	
	if($updateProfileResult) {
		header("Location:../user_vendor/index.php");
	} else {
		mysqli_error($conn);
	}

}



?>