<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwcNi0ypx7sk7K0juP-QCqokszT0GD4GE"></script>
    <style type="text/css">
        html { height: 100% }
        body { height: 100%; margin: 0 }
        #mapDiv { width: 100%; height: 100% }
    </style>
    <script type="text/javascript">
        var map;
        function initMap(){
            google.maps.visualRefresh = true;
            var mapOptions = {
                center: new google.maps.LatLng(42.1437117,24.7368475),
                zoom:15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var mapElement = document.getElementById('mapDiv');

            map = new google.maps.Map(mapElement, mapOptions);

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position){
                        var lat = position.coords.latitude;
                        var lng = position.coords.longtitude;

                        var devCenter = new google.maps.LatLng(lat, lng);
                        map.setCenter(devCenter);
                        map.setZoom(15);
                    });
            }
        }

        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
</head>
<body>
    <p>Simple full width map</p>
    <div id="mapDiv"></div>
</body>
</html>
