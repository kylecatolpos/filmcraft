<?php 

include("sessions.php");

include("header.php");

include("../function/database.php");
$conn = $database;

 $array = array(
                            "vendor_id" => "",
                            "vendor_fullname" => "",
                            "vendor_contactnum" => "",
                            "vendor_address" => "",
                            "lat" => "",
                            "lng" => ""
                          );
$array1 = array();

    $getVendor = "SELECT * FROM vendor";
    // $getVendor = "SELECT * FROM portfolio 
    // JOIN vendor ON vendor.vendorId = portfolio.vendor_Id
    // WHERE portfolioSessionStatus = 1 
    // ";
    $resultGetVendor = mysqli_query($conn,$getVendor);
    while($get_vendor_row = mysqli_fetch_assoc($resultGetVendor)) {

        $vfname = $get_vendor_row['vendorFirstName'];
        $vlname = $get_vendor_row['vendorLastName'];
        $vfullname = $vfname.' '.$vlname;

          $array['vendor_id'] = $get_vendor_row['vendorId'];
          $array['vendor_fullname'] = $vfullname;
          $array['vendor_contactnum'] = $get_vendor_row['vendorNumber'];
          $array['vendor_address'] = $get_vendor_row['vendorAddress'];
          $array['lat'] = $get_vendor_row['vendorLatitude'];
          $array['lng'] = $get_vendor_row['vendorLongitude'];
          array_push($array1, $array);

    }

$sess = 1;




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
                <a class="nav-link" href="view_vendor.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>View Vendors</span></a>
                </li>

              <!-- Nav Item - Dashboard -->
              <li class="nav-item active">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-5 text-gray-800">Find Vendor</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Locate All Available Vendor Near You</h6>
                        </div>

                        <div class="card-body">
                           <div>
                                 <div class="col-md-12">
                                      <div class="card" >
                                         <div id="map" style="margin-top: 0 !important"></div>
                                      </div>
                                      <style type="text/css">
                                         #map { height: 480px; }
                                      </style>
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
