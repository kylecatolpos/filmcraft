<?php



include("database.php");
$conn = $database;

if(isset($_POST['actionAddWorks'])) {

	// POST variables
	$vendorWorksId = $_POST['vendorWorksId'];
	$occassion = $_POST['occassion'];
	$occassion_type = $_POST['occassion_type'];

	// code for image / videos

	$filename = "";
	//$maxsize = 5242880; // 5MB
	//$maxsize = 1073741824; // 1GB ??
	$maxsize = 41943040; // 40MB MAX
	$date = date("Y-m-d");
	if(isset($_FILES['files'])) {
		if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg") {
			if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg") {
				if($_FILES['files']['type'] < $maxsize) {
					$filename = "../files/images/works/" .$date."_".$_FILES['files']['name'];
						move_uploaded_file($_FILES['files']['tmp_name'], $filename);	
						 $display_files = $filename;
						 $image_file_type = $_FILES['files']['type'];
						    $sqlInsertImages = "INSERT INTO works (worksId,portfolioWorks_Id,occassion,occassion_type,occassion_file,occassion_file_type) VALUES (NULL,'$vendorWorksId','$occassion','$occassion_type','$display_files','$image_file_type')";
			                $resultInsertImages = mysqli_query($conn,$sqlInsertImages);

			                	if($resultInsertImages) {
			                		header("Location:../user_vendor/manage-portfolio.php");
			                	} else {
			                		mysqli_error($conn);
			                	}
				 }
	   	 	   }
	  		} else if($_FILES['files']['type'] == "video/mp4" || $_FILES["files"]["type"] == "video/avi") {
	  			$name = $_FILES['files']['name'];
       			$date = date("Y-m-d");
       			$target_dir = "../files/videos/works/";
       			$target_file = $target_dir .$date."_".$_FILES["files"]["name"];  

       			// Select file type
       			$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       			// Valid file extensions
       			$extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       			var_dump($extension);
			       // Check extension
			       if(in_array($extension,$extensions_arr)) {
			          // Check file size
			          if(($_FILES['files']['size'] >= $maxsize) || ($_FILES["files"]["size"] == 0)) {
			             $_SESSION['message'] = "File too large. File must be less than 5MB.";
			             echo "test";
			          }else{
			             // Upload
			             if(move_uploaded_file($_FILES['files']['tmp_name'], $target_file)) {
			                $display_files = $target_file;
			                $videos_file_type = $_FILES['files']['type'];
			                $sqlInsertVideo = "INSERT INTO works (worksId,portfolioWorks_Id,occassion,occassion_type,occassion_file,occassion_file_type) VALUES (NULL,'$vendorWorksId','$occassion','$occassion_type','$display_files','$videos_file_type')";
			                $resultInsertVideo = mysqli_query($conn,$sqlInsertVideo);

			                	if($resultInsertVideo) {
			                		header("Location:../user_vendor/manage-portfolio.php");
			                	} else {
			                		mysqli_error($conn);
			                	}
			             }
			          }

			       }else{
			          $_SESSION['message'] = "Invalid file extension.";
			       }
			  
	  			} else {
	  				// if no video / images available return back to the profile page
	  				header("Location:../user_vendor/manage-portfolio.php");
	  			}
	 		 }
	 	  }
?>