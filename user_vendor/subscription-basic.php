<?php 

include("sessions.php");

include("header.php");

include("../function/database.php");
$conn = $database;

$UID = $_GET['UID'];

$portfolioInfoQuery    = "SELECT * FROM portfolio WHERE vendor_Id = '$UID' ";
$portfolioInfoResult   = mysqli_query($conn,$portfolioInfoQuery);

while($portfolioInfoRow = mysqli_fetch_assoc($portfolioInfoResult)) {
    $id        = $portfolioInfoRow['portfolioId'];
    $workid    = $portfolioInfoRow['vendorWork_Id'];
    $firstname = $portfolioInfoRow['portfolioFirstName'];
    $lastname  = $portfolioInfoRow['portfolioLastName'];

    $fullname  = $firstname.' '.$lastname;

    $address   = $portfolioInfoRow['portfolioAddress'];
    $email     = $portfolioInfoRow['portfolioEmail'];
    $position  = $portfolioInfoRow['portfolioVendorPosition'];

    $image     = $portfolioInfoRow['portfolioProfileImage'];

    $start_price = $portfolioInfoRow['portfolioStartPrice'];

    $end_price = $portfolioInfoRow['portfolioEndPrice'];


    $booking_rate = $portfolioInfoRow['portfolioBookingRate'];

    $portfolioID = $portfolioInfoRow['portfolioId'];

}


?>

<style>
    
    .profile-head {
    transform: translateY(5rem)
}

.cover {
    background-color: rgb(99, 39, 120);
    background-size: cover;
    background-repeat: no-repeat
}

body {
    background: #654ea3;
    background: linear-gradient(to right, #e96443, #904e95);
    min-height: 100vh
}

</style>

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
            <li class="nav-item">
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
                                <a class="dropdown-item active" href="settings-subscription.php">
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
                    <h1 class="h3 mb-5 text-gray-800">Subscription Basic</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Subscription Basic</h6>
                        </div>

                        <div class="card-body">
                             <div class="card mb-4">
                                    <div class="card-header">Input Vendor Details</div>
                                    <div class="card-body">
                                        <form action="../function/subscription-basic-pay-cash.php" method="POST" enctype="multipart/form-data">

                                            <input type="hidden" value="<?php echo $UID ?>" name="vendorID">

                                            <input type="hidden" value="<?php echo $portfolioID ?>" name="portfolioID">


                                             <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Email Address</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your email address" name="email">
                                                </div>
                                            </div>

                                        
                                              <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="firstname">
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="lastname">
                                                </div>
                                            </div>

                            
                                             <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-12">
                                                    <label class="small mb-1" for="inputAddress">Address</label>
                                                    <input class="form-control" id="inputAddress" type="text" placeholder="Enter your address" name="address">
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


                                            <!-- Form Row-->
                                            <!-- Save changes button-->
                                            <button class="btn btn-primary" type="submit" name="actionSubscribeBasic">Submit</button>
                                            <a class="btn btn-danger text-white" href="settings-subscription.php">Cancel</a>
                                        </form>
                                    </div>
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