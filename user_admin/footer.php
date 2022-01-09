    <!-- Bootstrap core JavaScript-->
    <script src="../resources/vendor/jquery/jquery.min.js"></script>
    <script src="../resources/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../resources/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../resources/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../resources/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../resources/js/demo/chart-area-demo.js"></script>
    <script src="../resources/js/demo/chart-pie-demo.js"></script>

<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{

  var session_id = <?php echo $displayId ?>;
  var usertype = 'admin';

 $.ajax({
  url:"../function/admin_notification.php",
  method:"POST",
  data:{view:view,session_id:session_id,sess_user:usertype},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-notif').html(data.notification);
   $('#count').html(data.unseen_notification);
     if(data.unseen_notification < 1)
   {
    $('span.badge').hide();
   }
  }
 });
}

load_unseen_notification();

// load new notifications
$(document).on('click', '#notifToggle', function() {
  $('span.badge').html('');
 load_unseen_notification('yes');
  });
});
</script>

    </body>
</html>