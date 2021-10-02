<?php 

include("sessions.php");

include("header.php");

// fix for by pass URL links
// if($displayId == NULL) {
//    header("Location:logout.php");
// } else {

// get select vendor ID
$VID = $_GET['VID'];

$conn               = mysqli_connect("localhost","root","","filmcraft");
$portfolioInfoQuery    = "SELECT * FROM portfolio WHERE vendor_Id = '$VID' ";
$portfolioInfoResult   = mysqli_query($conn,$portfolioInfoQuery);

while($portfolioInfoRow = mysqli_fetch_assoc($portfolioInfoResult)) {
    $id        = $portfolioInfoRow['portfolioId'];
    $workid    = $portfolioInfoRow['vendorWork_Id'];
    $firstname = $portfolioInfoRow['portfolioFirstName'];
    $lastname  = $portfolioInfoRow['portfolioLastName'];

    $fullname  = $firstname.' '.$lastname;

    $address   = $portfolioInfoRow['portfolioAddress'];
    $email     = $portfolioInfoRow['portfolioEmail'];
    $position           = $portfolioInfoRow['portfolioVendorPosition'];
    $portfolio_image    = $portfolioInfoRow['portfolioProfileImage'];
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                             </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header" style="background-color:#395232;border:1px solid #395232">
                                    Notifications
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">View Notifications</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $displayName; ?></span>
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
                                <a class="dropdown-item" href="settings.php">
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
                    <h1 class="h3 mb-5 text-gray-800">Portfolio</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="row py-5 px-4">

    <div class="col-md-12 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover" style="background-color:#395232">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3 mb-4"> <img src="<?php echo $portfolio_image ?>" alt="..." width="150" class="rounded mb-2 img-thumbnail"> </div>
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-1"><?php echo $fullname ?></h4>
                        <p class="small mb-4"><?php echo $position ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-center text-center mt-3">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mx-5">
                        <h5 class="font-weight-bold mb-0 d-block">-</h5><small class="text-muted">NULL</small>
                    </li>
                    <li class="list-inline-item mx-5">
                        <h5 class="font-weight-bold mb-0 d-block">1,044</h5><small class="text-muted">Posted Files</small>
                    </li>
                    <li class="list-inline-item mx-5">
                        <h5 class="font-weight-bold mb-0 d-block">4.5</h5><small class="text-muted">Ratings </small>
                    </li>
                </ul>
            </div>

            <div class="px-4 py-3">
                <h5 class="mb-3">My Profile</h5>
                <hr>
                <div class="p-4 rounded shadow-sm bg-light">
                    <p class="font-italic mb-0">Lives in <?php echo $address ?></p>
                    <p class="font-italic mb-0"><?php echo $email ?></p>
                    <p class="font-italic mb-0"></p>
                </div>
            </div>

            <div class="py-4 px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Works Done</h5><a href="show_works_done.php?VWID=<?php echo $workid?>" class="btn btn-link text-muted">Show all</a>
                </div>
                <hr>
                         <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image/Video</th>
                                            <th>Type of Occation</th>
                                         </tr>
                                    </thead>
                                     <tbody>
                                      <?php 

                                      $conn  = mysqli_connect("localhost","root","","filmcraft");
                                      $queryWorks = "SELECT * FROM works WHERE portfolioWorks_id = '$workid' ";
                                      $resultWorks = mysqli_query($conn,$queryWorks);

                                      while($rowWorks = mysqli_fetch_assoc($resultWorks)) {

                                      ?>
                                        <tr>

                                            <?php 

                                            if ($rowWorks['occassion_file_type'] == 'image/png' || $rowWorks['occassion_file_type'] == 'image/jpeg') {


                                            ?>

                                            <td><img src="<?php echo $rowWorks['occassion_file'] ?>" width="320" height="240"></td>
                                             <td><?php echo $rowWorks['occassion_file_type'] ?></td>
                                            <td><?php echo $rowWorks['occassion'] ?></td>

                                        <?php } else if($rowWorks['occassion_file_type'] == 'video/mp4') { ?>

                                            <td><video width="320" height="240" controls controlsList="nodownload">
                                                  <source src="<?php echo $rowWorks['occassion_file'] ?>" type="<?php echo $rowWorks['occassion_file_type'] ?>">
                                                 </video>
                                             </td>
                                            <td><?php echo $rowWorks['occassion_file_type'] ?></td>
                                            <td><?php echo $rowWorks['occassion'] ?></td>


                                             <?php } ?>


                                        </tr>
                                      <?php } ?>
                                      </tbody>                                </table>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

<?php 
// }
include("footer.php");

?>