<?php 

include("sessions.php");

include("header.php");

$conn       = mysqli_connect("localhost","root","","filmcraft");
$getInfoSql = "SELECT * FROM portfolio WHERE vendor_Id = '$displayId' ";
$getResult  = mysqli_query($conn,$getInfoSql);

while($getRow = mysqli_fetch_assoc($getResult)) {
    $workid             = $getRow["vendorWork_Id"];
    $id                 = $getRow['portfolioId'];
    $email              = $getRow['portfolioEmail'];
    $firstname          = $getRow['portfolioFirstName'];
    $lastname           = $getRow['portfolioLastName'];
    $address            = $getRow['portfolioAddress'];
    $position           = $getRow['portfolioVendorPosition'];
    $portfolio_image    = $getRow['portfolioProfileImage'];


    $fullname  = $firstname.' '.$lastname;

    $status = $getRow['portfolioStatus'];

    $description = $getRow['portfolioDescription'];



    // price range

    if($getRow['portfolioStartPrice'] == 0) {
       $start_price = 0;
    } else {
       $start_price = $getRow['portfolioStartPrice'];
    }

    if($getRow['portfolioEndPrice'] == 0) {
        $end_price = "";
    } else {
        $end_price = $getRow['portfolioEndPrice'];
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
                    <h1 class="h3 mb-5 text-gray-800">Portfolio</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manage Portfolio</h6>
                        </div>

                        <div class="card-body">
                               <div class="col-md-12 mx-auto">
        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 cover" style="background-color:#395232">
                <div class="media align-items-end profile-head">
                    <div class="profile mr-3 mb-4"> <img src="<?php echo $portfolio_image ?>" alt="..." width="130" class="rounded mb-2 img-thumbnail" style="height: 100px;"> </div>
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-1"><?php echo $fullname ?></h4>
                        <p class="small mb-4"><?php echo $positionDisplay ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-center text-center mt-3">
               <ul class="list-inline mb-0">
                    <li class="list-inline-item mx-5">
                        <h5 class="font-weight-bold mb-0 d-block">
                             <?php 

                            if($status == 0) {

                            ?>
                            <span class="badge badge-danger badge-btn">(Not Verified)</span></h5>
                            <?php 

                            } else if($status == 1) {

                            ?>
                            <span class="badge badge-success badge-btn">(Verified)</span></h5>
                            <?php } ?>
                            <small class="text-muted">Account</small>
                    </li>
                    <li class="list-inline-item mx-5">
                        <?php 

                        if($end_price != "") {
                        ?>
                        <h5 class="font-weight-bold mb-0 d-block"><?php echo $start_price ?> PHP - <?php echo $end_price ?> PHP</h5>
                        <?php } else { ?>
                          <h5 class="font-weight-bold mb-0 d-block"><?php echo $start_price ?> PHP </h5>
                        <?php } ?>
                        <small class="text-muted">Booking Rate</small>
                    </li>
                    <li class="list-inline-item mx-5">
                        <h5 class="font-weight-bold mb-0 d-block">4.5</h5><small class="text-muted">Ratings </small>
                    </li>
                </ul>
            </div>

            <div class="px-4 py-3">
                <h5 class="mb-3">My Information</h5>
                <a href="edit-manage-portfolio.php?PID=<?php echo $id ?>" class="btn btn-primary">EDIT ACCOUNT</a>
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

                    <h5 class="mb-0">Works Done</h5>
                    <a href="#" class="btn btn-link text-muted">Show all</a>
                </div>
                <a href="add-works-portfolio.php?VWID=<?php echo $workid ?>" class="btn btn-primary">ADD WORKS</a>
                <hr>
                         <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Image/Video</th>
                                            <th>Occassion Type</th>
                                            <th>Name</th>
                                            <th></th>
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

                                             <td>
                                                <a class="btn btn-primary">Edit</a>
                                                <a class="btn btn-danger">Delete</a>
                                            </td>

                                        <?php } else if($rowWorks['occassion_file_type'] == 'video/mp4') { ?>

                                            <td><video width="320" height="240" controls controlsList="nodownload">
                                                  <source src="<?php echo $rowWorks['occassion_file'] ?>" type="<?php echo $rowWorks['occassion_file_type'] ?>">
                                                 </video>
                                             </td>
                                            <td><?php echo $rowWorks['occassion_type'] ?></td>
                                            <td><?php echo $rowWorks['occassion'] ?></td>

                                            <td>
                                                <a class="btn btn-primary">Edit</a>
                                                <a class="btn btn-danger">Delete</a>
                                            </td>

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