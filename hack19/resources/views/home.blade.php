<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
	<!-- main css -->
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/stars.css')}}" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
	<div id="cover">
	  <form class="search" method="get" action="">
		  <input class="s-text"type="text" placeholder="Search" onChange="this.form.submit()">
		  <div class="td" id="s-cover">
			<button type="submit">
			  <div id="s-circle"></div>
			  <span></span>
			</button>
		  </div>
	  </form>
	</div>
	<aside id="menu-lateral" class="aside-mobile">
		<div class="col-12 pt-12">
			<div>
				<img src="{{asset('img/logo.png')}}">
			</div>
			<h3 class="mb-1 ">Здравей {{ isset(Auth::user()->name) ? Auth::user()->name : ' Гост'  }}</h3>
			<p class="mb-4">Вашия рейтинг: {{ isset(Auth::user()->rating) ? Auth::user()->rating : ' 0'  }} <i class="fas fa-star"></i></p>
		</div>
		
		
		<div class="col-xl-10 pb-5">
			<form  method="get" action="">
				<input class="parking-position go" type="radio" name="parking" id="parking" >
				<label class="for-parking-position go" for="parking">
					<span data-hover="ПОТЕГЛЯМ">ПОТЕГЛЯМ</span>
				</label>
				<div class="hide_buttons">
					<div class="col-12 pt-1">
						<h2 class="mb-4 pb-2">Има ли свободни места?</h2>
					</div>
					<input class="parking-position" type="radio" name="parking" id="parking-1" onChange="this.form.submit()" >
					<label class="for-parking-position" for="parking-1">
						<span data-hover="НИКОЛКО">Няма</span>
					</label>
					<input class="parking-position" type="radio" name="parking" id="parking-2" onChange="this.form.submit()" >
					<label class="for-parking-position" for="parking-2">							
						<span data-hover="МАЛКО">МАЛКО</span>
					</label>
					<input class="parking-position" type="radio" name="parking" id="parking-3" onChange="this.form.submit()" >
					<label class="for-parking-position" for="parking-3">							
						<span data-hover="МНОГО">МНОГО</span>
					</label>
				</div>
			</form>
		</div>
		<div class="stars">
			<p class="mb-4">Беше ли достоверен източника ви?</p>
			<form class="rating" >
				<input type="radio" id="star5" name="rating" value="5" onChange="this.form.submit()" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
				
				<input type="radio" id="star4" name="rating" value="4" onChange="this.form.submit()" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
				
				<input type="radio" id="star3" name="rating" value="3" onChange="this.form.submit()" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
				
				<input type="radio" id="star2" name="rating" value="2" onChange="this.form.submit()" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
				
				<input type="radio" id="star1" name="rating" value="1" onChange="this.form.submit()" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
			</form>
			
		</div>
		<div class="cont-scroll">					
			<div class="ico-seccion">
				<div class="circle salud"><div></div></div>
			</div>
			<div id="btn-menu-lateral"></div>
		</div>
	</aside>
    <div id="mapid" style="height:100vh; width: 100%;"></div>

     
	<footer>
		
	</footer>
</body>

<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous">
</script>

<script>

var mymap = L.map('mapid').setView([43.2070024, 23.5636215], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 
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
<script>

function MenuLateral(){
	var dis     = this;
	dis.menu    = document.getElementById('menu-lateral');
	dis.btn     = document.getElementById('btn-menu-lateral');

	dis.ontouch = 'ontouchstart' in window;
	
	dis.starts;
	dis.while;
	dis.ends;
	dis.moving = false;
	dis.startingPoint;
	dis.moved;
	dis.pos;
	dis.open = false;
 
	
	if (dis.ontouch) {
		dis.starts  = 'touchstart';
		dis.while = 'touchmove';
		dis.ends  = 'touchend';
	}else{
		dis.starts  = 'mousedown';
		dis.while = 'mousemove';
		dis.ends  = 'mouseup';
	}

	
	dis.menu.addEventListener(dis.starts, function(event){
      event.preventDefault;
	
		dis.moving = true;

		
		if (dis.ontouch) {
			
			dis.startingPoint = event.touches[0].clientX;
			
			dis.pos = dis.menu.offsetLeft * -1;
		}else{
			
			dis.startingPoint = event.clientX;
			
			dis.pos = dis.menu.offsetLeft * -1;
      }

	});
	
	document.addEventListener(dis.while, function(event){
      event.preventDefault();

		if(dis.moving){

			if(dis.ontouch){
				dis.moved = event.touches[0].clientX - dis.startingPoint;
				console.log('moved: '+dis.moved);

			}else{
				dis.moved = event.clientX - dis.startingPoint;
				console.log('moved: '+dis.moved);
         }

			dis.menu.style.left = (dis.moved - dis.pos)+'px';
		}else{

      }
	});

	document.addEventListener(dis.ends, function(event){
		dis.moving = false;
      event.preventDefault();

			if(dis.moved > 50){
				dis.menu.style.left = 0+'px';
				dis.open  = true;

			}else if(dis.moved < -50){
				dis.menu.style.left = -320+'px';
				dis.open = false;
			}else{
				if(dis.open){
					dis.menu.style.left = 0+'px';
				}else{
					dis.menu.style.left = -320+'px';
				}
			}
	});
}
if (document.getElementById('menu-lateral') != null) {
	var lateral = new MenuLateral();
}
</script>
<script>

$(document).ready(function(){
    $('.go').click(function(){
    	var demovalue = $(this).val(); 
        $(".go").hide(300);
        $(".hide_buttons").show(600);
    });
});

</script>
</html>
