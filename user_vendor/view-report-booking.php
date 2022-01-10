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
  <title>Customer Account Reports</title>
  <style type="text/css">

  	table {
  		padding-top:10px;
  	}

    th, td {
      border: solid 1px #777;
      padding: 2px;
      margin: 2px;
      width:300px;
    }
  </style>
</head>
<body>

<h2>Customer Account Reports</h2>
<hr>

<table>
  <tr>
    <th>Customer Name</th>
    <th>Customer Email</th>
  </tr>

 <?php 

 $sql = "SELECT * FROM customer";
 $result = mysqli_query($conn,$sql);

 while($getRow = mysqli_fetch_assoc($result)) {

    $email          = $getRow['customerEmail'];
    $firstname      = $getRow['customerFirstName'];
    $lastname       = $getRow['customerLastName'];
    $gender         = $getRow['customerGender'];
    $birthdate      = $getRow['customerBirthdate'];
    $phonenumber    = $getRow['customerNumber'];
    $address        = $getRow['customerAddress'];

    $customer_fullname = $firstname.' '.$lastname;

    // check if gender is none;
    if($gender == 'None') {
       $displayGender = 'I prefer not to say';
    } else {
       $displayGender = $gender;
    }

 ?>

  <tr>
    <td><?php echo $customer_fullname ?></td>
    <td><?php echo $email ?></td>
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