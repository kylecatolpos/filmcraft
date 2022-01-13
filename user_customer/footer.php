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

    </body>
</html>

<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{

  var session_id = <?php echo $displayId ?>;
  var usertype = 'customer';

 $.ajax({
  url:"../function/customer_notification.php",
  method:"POST",
  data:{view:view,session_id:session_id,sess_user:usertype},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-notif').html(data.notification);
   $('#count').html(data.unseen_notification);
     if(data.unseen_notification < 1)
   {
    $('#count').hide();
   }
  }
 });
}

load_unseen_notification();

// load new notifications
$(document).on('click', '#notifToggle', function() {
  $('#count').html('');
 load_unseen_notification('yes');
  });
});
</script>



    <!-- For Map -->
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js"></script>
   <script src="https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.js"></script>
   <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.3.0/mapbox-gl-geocoder.min.js"></script>
   <script src="https://unpkg.com/mapbox@1.0.0-beta9/dist/mapbox-sdk.min.js"></script>
   <script src="https://api.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v1.0.0/leaflet.markercluster.js
      "></script>
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
      integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
      crossorigin=""></script>


        <script>

      var obj = <?php echo json_encode($array1); ?>;

      var lat;
      var lng;
      var sess = '<?php echo $sess ?>';

      console.log(obj);
      
      // start of my location
      if ("geolocation" in navigator) { 
       navigator.geolocation.getCurrentPosition(position => { 
           lat = position.coords.latitude;
           lng = position.coords.longitude 
      
      
         var mymap = L.map('map').setView([lat, lng], 10);
      
      
                  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 20,
            minZoom: 12,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1Ijoia3lsZWNhdG9scG9zIiwiYSI6ImNrd3U5MXVwdDFiZjcydm8ybXc4bmNxYXQifQ.TMJipMUmuyQ97V8xZdg4EQ'
         }).addTo(mymap);
               // end my current location
         var redIcon = new L.Icon({
           iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
           shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
           iconSize: [25, 41],
           iconAnchor: [12, 41],
           popupAnchor: [1, -34],
           shadowSize: [41, 41]
         });
         var marker = L.marker([lat, lng], {icon: redIcon}).addTo(mymap);
         marker.bindPopup("<b>Your Location</b>").openPopup();
         var button = '<a  href="#" data-toggle="modal" data-target="#login">Book</a>';
         for(var i =0; i < obj.length; i++){
           if(obj[i].lat != "" && obj[i].lng != ""){
           var marker = L.marker([obj[i].lat, obj[i].lng]).addTo(mymap);
           if(sess != ''){
               button = "<a href='view_portfolio.php?VID="+obj[i].vendor_id+"' class='btn btn-info text-white'>View Portfolio</a>"
           }
           var html = "<b>"+obj[i].vendor_fullname+"</b>"+ 
                       "<p>"+obj[i].vendor_contactnum +"</p>" +
                       "<p>"+obj[i].vendor_address +"</p>" +
                        button ;
           marker.bindPopup(html);
           }
         }
         
       // markers.addLayer(L.marker([[10.2990, 123.9639]));
       // add more markers here...
      
           mymap.addLayer(markers);
       });
      }
      
      
   </script>

