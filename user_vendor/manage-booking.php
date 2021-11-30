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
                <a class="nav-link" href="manage-portfolio.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manage Portfolio</span></a>
                </li>


              <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="manage-booking.php">
                    <i class="far fa-fw fa-bookmark"></i>
                    <span>Manage Booking</span></a>
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
                                            <th>Customer Name</th>
                                            <th>Vendor Booked</th>
                                            <th>Status</th>
                                            <th>Start Of Transaction</th>
                                            <th>End Of Transaction</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>

                                        <?php 

                                        $queryBooking = "SELECT * FROM booking JOIN customer ON booking.customer_Id = customer.customerId JOIN vendor ON booking.vendor_Id = vendor.vendorId 
                                        WHERE booking.vendor_Id = '$displayId' 
                                        ";
                                        $resultBooking = mysqli_query($conn,$queryBooking);
                                        while($rowBooking = mysqli_fetch_assoc($resultBooking)) {

                                        $cfname = $rowBooking['customerFirstName'];
                                        $clname = $rowBooking['customerLastName'];

                                        $customerFullName = $cfname.' '.$clname;

                                        $vfname = $rowBooking['vendorFirstName'];
                                        $vlname = $rowBooking['vendorLastName'];

                                        $vendorFullName = $vfname.' '.$vlname;

                                        $bookingStartDate = $rowBooking['bookingStartDate'];
                                        $bookingEndDate = $rowBooking['bookingEndDate'];

                                        ?>

                                        <tr>
                                            <td><?php echo $customerFullName ?></td>
                                            <td><?php echo $vendorFullName ?></td>
                                            <td>Pending</td>
                                            <td><?php echo $bookingStartDate ?></td>
                                            <td><?php echo $bookingEndDate ?></td>
                                            <td>
                                                <a class="btn btn-primary">Accept</a>
                                                <a class="btn btn-danger">Decline</a>
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