<?php 

include("sessions.php");

include("header.php");

include("../function/database.php");
$conn = $database;

$PID = $_GET['PID'];

$portfolioInfoQuery    = "SELECT * FROM portfolio WHERE portfolioId = '$PID' ";
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
            <li class="nav-item active">
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

                         <!-- Top Navigation -->
                           <?php include("topnav.php") ?>
                         <!-- Top Navigation -->

                         
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Edit Portfolio</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Portfolio Details</h6>
                        </div>

                        <div class="card-body">
                             <div class="card mb-4">
                                    <div class="card-header">Edit Porfolio Details</div>
                                    <div class="card-body">
                                        <form action="../function/edit_vendor_portfolio.php" method="POST" enctype="multipart/form-data">

                                            <input type="hidden" value="<?php echo $PID ?>" name="id">
                                            <input type="hidden" value="<?php echo $image ?>" name="image">

                                             <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">Portfolio Profile Image</label>
                                                    <input class="form-control" id="inputFirstName" type="file" name="files">
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Email Address</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your email address" value="<?php echo $email ?>" name="email">
                                                </div>
                                            </div>

                                        
                                              <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo $firstname ?>" name="firstname">
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo $lastname ?>" name="lastname">
                                                </div>
                                            </div>

                            
                                             <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-8">
                                                    <label class="small mb-1" for="inputAddress">Address</label>
                                                    <input class="form-control" id="inputAddress" type="text" placeholder="Enter your address" value="<?php echo $address ?>" name="address">
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="inputLastName">Position</label>
                                                    <select class="form-control" name="position">
                                                        <option value="<?php echo $position ?>" hidden selected ><?php echo $position ?></option>
                                                        <option value="None">None</option>
                                                        <option value="Photographer">Photographer</option>
                                                        <option value="Videographer">Videographer</option>
                                                        <option value="Both">Photographer and Videographer</option>
                                                    </select>
                                                </div>
                                            </div>

                                     
                                              <!-- Form Group (username)-->
                                            <div class="">
                                                <label class="small" for="inputMyPriceRange"><strong>Price Range:</strong></label>
                                            </div>

                                              <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group start-price -->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputStartPrice">Vendor Rate</label>
                                                    <input class="form-control" id="inputStartPrice" type="text" placeholder="Starting Price" value="<?php echo $start_price ?>" name="start-price">
                                                </div>
                                                <!-- Form Group end-price -->
                                              <!--   <div class="col-md-6">
                                                    <label class="small mb-1" for="inputEndPrice">End Price</label>
                                                    <input class="form-control" id="inputEndPrice" type="text" placeholder="End Price" value="<?php //echo $end_price ?>" name="end-price">
                                                </div> -->
                                                 <!-- Form Group booking-rate -->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputStartPrice">Booking Rate</label>
                                                    <input class="form-control" id="inputStartPrice" type="text" placeholder="Booking Rate" value="<?php echo $booking_rate ?>" name="booking-rate">
                                                </div>
                                            </div>


                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputMyDescription">Portfolio Description</label>
                                                <textarea class="form-control" style="height:150px;" name="description" placeholder="Enter your description"></textarea>
                                            </div>


                                            <!-- Form Row-->
                                            <!-- Save changes button-->
                                            <button class="btn btn-primary" type="submit" name="actionEditPortfolio">Save changes</button>
                                            <a class="btn btn-danger text-white" href="manage-portfolio.php">Cancel</a>
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