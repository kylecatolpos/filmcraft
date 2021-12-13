<?php 



include("database.php");
$conn = $database;

if(isset($_POST['actionEditEvents'])) {

  $id = $_POST['id'];
  $eventname = $_POST['eventname'];
  $eventdescription = $_POST['eventdescription'];

 
  // for image
	$filename = "";
	$maxsize = 5242880; // 5MB
	$date = date("Y-m-d");
	if(isset($_FILES['files'])) {
		if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg") {
			if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg") {
				if($_FILES['files']['type'] < $maxsize) {
					$filename = "../files/images/events/" .$date."_".$_FILES['files']['name'];
						move_uploaded_file($_FILES['files']['tmp_name'], $filename);	
						 $display_files = $filename;
			    	 }
	   	 	       }
	   	 	     }
	   	 	   }
	// end of image code
	// check image if empty 
	if($display_files == "") {
		$display_files = $_POST["event_image"];
	} else {
		$display_files = $display_files;
	}
  
  	$updatePortfolioQuery = "UPDATE events SET `eventName` = '$eventname', `eventDescription` = '$eventdescription', `eventImage` = '$display_files' WHERE `eventId` = '$id' ";
	$updatePortfolioResult = mysqli_query($conn,$updatePortfolioQuery);
	
	if($updatePortfolioResult) {
		header("Location:../user_admin/settings-events.php");
	} else {
		mysqli_error($conn);
	}

}



?>