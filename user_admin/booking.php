<?php 


include("sessions.php");

include("header.php");


include("../function/database.php");
$conn = $database;

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
                <a class="nav-link" href="portfolio.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Portfolio</span></a>
                </li>


              <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="booking.php">
                    <i class="far fa-fw fa-bookmark"></i>
                    <span>Booking</span></a>
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

                        <!-- Notifications -->
                          <?php include("notifications.php") ?>
                        <!-- Notifications -->

                        <!-- Top Navigation -->
                         <?php include("topnav.php") ?>
                        <!-- Top Navigation -->


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Booking</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manage Bookings</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
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
                                    </thead>
                                 
                                    <tbody>

                                        <?php 

                                        $query = "SELECT * FROM booking 
                                        JOIN customer ON customer.customerId = booking.customer_Id
                                        JOIN vendor ON vendor.vendorId = booking.vendor_Id
                                        WHERE booking.bookingDpStatus != 0;
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

                                    </tbody>
                                </table>
                            </div>
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