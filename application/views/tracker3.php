<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Satyam Admin</title>
    <style>
      #map {
        height: 100%;
        width: 90%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="page-wrapper" style="margin-top:90px;padding: 0 0px;">
      <div id="map" style="margin-top:90px;"></div>
    </div>
   <script>

      function initMap() {
        var myLatLng = {lat: <?php  echo $lat[0];?>, lng: <?php  echo $lng[0];?>};

        var map = new google.maps.Map(document.getElementById('page-wrapper'), {
          zoom: 18,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: '<?php  echo $name[0];?>'
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUHQJwFpQlK7YavuQEWj7YdsmZZtdeYLs&callback=initMap">
    </script>
  </body>
</html>