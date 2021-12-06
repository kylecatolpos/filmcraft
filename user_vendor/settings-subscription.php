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
                    <h1 class="h3 mb-5 text-gray-800">Settings</h1>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" href="settings-subscription.php">Account Subscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="settings-reports.php">Generate Reports</a>
                        </li>
                     </ul>

                     <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card">
                                <div class="card-body">


                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Account Subscription</h1>
                   
                    <!-- Content Row -->
                    <div class="row justify-content-center">
                                <!-- Pricing column 1-->
                                <div class="col-xl-6 col-lg-6 mb-4 mb-xl-0">
                                    <div class="card h-100">
                                        <div class="card-header bg-transparent">
                                            <span class="badge bg-secondary-soft text-secondary rounded-pill py-2 px-3 mb-2" style="font-size:32px;">Free</span>
                                            <div class="pricing-columns-price">
                                                Free For Verified Users
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                   <i class="fa fa-check-circle mr-2" style="font-size:20px;"></i>
                                                    No Bookings
                                                </li>
                                                 <li class="list-group-item">
                                                   <i class="fa fa-check-circle mr-2" style="font-size:20px;"></i>
                                                    No Access to Mobile App
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="card-footer d-flex align-items-center justify-content-between text-secondary" href="#!" style="text-decoration: none;">
                                            Get started!
                                           <i class="fa fa-arrow-circle-right" style="font-size:20px;"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Pricing column 2-->
                                <div class="col-xl-6 col-lg-6 mb-4 mb-xl-0">
                                    <div class="card h-100">
                                        <div class="card-header bg-transparent">
                                            <span class="badge bg-primary-soft text-primary rounded-pill py-2 px-3 mb-2" style="font-size:32px;">Basic</span>
                                            <div class="pricing-columns-price">
                                                500 Pesos
                                                <span>/ Month</span>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                   <i class="fa fa-check-circle mr-2" style="color:#4e73df;font-size:20px;"></i>
                                                    Unlimited Bookings
                                                </li>
                                                <li class="list-group-item">
                                                   <i class="fa fa-check-circle mr-2" style="color:#4e73df;font-size:20px;"></i>
                                                    Can Display Portfolio
                                                </li>
                                                <li class="list-group-item mb-5">
                                                   <i class="fa fa-check-circle mr-2" style="color:#4e73df;font-size:20px;"></i>
                                                    Has Access to Mobile App
                                                </li>
                                            </ul>
                                        </div>
                                        <a class="card-footer d-flex align-items-center justify-content-between" href="subscription-basic.php?UID=<?php echo $displayId ?>" style="text-decoration: none;">
                                            Get started!
                                           <i class="fa fa-arrow-circle-right" style="font-size:20px;"></i>
                                        </a>
                                    </div>
                                </div>
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