<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    @mapstyles
</head>

@isset ($_GET["position"])
    @php
    $position = explode(' ', $_GET["position"], 2); 
    $latitude = $position[0];
    $longitude = !empty($position[1]) ? $position[1] : '';
    @endphp
@endisset

<body>
    <div class="flex-center position-ref full-height">
        @isset($position)
         @map([
        'lat' => $latitude,
        'lng' => $longitude,
        'zoom' => '15',
        'markers' => [
        [
        'title' => 'Point1',
        'lat' => $latitude,
        'lng' => $longitude,
        ],
        ],
        ])
        @endisset

    </div>
    @mapscripts
    <p id="demo"></p>
</body>

</html>
