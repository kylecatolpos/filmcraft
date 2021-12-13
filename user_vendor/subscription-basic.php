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
                    <h1 class="h3 mb-5 text-gray-800">Basic Subscription</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 text-right">
                            <a href="settings-subscription.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Return</a>
                        </div>

                        <div class="card-body">
                             <div class="card mb-4">
                                    <div class="card-header">Your Subscription Details</div>
                                    <div class="card-body">
                                        <form action="../function/subscription-basic-pay-cash.php" method="POST" enctype="multipart/form-data">

                                            <input type="hidden" value="<?php echo $UID ?>" name="vendorID">

                                            <input type="hidden" value="<?php echo $portfolioID ?>" name="portfolioID">


                                             <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputLastName">Subscription Status</label>
                                                    <span class="form-control" style="border:0">
                                                    <?php 

                                                    if($portfolioSessionStatus == 0) {

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
                                                    <?php } ?>
                                                    </span>

                                                </div>

                                            </div>

                                        
                                              <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="inputFirstName">Subscription Fee</label>
                                                    <span class="form-control" style="border:0">
                                                        ₱ 500.00
                                                    </span>
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-4">
                                                    <label class="small mb-1" for="inputLastName">Subsription Start On</label>
                                                    <span class="form-control" style="border:0">
                                                        <?php echo $format_start; ?>
                                                    </span>
                                                </div>
                                                 <div class="col-md-4">
                                                    <label class="small mb-1" for="inputLastName">Subsription Expire On</label>
                                                    <span class="form-control" style="border:0">
                                                        <?php echo $format_end; ?>
                                                    </span>
                                                </div>
                                            </div>

                            
                                             <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-12">
                                                    <label class="small mb-1" for="inputAddress"></label>
                                                    <span class="form-control" style="border-bottom:0;border-left:0;border-right:0;">
                                                    Total Payment: 
                                                    </span>

                                                </div>
                                              
                                            </div>

                                          <!-- Form Row-->
                                          <div class="row gx-3 mb-3">
                                             <!-- Form Group (phone number)-->
                                              <div class="col-md-12 text-center">

                                                <?php 

                                                if($portfolioSessionStatus != 1 ) {

                                                ?>
                                                   <div id="paypal-payment-button">
                                                   </div>
                                               <?php } else { ?>    
                                                    <h1 class="text-danger">
                                                        Currently In Subscription
                                                    </h1>
                                               <?php } ?>

                                             </div>
                                          </div> 
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

<script src="https://www.paypal.com/sdk/js?client-id=AQ1gFL8npPe_QYF_RG0BvPjQeNPv2lY8MLMGFMdmmEUPAG9Ddo8IDcU0IXt4yYImzGvSRff9Ow6h3Dmv&currency=PHP&disable-funding=credit,card" data-sdk-integration-source="button-factory"></script>
   <!-- Latest compiled and minified JavaScript -->


<script>
    paypal.Buttons({
    style : {
        color: 'gold',
        shape: 'pill',
        layout: 'vertical',
        label: 'pay'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                name: "Basic Monthly Subscription",
                amount: {
                    currency_code: "PHP",
                    value: '500'

                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            var uid = <?php echo $UID ?>;
            var pid = <?php echo $id ?>;
           
            // URL which to send the value to.
            const url = "../function/add_vendor_subscription_basic.php?UID="+ uid+"&PID="+ pid;

            // Message to send. In this example an object with a state property.
            // You can change the properties to whatever you want.
            const message = { status: 'success' };

            // Send it to the URL with the POST method 
            // and send the message in JSON format.
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(message)
            }).catch(function(error) {
                console.log(error); // Display error if there is one.
            });

            })
    },
    onCancel: function (data) {
        //window.location.replace("http://localhost:63342/tutorial/paypal/Oncancel.php")
        var uid = <?php echo $UID ?>;
        var pid = <?php echo $id ?>;
        const url = "../function/add_vendor_subscription_basic.php?UID="+ uid;
    }
}).render('#paypal-payment-button');
</script>