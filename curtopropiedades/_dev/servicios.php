<?php

	$url = 'servicios';

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
    <title>Servicios | Curto Propiedades</title>

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
  
	<?php include('inc/header.php'); ?>

	<div class="wrapper">

		<section id="servicios">

			<div class="section-header"></div>

			<div class="container">
				<div class="pd-v-xlg">
					<p class="large text-center mg-lg-b color-1 font-2"><?php echo $t['srv']['1']; ?></p>
					<ul class="large text-center font-1">
						<?php echo $t['srv']['2']; ?>
					</ul>
				</div>
			</div>

			<div class="tabs-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#tab1" data-toggle="tab"><?php echo $t['srv']['3']; ?></a></li>
								<li><a href="#tab2" data-toggle="tab"><?php echo $t['srv']['4']; ?></a></li>
								<li><a href="#tab3" data-toggle="tab"><?php echo $t['srv']['5']; ?></a></li>
								<li><a href="#tab4" data-toggle="tab"><?php echo $t['srv']['6']; ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="tabs-content-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="tab-content">
								<div class="tab-pane active fade in" id="tab1">
									<ul>
										<?php echo $t['srv']['7']; ?>
									</ul>
								</div>
								<div class="tab-pane fade" id="tab2">
									<ul>
										<?php echo $t['srv']['8']; ?>
									</ul>
								</div>
								<div class="tab-pane fade" id="tab3">
									<?php echo $t['srv']['9']; ?>
								</div>
								<div class="tab-pane fade" id="tab4">
									<ul>
										<?php echo $t['srv']['10']; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="pd-v-xlg">
					<p class="text-center color-3 larger">
						<?php echo $t['srv']['11']; ?>
					</p>
				</div>
			</div>
			
		</section>
		
	</div>

	<?php include('inc/footer.php'); ?>

	<script type="text/javascript">

		$(function(){

			$('#nav-main a.servicios').addClass('active');

		});

	</script>

</body>
</html>