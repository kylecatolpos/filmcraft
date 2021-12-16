<?php



include("database.php");
$conn = $database;

if(isset($_POST['actionEditWorks'])) {

	// POST variables
	$workId = $_POST['worksId'];
	$vendorWorksId = $_POST['vendorWorksId']; // portfolio_works
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
			                $sqlUpdateImages = "UPDATE works SET `occassion` = '$occassion', `occassion_type` = '$occassion_type', `occassion_file` = '$display_files', `occassion_file_type` = '$image_file_type' WHERE `worksId` = '$workId' AND `portfolioWorks_Id` = '$vendorWorksId' ";
			                 $resultUpdateImages = mysqli_query($conn,$sqlUpdateImages);

			       
			                	if($resultUpdateImages) {
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
			                 $sqlUpdateVideos = "UPDATE works SET `occassion` = '$occassion', `occassion_type` = '$occassion_type', `occassion_file` = '$display_files', `occassion_file_type` = '$videos_file_type' WHERE `worksId` = '$workId' AND `portfolioWorks_Id` = '$vendorWorksId' ";
			                 $resultUpdateVideos = mysqli_query($conn,$sqlUpdateVideos);

			                if($resultUpdateVideos) {
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