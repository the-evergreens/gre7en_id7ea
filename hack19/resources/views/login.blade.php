<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- main css -->
		<link href="{{asset('css/style.css')}}" rel="stylesheet">
		<title>Map</title>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		@mapstyles
   </head>
   <body onload="getLocation()">
		<div class="wrapper" >
			<div class="container">
				<a href="" class="fb-login social-login">
					Login with Facebook
				</a>
				<a href="" class="google-login social-login">
					Login with Google
				</a>
				<p class="seperator" >-OR-</p>
				<form class="login"autocomplete="off" action="">
					<div class="group">
						<label for="email">Email:</label>
						<input type="email" id="email" name="email">
					</div>
					<div class="group">
						<label for="password">Password:</label>
						<input id="password" type="password" name="password">
					</div>
					<a href="" class="forget-link">Forgot password?</a>
					<input type="submit" value="Login" id="submit">
				</form>
			</div>
		</div>
		<script>
var position;
var error;
var latitude;
var longitude;

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        return "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    position = position.coords.latitude+' '+position.coords.longitude;
    window.location.href = "home?position=" + position;
    console.log(position);
}


function showError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            error = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            error = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            error = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            error = "An unknown error occurred."
            break;
    }
    console.log(error);
}


		</script>
   </body>
</html>