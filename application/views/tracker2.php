<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Satyam Admin</title>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAUHQJwFpQlK7YavuQEWj7YdsmZZtdeYLs"></script>
        <style type="text/css">
            html, body, #map {
            height: 100%;
            margin: 0;
            }
        </style>
        <script type="text/javascript">
            function initialize() {
            var mapOptions = {
            center: new google.maps.LatLng(37.7831, -122.4039),
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        }
google.maps.event.addDomListener(window, "load", initialize);
        var markerOptions = {
            position: new google.maps.LatLng(37.7831, -122.4039)
        };
        var marker = new google.maps.Marker(markerOptions);
        marker.setMap(map);
        
        </script>
        
    </head>
    <body>    
    	<div id="map">Ha</div>
    </body>
</html>