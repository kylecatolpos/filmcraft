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
                                <a class="dropdown-item active" href="settings-vendor.php">
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

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
                           <a class="nav-link" href="settings-vendor.php">Vendor Management</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="settings-customer.php">Customer Management</a>
                        </li>
						<li class="nav-item">
						    <a class="nav-link" href="settings-admin.php">Admin Management</a>
						</li> 
                        <li class="nav-item">
                            <a class="nav-link" href="settings-events.php">Events Management</a>
                        </li> 
						<li class="nav-item">
						    <a class="nav-link active" href="settings-reports.php">Generate Reports</a>
						</li>
				     </ul>
						<div class="tab-content" id="myTabContent">
						  <div class="tab-pane fade show active">
						  	<div class="card">
						  		<div class="card-body">
						  	
						
                               <!-- Page Heading -->
                            <h1 class="h3 mb-5 text-gray-800">Generate Reports</h1>

						  	  <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Report Name</th>
                                            <th>View Report</th>
                                        </tr>
                                    </thead>
                                 
                                   <tbody>
                                      <tr>
                                            <td>Customer Account Management Report</td>
                                            <td><a href="view-report-customer.php" target="_blank" class="btn btn-primary">View Report</a></td>
                                      </tr>
                                       <tr>
                                            <td>Vendor Account Management Report</td>
                                            <td><a href="view-report-vendor.php" target="_blank" class="btn btn-primary">View Report</a></td>
                                      </tr>
                                       <tr>
                                            <td>Booking History Report</td>
                                            <td><a href="view-report-booking.php" target="_blank" class="btn btn-primary">View Report</a></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div>
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

