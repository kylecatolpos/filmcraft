<?php 

include("sessions.php");

include("header.php");

include("../function/database.php");
$conn = $database;

$vendor_assign_event = $_GET['eid'];

$showEventSql = "SELECT * FROM events WHERE eventId = '$vendor_assign_event' ";
$resultShowEvent = mysqli_query($conn,$showEventSql);

while($rowShowEvent = mysqli_fetch_assoc($resultShowEvent)) {
    $showEventName = $rowShowEvent['eventName'];
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
                    <h1 class="h3 mb-5 text-gray-800">View Event <?php echo $showEventName ?></h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-right">
                          <a href="index.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Return</a>
                         </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTablex" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Vendor Name</th>
                                            <th>Vendor Position</th>
                                            <th>View Vendor Portfolio</th>
                                            <th>Booked Vendor</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <?php 

                                        $query = "SELECT * FROM portfolio
                                        JOIN vendor ON portfolio.vendor_Id = vendor.vendorId
                                        WHERE vendor.vendorStatus = '1' AND portfolio.portfolioEvent = '$vendor_assign_event' 
                                        ";
                                        $result = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)) {

                                        $portfolioSessionStatus = $row['portfolioSessionStatus'];

                                        $fetchId        = $row['vendor_Id'];
                                        $fetchFirstName = $row['vendorFirstName'];
                                        $fetchLastName  = $row['vendorLastName'];

                                        // concat name;
                                        $concatName     = $fetchFirstName.' '.$fetchLastName;
                                        $fetchPosition  = $row['portfolioVendorPosition'];

                                          if($fetchPosition == "Both") {
                                          $positionDisplay = "Photographer and Videographer";
                                        } else if($fetchPosition == "None") {
                                          $positionDisplay = "None";
                                        } else if($fetchPosition == "Photographer") {
                                            $positionDisplay = "Photographer";
                                        } else if($fetchPosition == "Videographer") {
                                            $positionDisplay = "Videographer";
                                        }

                                        ?>
                                        <tr>
                                            <td><?php echo $concatName ?></td>
                                            <td><?php echo $positionDisplay ?></td>
                                            <td><a href="view_portfolio.php?VID=<?php echo $fetchId ?>" class="btn btn-primary">View Portfolio</a></td>
                                            <td>
                                                <?php  if($portfolioSessionStatus == 1) { ?>
                                                    <a href="book_vendor.php?VID=<?php echo $fetchId ?>" class="btn btn-success">Booked Vendor</a>
                                                <?php } else if($portfolioSessionStatus == 0 OR $portfolioSessionStatus == 2) {  ?>
                                                    <a class="btn btn-light">Booked Vendor</a>
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
