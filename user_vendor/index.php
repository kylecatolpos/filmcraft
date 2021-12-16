<?php 


include("sessions.php");

include("header.php"); 

include("../function/database.php");
$conn = $database;

$UID = $displayId;

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

    // $portfolioID = $portfolioInfoRow['portfolioId'];

    // get subscription status
    $portfolioSessionStatus = $portfolioInfoRow['portfolioSessionStatus'];

}

// current session logic
$sqlSession = "SELECT * FROM portfolio_session WHERE portfolioSessionPortfolioId = '$id' AND portfolioSessionVendorId = '$UID' AND portfolioSessionStatus = 1 ";
$resultSession = mysqli_query($conn,$sqlSession);
$numRowsSession = mysqli_num_rows($resultSession);


if($portfolioSessionStatus == 0) {
    $format_start = "0000-00-00";
    $format_end = "0000-00-00";

} else if($portfolioSessionStatus == 1) {
    while($display_session = mysqli_fetch_assoc($resultSession)) {
        $session_start = $display_session['portfolioSessionStartSession'];
        $session_end = $display_session['portfolioSessionEndSession'];

        $format_start = date('F d, Y H:i:s A',strtotime($session_start));
        $format_end = date('F d, Y H:i:s A',strtotime($session_end));
    }
} else if($portfolioSessionStatus == 2)  {
    $sqlExpire = "SELECT * FROM portfolio_session WHERE portfolioSessionPortfolioId = '$id' AND portfolioSessionVendorId = '$UID' AND portfolioSessionStatus = 0 ORDER BY portfolioSessionEndSession DESC ";
    $resultExpire = mysqli_query($conn,$sqlExpire);
    $rowExpire = mysqli_fetch_assoc($resultExpire);

    $session_start = $rowExpire['portfolioSessionStartSession'];
    $session_end = $rowExpire['portfolioSessionEndSession'];

    $format_start = date('F d, Y H:i:s A',strtotime($session_start));
    $format_end = date('F d, Y H:i:s A',strtotime($session_end));

}


// Portfolio Session Status


// Number of Bookings For Free Account


// Pending Booking Request


// Booking Completed

// $sqlAccountStatus = "SELECT * FROM portfolio_session 
// JOIN portfolio ON portfolio.portfolioId = portfolio_session.portfolioSessionPortfolioId
// WHERE portfolioSessionVendorId = '$displayId'
// ";
// $resultAccountStatus = mysqli_query($conn,$sqlAccountStatus);
// $rowAccountStatus = mysqli_fetch_assoc($resultAccountStatus);


// $portfolioSessionId = $rowAccountStatus['portfolioSessionId'];

// $portfolioSessionStatus = $rowAccountStatus['portfolioSessionStatus'];



// $start_session = $rowAccountStatus['portfolioSessionStartSession'];
// $end_session = $rowAccountStatus['portfolioSessionEndSession'];

// if($start_session == "") {
//     $start = "";
// } else {
//     //$start = date('F d, Y H:i:s A',strtotime($start_session));
//     $start = date('Y-m-d H:i:s ',strtotime($start_session));

// }

// if($end_session == "") {
//     $end = "";
// } else {
//     //$end = date('F d, Y H:i:s A',strtotime($end_session));
//     $end = date('Y-m-d H:i:s ',strtotime($end_session));
// }

// $now = date('Y-m-d H:i:s');

// var_dump($now);

// if ($now >= $end_session) {
//     echo "expire";
//     portfolioSessionExpireSession($portfolioSessionId);
// } else {
//     echo "not yet";
//     portfolioSessionInSession($portfolioSessionId);
// }


// function portfolioSessionExpireSession($portfolioSessionId) {
//     include("../function/database.php");
//     $conn = $database;
//     $get_id = $portfolioSessionId;

//     $sql = "UPDATE portfolio_session SET portfolioSessionStatus = 0 
//     WHERE portfolioSessionId = '$portfolioSessionId' ";
//     $result = mysqli_query($conn,$sql);
// }

// function portfolioSessionInSession($portfolioSessionId) {
//     include("../function/database.php");
//     $conn = $database;
//     $get_id = $portfolioSessionId;

//     $sql = "UPDATE portfolio_session SET portfolioSessionStatus = 1 
//     WHERE portfolioSessionId = '$portfolioSessionId' ";
//     $result = mysqli_query($conn,$sql);
// }


?>
<!-- -->

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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-5   text-gray-800">Dashboard</h1>
                        <a href="settings-reports.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                           <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Portfolio Session 
                                                    <?php if($portfolioSessionStatus == 0) {

                                                    ?> 
                                                    <h5 class="font-weight-bold mb-0 d-block">
                                                    <span class="badge badge-danger badge-btn">(Not In Session)</span></h5>
                                                    <?php 

                                                    } else if($portfolioSessionStatus == 1) {
                                                    ?>
                                                    <h5 class="font-weight-bold mb-0 d-block">
                                                    <span class="badge badge-success badge-btn">(In Session)</span></h5>
                                                    <?php } else if($portfolioSessionStatus == 2) { ?>
                                                     <h5 class="font-weight-bold mb-0 d-block">
                                                     <span class="badge badge-danger badge-btn">(Expire Session)</span></h5>
                                                    <?php } ?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto">
                                            <?php echo $format_start ?> -<?php echo $format_end ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pending Booking Request</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Bookings Completed</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

<!-- -->
<?php include("footer.php"); ?>
<!--