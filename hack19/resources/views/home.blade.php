<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!--Leaflet-->
    <link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}" />
    <script src="{{asset('leaflet/leaflet.js')}}"></script>

</head>

@isset ($_GET["position"])
    @php
    $position = explode(' ', $_GET["position"], 2); 
    $latitude = $position[0];
    $longitude = !empty($position[1]) ? $position[1] : '';
    @endphp
@endisset

<body onload="getLocation()">
     <div id="mapid" style="height:100vh; width: 100%;"></div>

     <!--for Test Purposes-->
    <p id="demo"></p>
</body>

<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous">
</script>

<script>

var mymap = L.map('mapid').setView([43.2070024, 23.5636215], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: ''
}).addTo(mymap);

var circle = L.circle([43.2070024, 23.5636215], {
    color: '',
    fillColor: '#24EE3F',
    fillOpacity: 0.5,
    radius: 50
    }).addTo(mymap);

var marker = L.marker([43.2070024, 23.5636215]).addTo(mymap);

var circle = L.circle([43.2070100, 23.563431], {
    color: '',
    fillColor: '#DFE121',
    fillOpacity: 0.5,
    radius: 50
    }).addTo(mymap);

var marker = L.marker([43.2070524, 23.5637215]).addTo(mymap);



  // load a tile layer

</script>


<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}
</script>

</html>
