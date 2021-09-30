	$filename = "";
	$maxsize = 5242880; // 5MB
	$date = date("Y-m-d");
	if(isset($_FILES['files'])) {
		if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg") {
			if($_FILES['files']['type'] == "image/png" || $_FILES['files']['type'] == "image/jpeg") {
				if($_FILES['files']['type'] < $maxsize) {
					$filename = "../files/images/" .$date."_".$_FILES['files']['name'];
						move_uploaded_file($_FILES['files']['tmp_name'], $filename);	
						 $display_files = $filename;
				 }
	   	 	   }
	  		} else if($_FILES['files']['type'] == "video/mp4" || $_FILES["files"]["type"] == "video/avi") {
	  			$name = $_FILES['files']['name'];
       			$date = date("Y-m-d");
       			$target_dir = "../files/videos/";
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
			             }
			          }

			       }else{
			          $_SESSION['message'] = "Invalid file extension.";
			       }
			  
	  			} else {
	  				// if no video / images available return back to the profile page
	  				header("Location:../user_admin_index.php");
	  			}
	 		 }