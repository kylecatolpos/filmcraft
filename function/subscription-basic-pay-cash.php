<?php 

include("database.php");
$conn = $database;

if(isset($_POST['actionSubscribeBasic'])) {

  $vendorID = $_POST['vendorID'];
  $portfolioID = $_POST['portfolioID'];

  // subscription details
  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];

  $portfolioSessionStatus = 1;
  $portfolio_session_status = 1;

  // added one month
  $dt1 = new DateTime();
  $today = $dt1->format("Y-m-d H:i:s");

  //$dt2 = new DateTime("+1 month");
  //$end_day = $dt2->format("Y-m-d H:i:s");
  $end_day = '2021-12-05 13:41:00';
  

  $sqlInsert = "INSERT INTO portfolio_session (portfolioSessionId,portfolioSessionPortfolioId,portfolioSessionVendorId,portfolioSessionStartSession,portfolioSessionEndSession,portfolioSessionStatus) VALUES (NULL,'$portfolioID','$vendorID','$today','$end_day','$portfolio_session_status')";
  $res = mysqli_query($conn,$sqlInsert);


  $sqlUpdate = "UPDATE portfolio SET portfolioSessionStatus = '$portfolioSessionStatus' WHERE portfolioId = '$portfolioID' ";
  $result = mysqli_query($conn,$sqlUpdate);

  
  if($res AND $result) {
  	header('Location:../user_vendor/index.php');
  } else {
  	echo "Error";
  }

}



?>