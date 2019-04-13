<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>
		<!-- main css -->
		<link href="{{asset('css/style.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        @mapstyles
    </head>
    <body>
	<aside id="menu-lateral" class="aside-mobile">
   <div class="cont-scroll">
      <h2>MENÚ</h2>

      <ul>
         <li><a href="#">Item 1</a></li>
         <li><a href="#" class="actual">Sección 2</a></li>
         <li><a href="#">Sección 3</a></li>
         <li><a href="#">Otra sección</a></li>
         <li><a href="#">Programas</a></li>
      </ul>
      <div class="ico-seccion">
         <div class="circulo salud"></div>
      </div>
      <div id="btn-menu-lateral"></div>
   </div>
</aside>
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
		
<script>
// MENÚ LATERAL
// ------------
function MenuLateral(){
	var dis     = this;
	dis.menu    = document.getElementById('menu-lateral');
	dis.btn     = document.getElementById('btn-menu-lateral');
	// Determino si puedo hacer touch o no.
	dis.touchsi = 'ontouchstart' in window;
	// Variables para guardar eventos.
	dis.empieza;
	dis.mientras;
	dis.termina;
	dis.moviendo = false;
	dis.puntoPartida;
	dis.movido;
	dis.pos;
	dis.abierto = false;
 
	// Pregunto si soporta touch para mobile y asigno los eventos a las variables.
	if (dis.touchsi) {
		dis.empieza  = 'touchstart';
		dis.mientras = 'touchmove';
		dis.termina  = 'touchend';
	}else{
		dis.empieza  = 'mousedown';
		dis.mientras = 'mousemove';
		dis.termina  = 'mouseup';
	}

	// Comienzo 
	dis.menu.addEventListener(dis.empieza, function(event){
      event.preventDefault;
		// Le digo que se está moviendo.
		dis.moviendo = true;

		// Si tiene touch uso este, si no el click.
		if (dis.touchsi) {
			// console.log('punto de partida '+event.touches[0].clientX);
			dis.puntoPartida = event.touches[0].clientX;
			// console.log('pos inicial '+dis.menu.offsetLeft);
			dis.pos = dis.menu.offsetLeft * -1;
		}else{
			// console.log('punto de partida '+event.touches[0].clientX);
			dis.puntoPartida = event.clientX;
			// console.log('pos inicial '+dis.menu.offsetLeft);
			dis.pos = dis.menu.offsetLeft * -1;
      }

	});
	
	document.addEventListener(dis.mientras, function(event){
      event.preventDefault();

		if(dis.moviendo){

			if(dis.touchsi){
				dis.movido = event.touches[0].clientX - dis.puntoPartida;
				console.log('movido: '+dis.movido);

			}else{
				dis.movido = event.clientX - dis.puntoPartida;
				console.log('movido: '+dis.movido);
         }

			dis.menu.style.left = (dis.movido - dis.pos)+'px';
		}else{

      }
	});

	document.addEventListener(dis.termina, function(event){
		dis.moviendo = false;
      event.preventDefault();
		//if(dis.touchsi){

			if(dis.movido > 50){
				dis.menu.style.left = 0+'px';
				dis.abierto  = true;

			}else if(dis.movido < -50){
				dis.menu.style.left = -220+'px';
				dis.abierto = false;
			}else{
				if(dis.abierto){
					dis.menu.style.left = 0+'px';
				}else{
					dis.menu.style.left = -220+'px';
				}
			}

		//}
      //else{
		//	if(dis.abierto){
		//		dis.menu.style.left = '-220px';
		//		dis.abierto = false;
		//	}else{
		//		dis.menu.style.left = '0px';
		//		dis.abierto  = true;
		//	}
		//}
	});
}
if (document.getElementById('menu-lateral') != null) {
	var lateral = new MenuLateral();
}
</script>
    </body>
</html>