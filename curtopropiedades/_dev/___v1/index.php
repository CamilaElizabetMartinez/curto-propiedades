<?php

	$url = 'home';

	$permit = '';

	$pathRoot = '';

	require_once($pathRoot . 'inc/common.php');

	/*--------------------------------------------------------------*/
	// LANG:
	/*--------------------------------------------------------------*/

	if (!isset($_REQUEST['lang']) or $_REQUEST['lang']=='') {
		$lang = 'es';
	} else {
		$lang = $_REQUEST['lang'];
	}

	require_once('lang/'. $lang .'/lang.php');

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Home | Curto Propiedades</title>
    
    <?php include('inc/head.php'); ?>

    <?php include('inc/head_seo1.php'); ?>
    
</head>
<body>
  
	<?php include('inc/header.php'); ?>

	<div class="wrapper">

		<section id="home">

			<div id="hero">
				<div class="carousel carousel-caption">
					<div class="slide fh1 pos-rl">
						<div class="container fh1 pos-rl">
							<h1 class="slide-title title-xlg"><?php echo $t['hom']['1']; ?></h1>
						</div>
					</div>
					<div class="slide fh1 pos-rl">
						<div class="container fh1 pos-rl">
							<h1 class="slide-title title-xlg"><?php echo $t['hom']['2']; ?></h1>
						</div>
					</div>
					<div class="slide fh1 pos-rl">
						<div class="container fh1 pos-rl">
							<h1 class="slide-title title-xlg"><?php echo $t['hom']['3']; ?></h1>
						</div>
					</div>
				</div>
				<div class="carousel carousel-bg has-nav">
					<div class="slide fh1" style="background: url('images/home_slide1.jpg') center center no-repeat;"></div>
					<div class="slide fh1" style="background: url('images/home_slide1-2.jpg') center center no-repeat;"></div>
					<div class="slide fh1" style="background: url('images/home_slide2.jpg') center center no-repeat;"></div>
					<div class="slide fh1" style="background: url('images/home_slide2-2.jpg') center center no-repeat;"></div>
					<div class="slide fh1" style="background: url('images/home_slide3.jpg') center center no-repeat;"></div>
					<div class="slide fh1" style="background: url('images/home_slide3-2.jpg') center center no-repeat;"></div>
				</div>
			</div>

			<div id="nuestros-servicios" class="bg bg-w pd-v-xlg">
				<div class="container">
					<h2 class="title-lg color-3 text-center mg-xlg-b"><?php echo $t['hom']['4']; ?></h2>
					<div class="row">
						<div class="col-sm-4">
							<a class="link-icon title-md color-3 mg-b-xs" href="propiedades/<?php echo $lang; ?>/tipo-operacion/venta/tipo-propiedad/todas/zona/todas/pagina/1">
								<i class="icon-icon4"></i>
								<?php echo $t['hom']['5']; ?>
							</a>
						</div>
						<div class="col-sm-4">
							<a class="link-icon title-md color-3 mg-b-xs" href="propiedades/<?php echo $lang; ?>/tipo-operacion/alquiler/tipo-propiedad/todas/zona/todas/pagina/1">
								<i class="icon-icon17"></i>
								<?php echo $t['hom']['6']; ?>
							</a>
						</div>
						<div class="col-sm-4">
							<a class="link-icon title-md color-3 mg-b-xs" href="#" data-toggle="modal" data-target="#modal-contacto">
								<i class="icon-icon15"></i>
								<?php echo $t['hom']['7']; ?>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div id="banner" class="bg bg-c7 pd-v-lg">
				<div class="container fh2">
					<div class="row">
						<div class="col-sm-4 col-no-pd-r">
							<div class="carousel">
								<img src="images/banner_slider/slide1.jpg" class="full">
								<img src="images/banner_slider/slide2.jpg" class="full">
								<img src="images/banner_slider/slide3.jpg" class="full">
								<img src="images/banner_slider/slide4.jpg" class="full">
							</div>
						</div>
						<div class="fh2-ref col-sm-8 col-no-pd-l">
							<div class="bg bg-c3 pd-full-xlg has-tag">
								<h2 class="title-md color-w mg-b">Diseño calidad y confort como la mejor forma de inversión en el corazón de Ezeiza</h2>
								<p class=" font-2 color-w mg-lg-b">Un emprendimiento inmobiliario al costo, con financiamiento en pesos, localizado en la zona de mayor crecimiento potencial de Ezeiza.</p>
								<a href="laslorenzas" class="btn btn-black" target="_blank">Conocé más <span class="hidden-xs">sobre Las Lorenzas</span> <i class="fa fa-angle-right fa-fw"></i></a>	
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="busqueda-shortcut" class="pd-v-xlg">
				<div class="container">
					<h2 class="title-lg color-w text-center mg-lg-b mg-xlg-t"><?php echo $t['hom']['8']; ?></h2>
					<p class="large color-w text-center mg-lg-b"><?php echo $t['hom']['9']; ?></p>
					<a href="buscar-propiedades/<?php echo $lang; ?>" class="btn btn-color4 centered mg-xlg-b"><?php echo $t['gui']['1']; ?></a>
				</div>
			</div>

			<div id="aplicacion">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<div class="thumb mg-xlg-t"></div>
						</div>
						<div class="col-sm-6">
							<p class="large mg-lg-b mg-xlg-t"><?php echo $t['hom']['10']; ?></p>
							<ul class="list-dot large mg-lg-b">
								<?php echo $t['hom']['11']; ?>
							</ul>
							<a href="http://administracion.curtopropiedades.com/" class="btn btn-color2 mg-lg-b-xs" target="_blank"><?php echo $t['hom']['12']; ?></a>
						</div>
					</div>
				</div>
			</div>

		</section>
		
	</div>

	<?php include('inc/footer.php'); ?>

	<script type="text/javascript">

		$(window).resize(function(){
			$('.fh2').css({ 'height': $('.fh2-ref').outerHeight() });
		});
		$(window).resize();

		$(function(){

			$('#banner .carousel').owlCarousel({
			    animateOut: 'fadeOut',
			    animateIn: 'fadeIn',
				autoplay: true,
				autoplayTimeout: 6000,
				autoplayHoverPause: false,
				autoWidth: false,
			    loop: true,
			    dots: false,
			    nav: false,
			    items: 1,
			    navText: ['',''],
	            margin: 0,
	            slideSpeed: 150
			});

			var owl_bg = $('#hero .carousel-bg');
			owl_bg.owlCarousel({
				autoplay: true,
				autoplayHoverPause: true,
				autoplayTimeout: 2000,
				autoplaySpeed: 2000,
				animateIn: 'fadeIn',
				animateOut: 'fadeOut',
			    loop: true,
			    dots: true,
			    nav: true,
			    navText: ['',''],
	            items: 1,
	            margin: 0,
	            responsive: {
	            	0: {
	            		nav: false
	            	},
	            	990: {
	            		nav: true
	            	}
	            }
			});

			var owl_caption = $('#hero .carousel-caption');
			owl_caption.owlCarousel({
				autoplay: false,
				autoplayHoverPause: true,
				smartSpeed: 1000,
			    loop: true,
			    dots: false,
			    nav: false,
			    navText: ['',''],
	            items: 1,
	            margin: 0,
	            responsive: {
	            	0: {
	            		nav: false
	            	},
	            	990: {
	            		nav: true
	            	}
	            }
			});

			owl_bg.on('changed.owl.carousel',function(property){
				var current = property.item.index;
				if (current==4 || current==6 || current==8 ) {
					owl_caption.trigger('next.owl.carousel');
				}
			});

		});

	</script>

</body>
</html>