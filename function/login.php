<?php 

session_start();

// code for login when user press 
if(isset($_POST['actionLogin'])) {

 	$email 	  	= $_POST['email'];
 	$password 	= $_POST['password'];

    // hash password
    $hash_password = md5($password);

 	$sql = "SELECT * FROM admin WHERE (`adminEmail` LIKE '$email') AND (`adminPassword` LIKE '$hash_password')";
 	$conn = mysqli_connect("localhost","root","","filmcraft");
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['adminId'] = $row['adminId'];
        $_SESSION['displayName'] = $row['adminFirstName'].' '. $row['adminLastName'];
        $_SESSION['displayImage'] = $row['adminProfileImage'];
        header("Location:../user_admin/index.php"); 
    } else {

    $sql = "SELECT * FROM vendor WHERE (`vendorEmail` LIKE '$email') AND (`vendorPassword` LIKE '$hash_password')";
 	$conn = mysqli_connect("localhost","root","","filmcraft");
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['vendorId'] = $row['vendorId'];
        $_SESSION['displayName'] = $row['vendorFirstName'].' '. $row['vendorLastName'];
        $_SESSION['displayImage'] = $row['vendorProfileImage'];
        header("Location:../user_vendor/index.php"); 
     } else {
    	header("Location:../login.php");
     }
   }   
}



?>