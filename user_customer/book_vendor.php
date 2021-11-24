<?php 
   include("sessions.php");
   
   include("header.php");
   
   $VID = $_GET['VID'];
   
   $conn               = mysqli_connect("localhost","root","","filmcraft");
   $portfolioInfoQuery    = "SELECT * FROM portfolio JOIN vendor ON portfolio.vendor_Id = vendor.vendorId WHERE portfolio.vendor_Id = '$VID'  ";
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
         <li class="nav-item active">
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
         <li class="nav-item">
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
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
               <!-- Sidebar Toggle (Topbar) -->
               <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
               <i class="fa fa-bars"></i>
               </button>
               <!-- Topbar Navbar -->
               <ul class="navbar-nav ml-auto">
                  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                  <li class="nav-item dropdown no-arrow d-sm-none">
                     <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-search fa-fw"></i>
                     </a>
                     <!-- Dropdown - Messages -->
                     <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                           <div class="input-group">
                              <input type="text" class="form-control bg-light border-0 small"
                                 placeholder="Search for..." aria-label="Search"
                                 aria-describedby="basic-addon2">
                              <div class="input-group-append">
                                 <button class="btn btn-primary" type="button">
                                 <i class="fas fa-search fa-sm"></i>
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </li>
                  <!-- Nav Item - Alerts -->
                  <li class="nav-item dropdown no-arrow mx-1">
                     <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                     </a>
                     <!-- Dropdown - Alerts -->
                     <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header" style="background-color:#395232;border:1px solid #395232">
                           Notifications
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                           <div class="mr-3">
                              <div class="icon-circle bg-primary">
                                 <i class="fas fa-file-alt text-white"></i>
                              </div>
                           </div>
                           <div>
                              <div class="small text-gray-500">December 12, 2019</div>
                              <span class="font-weight-bold">A new monthly report is ready to download!</span>
                           </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                           <div class="mr-3">
                              <div class="icon-circle bg-success">
                                 <i class="fas fa-donate text-white"></i>
                              </div>
                           </div>
                           <div>
                              <div class="small text-gray-500">December 7, 2019</div>
                              $290.29 has been deposited into your account!
                           </div>
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                           <div class="mr-3">
                              <div class="icon-circle bg-warning">
                                 <i class="fas fa-exclamation-triangle text-white"></i>
                              </div>
                           </div>
                           <div>
                              <div class="small text-gray-500">December 2, 2019</div>
                              Spending Alert: We've noticed unusually high spending for your account.
                           </div>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="#">View Notifications</a>
                     </div>
                  </li>
                  <div class="topbar-divider d-none d-sm-block"></div>
                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $displayName ?></span>
                     <img class="img-profile rounded-circle"
                        src="<?php echo $displayImage ?>">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                        </a>
                        <a class="dropdown-item" href="settings.php">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                        </a>
                     </div>
                  </li>
               </ul>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
               <!-- Page Heading -->
               <h1 class="h3 mb-5 text-gray-800">Booked Selected Vendor</h1>
               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                  <div class="card-header py-3">
                     <div class="card-header py-3 text-right">
                           <a href="view_vendor.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Return</a>
                        </div>
                  </div>
                  <div class="card-body">
                     <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="card-body">
                           <input type="hidden" value="<?php echo $displayId ?>" name="id">
                           <input type="hidden" value="<?php echo $profile_image ?>" name="profile_image">
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
                                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $fullname ?>" name="vendor_name" readonly>
                                             </div>
                                             <!-- Form Group (last name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Vendor Position</label>
                                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $positionDisplay ?>" name="vendor_position" readonly>
                                             </div>
                                          </div>
                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (first name)-->
                                             <div class="col-md-4">
                                                <label class="small mb-1" for="inputFirstName">Minimum Booking Rate</label>
                                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $booking_rate ?>" name="vendor_bookingrate" readonly>
                                             </div>
                                             <!-- Form Group (last name)-->
                                             <div class="col-md-4">
                                                <label class="small mb-1" for="inputLastName">Minimum Vendor Price</label>
                                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo $start_price ?>" name="vendor_startprice" readonly>
                                             </div>
                                              <div class="col-md-4">
                                                <label class="small mb-1" for="inputLastName">Maximum Vendor Price</label>
                                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo $end_price ?>" name="vendor_endprice" readonly>
                                             </div>
                                          </div>
                                          <!-- Form Group (email address)-->
                                          <div class="mb-3">
                                             <label class="small mb-1" for="inputAddress">Vendor Address</label>
                                             <input class="form-control" id="inputAddress" type="text" placeholder="Enter your address" value="<?php echo $fetchAddress ?>" name="vendor_address" readonly>
                                          </div>
                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (phone number)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Vendor Phone number</label>
                                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="<?php echo $fetchNumber ?>" name="vendor_phonenumber" readonly>
                                             </div>
                                             <!-- Form Group (birthday)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputBirthday">Vendor Email Address</label>
                                                <input class="form-control" id="inputBirthday" type="text" placeholder="Enter your birthday" value="<?php echo $email ?>" name="vendor_email" readonly>
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
                                       <div class="card-header">Enter Booked Details</div>
                                       <div class="card-body">
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (first name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Date of Event</label>
                                                <input class="form-control" id="inputUsername" min="<?php echo date('Y-m-d'); ?>" type="date" placeholder="Enter date of the event" name="book_date">
                                             </div>
                                             <!-- Form Group (last name)-->
                                           
                                          </div>
                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (first name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Starting Time of Event</label>
                                                <input class="form-control" id="inputUsername" type="time" placeholder="Enter starting time of the event" name="book_start_time">
                                             </div>
                                             <!-- Form Group (last name)-->
                                             <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Ending Time of Event</label>
                                                <input class="form-control" id="inputUsername" type="time" placeholder="Enter ending time of the event" name="book_end_time">
                                             </div>
                                          </div>
                                          <!-- Form Group (email address)-->
                                           <div class="mb-3">
                                            <h4><strong>Select Mode of Payment:</strong></h4>
                                          </div>
                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (phone number)-->
                                             <div class="col-md-6">
                                                 <a href="#" class="btn btn-primary btn-md btn-block text-capitalize">Proceed payment thru cash</a>
                                             </div>
                                              <div class="col-md-6">
                                                 <a href="#" class="btn btn-info btn-md btn-block text-capitalize">Proceed payment with PayPal</a>
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
   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
         </div>
      </div>
   </div>
   <?php 
      include("footer.php");
      
      ?>