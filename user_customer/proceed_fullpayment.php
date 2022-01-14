<?php 
   include("sessions.php");
   
   include("header.php");

   include("../function/database.php");
   $conn = $database;
   
   $VID = $_GET['VID'];
   
   $portfolioInfoQuery    = "SELECT * FROM portfolio 
   JOIN vendor ON portfolio.vendor_Id = vendor.vendorId WHERE portfolio.vendor_Id = '$VID'  ";

   $portfolioInfoResult   = mysqli_query($conn,$portfolioInfoQuery);
   
   while($portfolioInfoRow = mysqli_fetch_assoc($portfolioInfoResult)) {

       // vendor information;
       $fetchId        = $portfolioInfoRow['vendor_Id'];
       $fetchFirstName = $portfolioInfoRow['vendorFirstName'];
       $fetchLastName  = $portfolioInfoRow['vendorLastName'];

       $fetchAddress   = $portfolioInfoRow['vendorAddress'];
       $fetchNumber    = $portfolioInfoRow['vendorNumber'];

       // concat name;
       $concatName     = $fetchFirstName.' '.$fetchLastName;


       $id        = $portfolioInfoRow['portfolioId'];
       $workid    = $portfolioInfoRow['vendorWork_Id'];
       $firstname = $portfolioInfoRow['portfolioFirstName'];
       $lastname  = $portfolioInfoRow['portfolioLastName'];
   
       $fullname  = $firstname.' '.$lastname;
   
       $address   = $portfolioInfoRow['portfolioAddress'];
       $email     = $portfolioInfoRow['portfolioEmail'];
       $position           = $portfolioInfoRow['portfolioVendorPosition'];
       $portfolio_image    = $portfolioInfoRow['portfolioProfileImage'];
   
       $status = $portfolioInfoRow['portfolioStatus'];
   
       $description = $portfolioInfoRow['portfolioDescription'];
   
   
       $booking_rate = $portfolioInfoRow['portfolioBookingRate'];
   
   
       // price range
   
       if($portfolioInfoRow['portfolioStartPrice'] == 0) {
          $start_price = 0;
       } else {
          $start_price = $portfolioInfoRow['portfolioStartPrice'];
       }
   
       if($portfolioInfoRow['portfolioEndPrice'] == 0) {
           $end_price = "";
       } else {
           $end_price = $portfolioInfoRow['portfolioEndPrice'];
       }
   
       if($position == "Both") {
         $positionDisplay = "Photographer and Videographer";
       } else if($position == "None") {
         $positionDisplay = "None";
       } else if($position == "Photographer") {
           $positionDisplay = "Photographer";
       } else if($position == "Videographer") {
           $positionDisplay = "Videographer";
       }
   }

   $BID = $_GET['BID'];
   
   $bookingInfoQuery    = "SELECT * FROM booking WHERE bookingId = '$BID' ";
   $bookingInfoResult   = mysqli_query($conn,$bookingInfoQuery);
   
   while($bookingInfoRow = mysqli_fetch_assoc($bookingInfoResult)) {


   $booking_start_date = $bookingInfoRow['eventStartDate'];
   $booking_end_date = $bookingInfoRow['eventEndDate'];
   $booking_start_time = $bookingInfoRow['eventStartTime'];
   $booking_end_time = $bookingInfoRow['eventEndTime'];
   $booking_details = $bookingInfoRow['eventDetails'];

   $balance = $bookingInfoRow['eventBalance'];
   
   }

      
   ?>
