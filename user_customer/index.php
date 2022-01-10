<?php 

include("sessions.php");

include("header.php");

include("../function/database.php");
$conn = $database;

// fix for by pass URL links
// if($displayId == NULL) {
//    header("Location:logout.php");
// } else {

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
            <li class="nav-item active">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-5 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Available Events</div>
                                            <div class="row mt-5">
                                            <?php 

                                            $getInfoEvents = "SELECT * FROM events ORDER BY eventName ASC";
                                            $getResultEvents  = mysqli_query($conn,$getInfoEvents);

                                            while($rowEvents = mysqli_fetch_assoc($getResultEvents)) {

                                            ?>
                                             <div class="col-sm-6 mb-4">
                                                <div class="card">
                                                   <div class="card-header">
                                                        Event Featured
                                                        <!-- <span class="badge badge-success pull-right">18</span> -->
                                                      </div>
                                                       <img class="card-img-top" src="<?php echo $rowEvents['eventImage'] ?>" alt="Card image cap" style="width:100%;height: 250px;">
                                                      <div class="card-body">
                                                        <h5 class="card-title"><strong><?php echo $rowEvents['eventName'] ?></strong></h5>
                                                        <p class="card-text" style="height: 150px;"><?php echo $rowEvents['eventDescription'] ?></p>
                                                         <a href="view_event_vendor.php?eid=<?php echo $rowEvents['eventId'] ?>" class="btn btn-primary btn-block">View</a>
                                                      </div>
                                                </div>
                                              </div>
                                              <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                     <!--    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Remaining Bookings</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Content Row -->

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
 // }
include("footer.php");

?>