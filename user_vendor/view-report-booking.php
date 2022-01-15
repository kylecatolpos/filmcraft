  <?php 
   require_once '../resources/dompdf/autoload.inc.php';
   require("../function/database.php");

   require("sessions.php");

   session_start();
   // create database connection
   $conn = $database;
   
   use Dompdf\Dompdf;
   $dompdf = new Dompdf();
   ob_start();
   
   ?>

<!DOCTYPE html>
<html>
<head>
  <title>Vendr Account Reports</title>
  <style type="text/css">

  	table {
  		padding-top:10px;
  	}

    th, td {
      border: solid 1px #777;
      padding: 2px;
      margin: 2px;
      width:50px;
    }
  </style>
</head>
<body>

<h2>Vendor Booking Reports</h2>
<hr>

<table>
  <tr>
    <th>Customer</th>
    <th>Booked Vendor</th>
    <th>Downpayment</th>
    <th>Downpayment Status</th>
    <th>Total Price</th>
    <th>Balance</th>
    <th>Event Date</th>
    <th>Event Time</th>
    <th>Payment Method</th>
    <th>Booking Status</th>
  </tr>

 <?php 

  $query = "SELECT * FROM booking 
  JOIN customer ON customer.customerId = booking.customer_Id
  JOIN vendor ON vendor.vendorId = booking.vendor_Id
  WHERE booking.bookingDpStatus != 0 and ;
  ";
 $resultQuery = mysqli_query($conn,$query);

  while($rowQuery = mysqli_fetch_assoc($resultQuery)) {

                                        $vendorFirstName = $rowQuery['vendorFirstName'];
                                        $vendorLastName = $rowQuery['vendorLastName'];
                                        $vendorFullName = $vendorFirstName.' '.$vendorLastName;

                                        $customerFirstName = $rowQuery['customerFirstName'];
                                        $customerLastName = $rowQuery['customerLastName'];
                                        $customerFullName = $customerFirstName.' '.$customerLastName;

                                        $bookingDP = $rowQuery['bookingDp'];

                                        $bookingDpStatus = $rowQuery['bookingDpStatus'];

                                        $eventFinalPrice = $rowQuery['eventFinalPrice'];
                                        $eventBalance = $rowQuery['eventBalance'];


                                        $eventStartDate = $rowQuery['eventStartDate'];
                                        $eventEndDate = $rowQuery['eventEndDate'];
                                        $eventStartTime = $rowQuery['eventStartTime'];
                                        $eventEndTime = $rowQuery['eventEndTime'];


                                        $startDate = date('F d, Y',strtotime($eventStartDate));
                                        $endDate = date('F d, Y',strtotime($eventEndDate));
                                        $startTime = date('H:i:s A',strtotime($eventStartTime));
                                        $endTime = date('H:i:s A',strtotime($eventEndTime));

                                        $eventDetails = $rowQuery['eventDetails'];
                                        $bookingPaymentMethod = $rowQuery['bookingPaymentMethod'];
                                        $bookingPaymentStatus = $rowQuery['bookingPaymentStatus'];

                                        ?>

  <tr>
                                            <td><?php echo $customerFullName ?></td>
                                            <td><?php echo $vendorFullName ?></td>
                                            <td><?php echo $bookingDP ?></td>
                                            <td>
                                             <?php if($bookingDpStatus == 1) { ?>
                                                Paid
                                             <?php } else if($bookingDpStatus == 2) { ?>
                                                Paid
                                             <?php } ?>
                                            </td>
                                            <td><?php echo $eventFinalPrice ?></td>
                                            <td><?php echo $eventBalance ?></td>
                                            <td><?php echo $startDate ?> - <?php echo $endDate ?> </td>
                                            <td><?php echo $startTime ?> - <?php echo $endTime ?> </td>
                                            <td><?php echo $bookingPaymentMethod ?></td>
                                            <td>
                                                 <?php if($bookingPaymentStatus == 1) { ?>
                                                Not Yet Fully Paid
                                             <?php } else if($bookingPaymentStatus == 2) { ?>
                                                Fully Paid
                                             <?php } ?>
                                            </td>
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