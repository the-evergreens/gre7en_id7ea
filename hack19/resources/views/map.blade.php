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
    <body>
        <div class="flex-center position-ref full-height">
           @map([
    		'lat' => '43.204913',
    		'lng' => '23.552777',
    		'zoom' => '15',
    		'markers' => [
    				[
        			'title' => 'Point1',
        			'lat' => '43.204913',
        			'lng' => '23.552777',
    				],
    				    				[
        			'title' => 'Point2',
        			'lat' => '43.204013',
        			'lng' => '23.552877',
    				]
    			],
			])
        </div>
        @mapscripts
    </body>
</html>