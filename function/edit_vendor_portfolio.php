<?php 

if(isset($_POST['actionEditPortfolio'])) {
  $id = $_POST['id'];
  $email = 	$_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  
  $conn = mysqli_connect("localhost","root","","filmcraft");
	$updatePortfolioQuery = "UPDATE portfolio SET `portfolioEmail` = '$email', `portfolioFirstName` = '$firstname', `portfolioLastName` = '$lastname', `portfolioAddress` = '$address' WHERE `portfolioId` = '$id' ";
	$updatePortfolioResult = mysqli_query($conn,$updatePortfolioQuery);
	
	if($updatePortfolioResult) {
		header("Location:../user_vendor/index.php");
	} else {
		mysqli_error($conn);
	}

}



?>