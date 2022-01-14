<?php

include('database.php');

$conn = $database;

if(isset($_POST['view'])) {

  $session_id = $_POST['session_id']; 
  $sess_user = $_POST['sess_user'];

// administrator
if($sess_user == 'vendor') { 

   if($_POST["view"] != '')
  {
   $session_id = $_POST['session_id'];

   $update_query = "UPDATE notification SET notificationStatus = '1' 
   WHERE notificationStatus = '0' AND notificationUserType IN (1,2,3) AND notificationVendorId = '$session_id'
   ";
   mysqli_query($conn, $update_query);
  }

$query = "SELECT * FROM notification 
WHERE (notificationUserType IN (1,2,3) AND notificationVendorId = '$session_id') AND notificationStatus = 0
ORDER BY notificationId DESC LIMIT 5 ";
$result = mysqli_query($conn, $query);

$output = '';
if(mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_array($result)) {

  $id = $row['notificationId'];
  $datetime_format = date('F d, Y h:i A',strtotime($row['notificationDateTime']));
  $message = $row['notificationMessage'];

  $output .='
    <a class="dropdown-item d-flex align-items-center" href="#" id="notifToggle">
       <div class="mr-3">
          <div class="icon-circle bg-success">
              <i class="fas fa-info text-white"></i>
            </div>
          </div>
          <div>
          <div class="small text-gray-500">'.$datetime_format.'</div>
              <span class="font-weight-bold">'.$message.'</span>
          </div>

    </a>';
  }
} else {
    $output .= '<a class="dropdown-item d-flex align-items-center" href="#">
       <div class="mr-3">
          <div class="icon-circle bg-success">
              <i class="fas fa-info text-white"></i>
            </div>
          </div>
          <div>
          <div class="small text-gray-500"></div>
              <span class="font-weight-bold">No Notification Available</span>
          </div>
    </a>';
}

$status_query = "SELECT * FROM notification 
WHERE notificationStatus = 0 AND (notificationUserType IN (1,2,3) AND notificationVendorId = '$session_id')
ORDER BY notificationId DESC LIMIT 5
";
$result_query = mysqli_query($conn, $status_query);
$count = mysqli_num_rows($result_query);

$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
  echo json_encode($data);

 }

}




?>