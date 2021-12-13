<?php


include("database.php");
$conn = $database;

if(isset($_POST['actionAddEvents'])) {

	// POST variables
	$eventname = $_POST['eventname'];
	$eventdescription = $_POST['eventdescription'];

	// code for image / videos

	$filename = "";
	//$maxsize = 5242880; // 5MB
	//$maxsize = 1073741824; // 1GB ??
	$maxsize = 41943040; // 40MB MAX
	$date = date("Y-m-d");
	if(isset($_FILES['files'])) {
		if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg" || $_FILES['files']['type'] == "image/jpg") {
			if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg" || $_FILES['files']['type'] == "image/jpg" ) {
				if($_FILES['files']['type'] < $maxsize) {
					$filename = "../files/images/works/" .$date."_".$_FILES['files']['name'];
						move_uploaded_file($_FILES['files']['tmp_name'], $filename);	
						 $display_files = $filename;
						    $sqlInsertImages = "INSERT INTO events (eventId,eventName,eventDescription,eventImage) VALUES (NULL,'$eventname','$eventdescription','$display_files')";
			                $resultInsertImages = mysqli_query($conn,$sqlInsertImages);

			                 var_dump($conn);


			                	if($resultInsertImages) {
			                		header("Location:../user_admin/settings-events.php");
			                	} else {
			                		mysqli_error($conn);
			                	}
				 }
	   	 	   }
	  		} else {
	  			 	// if no video / images available return back to the profile page
	  				header("Location:../user_admin/add-settings-events.php");
	  			}
	 		 }
	 	  }
?>