<body id="page-top">
   <!-- Page Wrapper -->
   <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#395232">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon">
               <img src="../resources/img/filmcraft.png" width="150">
            </div>
         </a>
         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
            <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
            <a class="nav-link" href="view_vendor.php">
            <i class="fas fa-fw fa-users"></i>
            <span>View Vendors</span></a>
         </li>
         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
            <a class="nav-link" href="find_vendor.php">
            <i class="fas fa-fw fa-location-arrow"></i>
            <span>Find Vendors</span></a>
         </li>
         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
            <a class="nav-link" href="manage_booking.php">
            <i class="far fa-fw fa-bookmark"></i> 
            <span>Manage Bookings</span></a>
         </li>
      </ul>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
         <!-- Main Content -->
         <div id="content">
            <!-- Topbar -->
                    <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

            
                         <!-- Notifications -->
                          <?php include("notifications.php") ?>
                        <!-- Notifications -->

                        <!-- Top Navigation -->
                         <?php include("topnav.php") ?>
                        <!-- Top Navigation -->

            

                    </ul>

                </nav>
                <!-- End of Topbar -->
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Page Heading -->
               <h1 class="h3 mb-5 text-gray-800">Proceed Payment For This Vendor</h1>
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <div class="card-header py-3 text-right">
                           <a href="manage_booking.php" class="btn btn-danger" onclick="alert('Are you sure you want to cancel the full payment?');"><i class="fa fa-arrow-left"></i> Cancel Payment </a>
                        </div>
                  </div>
                  <div class="card-body">
                    <div class="card-body">

                           <input type="hidden" value="<?php echo $displayId ?>" name="customerID">
                           <input type="hidden" value="<?php echo $fetchId ?>" name="vendorID">
                           
                           <div class="col-md-12 mx-auto">
                              <div class="row">
                                 <div class="col-xl-12">
                                    <!-- Account details card-->
                                    <div class="card mb-4">
                                       <div class="card-header">Selected Vendor Details</div>
                                       <div class="card-body">
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (first name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Vendor Name</label>
                                                <input class="form-control" id="inputUsername" type="text" value="<?php echo $fullname ?>" name="vendor_name" readonly>
                                             </div>
                                             <!-- Form Group (last name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Vendor Position</label>
                                                <input class="form-control" id="inputUsername" type="text" value="<?php echo $positionDisplay ?>" name="vendor_position" readonly>
                                             </div>
                                          </div>
                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (first name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">Minimum Booking Rate</label>
                                                <input class="form-control" id="inputFirstName" type="text" value="<?php echo $booking_rate ?>" name="vendor_bookingrate" readonly>
                                             </div>
                                             <!-- Form Group (last name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Minimum Vendor Price</label>
                                                <input class="form-control" id="inputLastName" type="text" value="<?php echo $start_price ?>" name="vendor_startprice" readonly>
                                             </div>
                                            </div>
                                          <!-- Form Group (email address)-->
                                          <div class="mb-3">
                                             <label class="small mb-1" for="inputAddress">Vendor Address</label>
                                             <input class="form-control" id="inputAddress" type="text" value="<?php echo $fetchAddress ?>" name="vendor_address" readonly>
                                          </div>
                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (phone number)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Vendor Phone number</label>
                                                <input class="form-control" id="inputPhone" type="tel" value="<?php echo $fetchNumber ?>" name="vendor_phonenumber" readonly>
                                             </div>
                                             <!-- Form Group (birthday)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Vendor Email Address</label>
                                                <input class="form-control" id="inputBirthday" type="text" value="<?php echo $email ?>" name="vendor_email" readonly>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 mx-auto">
                              <div class="row">
                                 <div class="col-xl-12">
                                    <!-- Account details card-->
                                    <div class="card mb-4">
                                       <div class="card-header">Selected Booked Details</div>
                                       <div class="card-body">

                                         <div class="row gx-3 mb-3">

                                            
                                             <!-- Form Group (first name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Customer Remaining Balance</label>
                                                <input class="form-control" id="inputUsername" value="<?php echo $balance ?>" type="text" name="customer_remaining_balance" readonly>
                                             </div>

                                            
                                          </div>

                                          <div class="row gx-3 mb-3">


                                             <!-- Form Group (first name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Start Date of Event</label>
                                                <input class="form-control" id="inputUsername" value="<?php echo $booking_start_date ?>" type="date" name="start_date_event" readonly>
                                             </div>

                                              <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">End Date of Event</label>
                                                <input class="form-control" id="inputUsername" value="<?php echo $booking_end_date ?>" type="date" name="end_date_event" readonly>
                                             </div>
                                          </div>
                                          <div class="row gx-3 mb-3">
                                          
                                              <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Start Time of the Event</label>
                                                <input class="form-control" type="time" value="<?php echo $booking_start_time ?>" name="start_time_event" readonly >
                                             </div>

                                              <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">End Time of the Event</label>
                                                <input class="form-control" type="time" name="end_time_event" value="<?php echo $booking_end_time ?>" readonly>
                                             </div>
                                             <!-- Form Group (last name)-->
                                           
                                          </div>
                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (first name)-->
                                             <div class="col-md-12">
                                                <label class="small mb-1" for="inputUsername">Input Event Details</label>
                                                <textarea class="form-control" name="event_details" value="<?php echo $booking_details ?>" readonly><?php echo $booking_details ?></textarea>
                                              </div>
                                          </div>
                                          <!-- Form Group (email address)-->
                                           <div class="mb-3">
                                            <h4><strong>Select Mode of Payment:</strong></h4>
                                          </div>
                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3 text-center">
                                             <!-- Form Group (phone number)-->
                                              <div class="btn-block" id="paypal-payment-button">
                                                   </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
   </div>
   <!-- End of Page Wrapper -->
   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
   </a>
   <!-- -->
   <?php include("logout-modal.php") ?>
   <!-- --> 
   
   <?php 
      include("footer.php");
   ?>

   <!-- Ab7UWyVXVIDKMEzVMDeN7c3MvcmLb5yzDuXTF_QKf287zkEHFkCzNDm2KSXbRhCY36sPrAp1HSzrYRz5 -->

   <script src="https://www.paypal.com/sdk/js?client-id=Ab7UWyVXVIDKMEzVMDeN7c3MvcmLb5yzDuXTF_QKf287zkEHFkCzNDm2KSXbRhCY36sPrAp1HSzrYRz5&currency=PHP&disable-funding=credit,card" data-sdk-integration-source="button-factory"></script>
   <!-- Latest compiled and minified JavaScript -->

   <script>
    var value = "<?php echo $balance ?>";
    paypal.Buttons({
    style : {
        color: 'gold',
        shape: 'pill',
        layout: 'vertical',
        label: 'pay'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                name: "Vendor Booking Payment",
                amount: {
                    currency_code: "PHP",
                    value: value

                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            var cid = <?php echo $displayId ?>;
            var pid = <?php echo $VID ?>;
            var bid = <?php echo $BID ?>;
            var bal = <?php echo $balance ?>

            // URL which to send the value to.
            const url = "../function/add_vendor_booking_full_payment.php?CID="+ cid+"&PID="+ pid+"&BID="+bid+"&BAL="+bal;

            // Message to send. In this example an object with a state property.
            // You can change the properties to whatever you want.
            const message = { status: 'success' };

            // Send it to the URL with the POST method 
            // and send the message in JSON format.
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(message)
            }).catch(function(error) {
                console.log(error); // Display error if there is one.
            });

            })
    },
    onCancel: function (data) {
        //window.location.replace("http://localhost:63342/tutorial/paypal/Oncancel.php")
        var cid = <?php echo $displayId ?>;
        var pid = <?php echo $VID ?>;
        var bid = <?php echo $BID ?>;
        var bal = <?php echo $balance ?>

        //var pid = <?php echo $VID ?>;
        const url = "../function/add_vendor_booking_full_payment.php?CID="+ cid+"&PID="+ pid+"&BID="+bid+"&BAL="+bal;
    }
}).render('#paypal-payment-button');
</script>