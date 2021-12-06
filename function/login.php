<?php 

session_start();


include("database.php");
$conn = $database;

// code for login when user press 
if(isset($_POST['actionLogin'])) {

    $number     = 0;
    $str        = "Invalid Username or Password";

    if(isset($_POST['email']) && isset($_POST['password'])) {

    $email      = $_POST['email'];
    $password   = $_POST['password'];
    
    // hash password
    $hash_password = md5($password);
    

 	$sql = "SELECT * FROM admin WHERE (`adminEmail` LIKE '$email') AND (`adminPassword` LIKE '$hash_password') AND adminUserType = 'admin' ";
 	$result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['adminId'] = $row['adminId'];
        $_SESSION['displayName'] = $row['adminFirstName'].' '. $row['adminLastName'];
        $_SESSION['displayImage'] = $row['adminProfileImage'];
        $number = 1;
        header("Location:../user_admin/index.php");
     }


    $sql = "SELECT * FROM vendor WHERE (`vendorEmail` LIKE '$email') AND (`vendorPassword` LIKE '$hash_password') AND vendorUserType = 'vendor' ";
    $result = mysqli_query($conn, $sql);

     
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['vendorId'] = $row['vendorId'];
        $_SESSION['displayName'] = $row['vendorFirstName'].' '. $row['vendorLastName'];
        $_SESSION['displayImage'] = $row['vendorProfileImage'];
        $number = 1;
        header("Location:../user_vendor/index.php"); 
     }
    

    
    $sql = "SELECT * FROM customer WHERE (`customerEmail` LIKE '$email') AND (`customerPassword` LIKE '$hash_password') AND customerUserType = 'customer' ";
    $result = mysqli_query($conn, $sql);

  
    if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['customerId'] = $row['customerId'];
            $_SESSION['displayName'] = $row['customerFirstName'].' '. $row['customerLastName'];
            $_SESSION['displayImage'] = $row['customerProfileImage'];
            $number = 1;
            header("Location:../user_customer/index.php"); 
         }


        if($number != 1 ) {
           header("Location:../login.php");
        }



         }
       }
 
?>