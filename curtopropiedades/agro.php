<?php

	$url = 'agro';

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
    <title>División Agro | Curto Propiedades</title>

    <?php include('inc/head.php'); ?>

    <?php include('inc/head_seo1.php'); ?>

    <!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '336608014017160');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=336608014017160&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->


</head>
<body>
  
	<?php include('inc/header2.php'); ?>

	<div class="wrapper">

		<section id="agro">

			<div id="hero">

				<div class="carousel carousel-bg">
					<div class="slide fh1" style="background: url('images/agro/agro-header-1.jpg') center center no-repeat;"></div>
					<div class="slide fh1" style="background: url('images/agro/agro-header-2.jpg') center center no-repeat;"></div>
					<div class="slide fh1" style="background: url('images/agro/agro-header-3.jpg') center center no-repeat;"></div>
				</div>
			</div>

			<div class="container">
				<div class="pd-v-xlg">
					<p class="large text-center color-1 font-2"><?php echo $t['agro']['1']; ?></p>
					<p class="large text-center font-1">
						<?php echo $t['agro']['2']; ?>
					</p>
				</div>
			</div>

			<div class="tabs-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a style="line-height:2em; padding: 30px" href="#tab1" data-toggle="tab"><?php echo $t['agro']['3']; ?></a></li>
								<li><a style="padding: 30px" href="#tab2" data-toggle="tab"><?php echo $t['agro']['4']; ?></a></li>
								<li><a style="padding: 30px"href="#tab3" data-toggle="tab"><?php echo $t['agro']['5']; ?></a></li>
								<li><a style="line-height:2em; padding: 30px" href="#tab4" data-toggle="tab"><?php echo $t['agro']['6']; ?></a></li>
								<li><a style="line-height:2em; padding: 30px" href="#tab5" data-toggle="tab"><?php echo $t['agro']['7']; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="tabs-content-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="tab-content">
								<div class="tab-pane active fade in" id="tab1">
									<ul>
										<?php echo $t['agro']['8']; ?>
									</ul>
								</div>
								<div class="tab-pane fade" id="tab2">
									<ul>
										<?php echo $t['agro']['9']; ?>
									</ul>
								</div>
								<div class="tab-pane fade" id="tab3">
									<?php echo $t['agro']['10']; ?>
								</div>
								<div class="tab-pane fade" id="tab4">
									<ul>
										<?php echo $t['agro']['11']; ?>
									</ul>
								</div>
								<div class="tab-pane fade" id="tab5">
									<ul>
										<?php echo $t['agro']['12']; ?>
									</ul>
								</div>
							</div>
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

	<script type="text/javascript">

		$(function(){

			$('#nav-main a.agro').addClass('active');

		});

	</script>

</body>
</html>