<?php 

include("sessions.php");

include("header.php");

include("../function/database.php");
$conn = $database;

$worksID = $_GET['eid'];

 $queryWorks = "SELECT * FROM works 
 JOIN events ON works.occassion_type = events.eventId
 WHERE worksId = '$worksID'  ";
 $resultWorks = mysqli_query($conn,$queryWorks);
 
 while($rowWorks = mysqli_fetch_assoc($resultWorks)) {

    $works_Id = $rowWorks['worksId'];
    $portfolioWorks_Id = $rowWorks['portfolioWorks_Id'];
    $occassion = $rowWorks['occassion'];
    $occassion_type = $rowWorks['occassion_type'];
    $occassion_file = $rowWorks['occassion_file'];
    $occassion_file_type = $rowWorks['occassion_file_type'];

    $worksEventName = $rowWorks['eventName'];
    
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
                    <h1 class="h3 mb-5 text-gray-800">Edit Works Portfolio</h1>
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update Works</h6>
                        </div>

                        <form action="../function/edit_vendor_works.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="worksId" value="<?php echo $worksID ?>">
                        <input type="hidden" name="vendorWorksId" value="<?php echo $portfolioWorks_Id ?>">


                        <div class="card-body">
                               <div class="col-md-12 mx-auto">
                          <div class="row">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Add New Works  </div>
                                     <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        <?php  if ($occassion_file_type == 'image/png' || $occassion_file_type == 'image/jpeg') { ?>
                                        <img class="img-account-profile rounded-circle mb-2" src="<?php echo $occassion_file ?>" style="width: 200px;height: 200px;">
                                        <?php } if($occassion_file_type == 'video/mp4') { ?>
                                         <video style="width:100%;" controls controlsList="nodownload">
                                            <source src="<?php echo $occassion_file ?>" type="<?php echo $occassion_file_type ?>">
                                                 </video>
                                        <?php } ?>
                                        <!-- Profile picture help block-->
                                        <div class="small font-italic text-muted mb-4">Upload Image / Videos Here</div>
                                        <!-- Profile picture upload button-->
                                        <input type="file" name="files">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Add Works Done</div>
                                    <div class="card-body">
                                            <!-- Form Group (username)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputUsername">Type of Event</label>
                                                <select class="form-control" name="occassion_type">
                                                    <option hidden selected value="<?php echo $occassion_type ?>"><?php echo $worksEventName ?></option>
                                                    <?php  

                                                     $queryEvents = "SELECT * FROM events ORDER BY eventName";
                                                     $resultEvents = mysqli_query($conn,$queryEvents);

                                                     while($rowEvents = mysqli_fetch_assoc($resultEvents)) {

                                                    ?>

                                                    <option value="<?php echo $rowEvents['eventId'] ?>"><?php echo $rowEvents['eventName'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputUsername">Type of Occasion</label>
                                                <input class="form-control" id="inputUsername" type="text" value="<?php echo $occassion ?>" name="occassion">
                                            </div>
                                            <!-- Form Row-->
                                        
                                            <!-- Save changes button-->
                                            <button class="btn btn-primary" type="submit" name="actionEditWorks">Save changes</button>
                                            <a class="btn btn-danger text-white" href="manage-portfolio.php">Cancel</a>
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