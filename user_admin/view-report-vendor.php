  <?php 
   require_once '../resources/dompdf/autoload.inc.php';
   require("../function/database.php");

   // create database connection
   $conn = $database;
   
   use Dompdf\Dompdf;
   $dompdf = new Dompdf();
   ob_start();
   
   ?>

<!DOCTYPE html>
<html>
<head>
  <title>Vendor Account Reports</title>
  <style type="text/css">

  	table {
  		padding-top:10px;
  	}

    th, td {
      border: solid 1px #777;
      padding: 2px;
      margin: 2px;
      width:200px;
    }
  </style>
</head>
<body>

<h2>Vendor Account Reports</h2>
<hr>

<table>
  <tr>
    <th>Vendor Name</th>
    <th>Vendor Email</th>
    <th>Vendor Status</th>
  </tr>

 <?php 

 $sql = "SELECT * FROM vendor";
 $result = mysqli_query($conn,$sql);

 while($getRow = mysqli_fetch_assoc($result)) {

    $email          = $getRow['vendorEmail'];
    $firstname      = $getRow['vendorFirstName'];
    $lastname       = $getRow['vendorLastName'];
    $gender         = $getRow['vendorGender'];
    $birthdate      = $getRow['vendorBirthdate'];
    $phonenumber    = $getRow['vendorNumber'];
    $address        = $getRow['vendorAddress'];

    $vendor_fullname = $firstname.' '.$lastname;

    $status = $getRow['vendorStatus'];

    // check if gender is none;
    if($gender == 'None') {
       $displayGender = 'I prefer not to say';
    } else {
       $displayGender = $gender;
    }

    if($status == '1') {
       $displayStatus = 'Verified';
    } else {
       $displayStatus = 'Not Verified';
    }

 ?>

  <tr>
    <td><?php echo $vendor_fullname ?></td>
    <td><?php echo $email ?></td>
    <td><?php echo $displayStatus ?></td>
   </tr>

 <?php } ?>

  </table>
</body>
</html>




   <?php
   $html = ob_get_clean();
   $dompdf->loadHtml($html);
   $dompdf->setPaper('A4', 'portrait');
   $dompdf->render();
   $dompdf->stream("codexworld",array("Attachment"=>0));
   
   ?>