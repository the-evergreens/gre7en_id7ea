<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrance</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    @mapstyles
</head>

<body onload="getLocation()">
</body>

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

</html>
