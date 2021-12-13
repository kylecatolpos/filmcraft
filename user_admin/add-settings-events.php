<?php 

include("sessions.php");

include("header.php");

include("../function/database.php");
$conn = $database;

$getInfoSql = "SELECT * FROM admin WHERE adminId = '$displayId' ";
$getResult  = mysqli_query($conn,$getInfoSql);

while($getRow = mysqli_fetch_assoc($getResult)) {
    $email          = $getRow['adminEmail'];
    $firstname      = $getRow['adminFirstName'];
    $lastname       = $getRow['adminLastName'];
    $gender         = $getRow['adminGender'];
    $birthdate      = $getRow['adminBirthdate'];
    $phonenumber    = $getRow['adminNumber'];
    $address        = $getRow['adminAddress'];

    $profile_image  = $getRow['adminProfileImage'];

    // check if gender is none;
    if($gender == 'None') {
       $displayGender = 'I prefer not to say';
    } else {
       $displayGender = $gender;
    }
 

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
                                <a class="dropdown-item active" href="settings-customer.php">
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
                    <h1 class="h3 mb-5 text-gray-800">Settings</h1>
                  
                              <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Adding Events</h6>
                        </div>

                        <form action="../function/add_settings_events.php" method="POST" enctype="multipart/form-data">

                    
                        <div class="card-body">
                               <div class="col-md-12 mx-auto">
                          <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Add New Events </div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <img class="img-account-profile rounded-circle mb-2" src="" alt="">
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">Add Event Image Here</div>
                                        <!-- Profile picture upload button-->
                                        <input type="file" name="files">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Add New Events </div>
                                    <div class="card-body">
                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputUsername">Event Name</label>
                                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter event name" name="eventname">
                                            </div>

                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputUsername">Event Description</label>
                                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter event description" name="eventdescription">
                                            </div>
                                            <!-- Form Row-->
                                        
                                            <!-- Save changes button-->
                                            <button class="btn btn-primary" type="submit" name="actionAddEvents">Save changes</button>
                                            <a class="btn btn-danger text-white" href="settings-events.php">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                     </form>
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

