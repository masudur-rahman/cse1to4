<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/lib/w3.css">
<body>

<!-- location division -->
<div style="background: green">
 <div class="w3-col w3-green w3-container" style="width:34%">

<div >
	<h2 style="text-align: center">Location</h2>
	<br>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(22.4602102,91.9694002);
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:17,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="googleMap" style="width:200px;height:150px;"></div>
</div> 
</div>


 <!-- CONTACT US DIVISION -->



  <div class="w3-col w3-green w3-container" style="width:33%">
  	<h2 style="text-align: center">Contact Us</h2>
  	<p>Provost</p>
  	<p>Bangabandhu Hall, CUET</p>
  	<p>Phone: +88001521483266</p>
  	<p>Email: bangabandhuhallcuet@gmail.com</p>
  </div>


  <!-- COPYRIGHT DIVISION-->
  <div class="w3-col w3-green w3-container" style="width:33%">
  <h2 style="text-align: center">Copyright</h2>
  <p>All Rights Reserved © 2016</p>
  <P>Bangabandhu Hall, CUET</p>
  <p>Developed By</p>
  <p>MASUDUR RAHMAN, OMAR SHARIF</p>
  </div>

</div>
<br>

</body>
</html>
        
