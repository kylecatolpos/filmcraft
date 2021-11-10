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

    $status = $portfolioInfoRow['portfolioStatus'];

    $description = $portfolioInfoRow['portfolioDescription'];


    $booking_rate = $portfolioInfoRow['portfolioBookingRate'];


    // price range

    if($portfolioInfoRow['portfolioStartPrice'] == 0) {
       $start_price = 0;
    } else {
       $start_price = $portfolioInfoRow['portfolioStartPrice'];
    }

    if($portfolioInfoRow['portfolioEndPrice'] == 0) {
        $end_price = "";
    } else {
        $end_price = $portfolioInfoRow['portfolioEndPrice'];
    }

    if($position == "Both") {
      $positionDisplay = "Photographer and Videographer";
    } else if($position == "None") {
      $positionDisplay = "None";
    } else if($position == "Photographer") {
        $positionDisplay = "Photographer";
    } else if($position == "Videographer") {
        $positionDisplay = "Videographer";
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
                        <div class="card-header py-3 text-right">
                            <a href="portfolio.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Return</a>
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
                            <?php 

                            if($status == 0) {

                            ?>
                            <h5 class="font-weight-bold mb-0 d-block"> 
                            <span class="badge badge-danger badge-btn">(Not Verified)</span></h5>
                            <?php 

                            } else if($status == 1) {

                            ?>
                            <h5 class="font-weight-bold mb-0 d-block">
                            <span class="badge badge-success badge-btn">(Verified)</span></h5>
                            <?php } ?>
                            <small class="text-muted">Account</small>
                    </li>
                    <li class="list-inline-item mx-5">
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $booking_rate ?> PHP</h5><small class="text-muted">Minimum Booking Rate </small>
                    </li>
                    <li class="list-inline-item mx-5">
                        <?php 

                        if($end_price != "") {
                        ?>
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $start_price ?> PHP - <?php echo $end_price ?> PHP</h5>
                        <?php } else { ?>
                          <h5 class="font-weight-bold mb-0 d-block"><?php echo $start_price ?> PHP </h5>
                        <?php } ?>
                        <small class="text-muted">Vendor Rate</small>
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
                    <p class="mb-3"><?php echo $description ?></p>
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
                                            <th>Occassion Type</th> 
                                            <th>Name</th>
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
                                            <td><?php echo $rowWorks['occassion_type'] ?></td>
                                            <td><?php echo $rowWorks['occassion'] ?></td>

                                        <?php } else if($rowWorks['occassion_file_type'] == 'video/mp4') { ?>

                                            <td><video width="320" height="240" controls controlsList="nodownload">
                                                  <source src="<?php echo $rowWorks['occassion_file'] ?>" type="<?php echo $rowWorks['occassion_file_type'] ?>">
                                                 </video>
                                             </td>
                                            <td><?php echo $rowWorks['occassion_type'] ?></td>
                                            <td><?php echo $rowWorks['occassion'] ?></td>


                                             <?php } ?>


                                        </tr>
                                      <?php } ?>
                                                 </tbody> 
                                              </table>
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
// }
include("footer.php");

?>