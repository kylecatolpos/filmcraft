<?php 

if(isset($_POST['actionAdminProfile'])) {
	$id				= $_POST["id"];
	$email 			= $_POST["email"];
	$firstname		= $_POST["firstname"];
	$lastname		= $_POST["lastname"];
	$address		= $_POST["address"];
	$phonenumber	= $_POST["phonenumber"];
	$birthdate		= $_POST["birthdate"];
	$gender			= $_POST["gender"];

	$conn = mysqli_connect("localhost","root","","filmcraft");
	$updateProfileQuery = "UPDATE admin SET `adminEmail` = '$email', `adminFirstName` = '$firstname', `adminLastName` = '$lastname', `adminAddress` = '$address', `adminNumber` = '$phonenumber', `adminBirthdate` = '$birthdate', `adminGender` = '$gender' WHERE `adminId` = '$id' ";
	$updateProfileResult = mysqli_query($conn,$updateProfileQuery);
	
	if($updateProfileResult) {
		header("Location:../user_admin/profile.php");
	} else {
		mysqli_error($conn);
	}

}



?>