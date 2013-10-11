<!DOCTYPE html>
<?php
include '../DAO/PesquisaBanco.php';

?>

<html>
  <head>
      
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 640px;
        width : 480px;
        margin: 0px;
        padding: 0px
      }

    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript">
var map;
var latitude = <?php echo $latitude; ?>;
var longitude = <?php echo $longitude; ?>;
function initialize() {
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(latitude, longitude),
    mapTypeId: google.maps.MapTypeId.SATELLITE
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>