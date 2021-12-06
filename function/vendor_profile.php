<?php 


include("database.php");
$conn = $database;

if(isset($_POST['actionVendorProfile'])) {
	$id				= $_POST["id"];
	$email 			= $_POST["email"];
	$firstname		= $_POST["firstname"];
	$lastname		= $_POST["lastname"];
	$address		= $_POST["address"];
	$phonenumber	= $_POST["phonenumber"];
	$birthdate		= $_POST["birthdate"];
	$gender			= $_POST["gender"];

	// for image
	$filename = "";
	$maxsize = 5242880; // 5MB
	$date = date("Y-m-d");
	if(isset($_FILES['files'])) {
		if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg") {
			if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg") {
				if($_FILES['files']['type'] < $maxsize) {
					$filename = "../files/images/profile_pic/" .$date."_".$_FILES['files']['name'];
						move_uploaded_file($_FILES['files']['tmp_name'], $filename);	
						 $display_files = $filename;
			    	 }
	   	 	       }
	   	 	     }
	   	 	   }
	// end of image code

	// check image if empty 
	if($display_files == "") {
		$display_files = $_POST['profile_image'];
	} else {
		$display_files = $display_files;
	}

	$updateProfileQuery = "UPDATE vendor SET `vendorEmail` = '$email', `vendorFirstName` = '$firstname', `vendorLastName` = '$lastname', `vendorAddress` = '$address', `vendorNumber` = '$phonenumber', `vendorBirthdate` = '$birthdate', `vendorGender` = '$gender', `vendorProfileImage` = '$display_files' WHERE `vendorId` = '$id' ";
	$updateProfileResult = mysqli_query($conn,$updateProfileQuery);
	
	if($updateProfileResult) {
		header("Location:../user_vendor/index.php");
	} else {
		mysqli_error($conn);
	}

}


if(isset($_POST['actionEditVendorLocation'])) {

	$vendor_id = $_POST['id'];
	$vendor_lat = $_POST['vendor_lat'];
	$vendor_long = $_POST['vendor_long'];

	$sql = "UPDATE vendor SET vendorLatitude = '$vendor_lat', vendorLongitude = '$vendor_long' WHERE vendorId = '$vendor_id' ";
	$result = mysqli_query($conn,$sql);

	var_dump($conn);


	if($result) {
		header("Location:../user_vendor/index.php");
	} else {
		mysqli_error($conn);
	}



}



?>