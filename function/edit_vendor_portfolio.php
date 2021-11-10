<?php 

if(isset($_POST['actionEditPortfolio'])) {
  $id = $_POST['id'];
  $email = 	$_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $position = $_POST['position'];
  $start_price = $_POST['start-price'];
  $end_price = $_POST['end-price'];
  $description = $_POST['description'];
  $booking_rate = $_POST['booking-rate'];

  $display_files = $_POST["image"];

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
  
  $conn = mysqli_connect("localhost","root","","filmcraft");
	$updatePortfolioQuery = "UPDATE portfolio SET `portfolioEmail` = '$email', `portfolioFirstName` = '$firstname', `portfolioLastName` = '$lastname', `portfolioAddress` = '$address' , `portfolioVendorPosition` = '$position' ,  `portfolioProfileImage` = '$display_files', `portfolioBookingRate` = '$booking_rate',  `portfolioStartPrice` = '$start_price', `portfolioEndPrice` = '$end_price', `portfolioDescription` = '$description' WHERE `portfolioId` = '$id' ";
	$updatePortfolioResult = mysqli_query($conn,$updatePortfolioQuery);
	
	if($updatePortfolioResult) {
		header("Location:../user_vendor/manage-portfolio.php");
	} else {
		mysqli_error($conn);
	}

}



?>