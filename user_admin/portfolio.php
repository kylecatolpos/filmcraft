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
            <li class="nav-item active">
                <a class="nav-link" href="portfolio.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Portfolio</span></a>
                </li>


              <!-- Nav Item - Dashboard -->
            <li class="nav-item">
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
                    <h1 class="h3 mb-5 text-gray-800">Portfolio</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manage Portfolio</h6>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTablex" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Vendor Name</th>
                                            <th>Vendor Position</th>
                                            <th>View Vendor Portfolio</th>
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                        <?php 

                                        $query = "SELECT * FROM portfolio
                                        JOIN vendor ON portfolio.vendor_Id = vendor.vendorId
                                        WHERE portfolio.portfolioStatus = 1;
                                        ";
                                        $result = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_assoc($result)) {



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
                                            <td><?php echo $fetchPosition ?></td>
                                            <td><a href="view-portfolio.php?VID=<?php echo $fetchId ?>" class="btn btn-primary">View</a></td>
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
