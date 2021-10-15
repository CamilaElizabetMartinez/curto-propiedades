<?php

	$url = 'quienes-somos';

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
    <title>Quiénes somos | Curto Propiedades</title>

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

		<section id="quienes-somos">

			<div class="section-header"></div>

			<div class="container">
				<div class="pd-v-xlg">
					<p class="large text-center mg-lg-b"><?php echo $t['qns']['1']; ?></p>
				</div>
			</div>

			<div class="tabs-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#tab1" data-toggle="tab"><?php echo $t['qns']['2']; ?></a></li>
								<li><a href="#tab2" data-toggle="tab"><?php echo $t['qns']['3']; ?></a></li>
								<li><a href="#tab3" data-toggle="tab"><?php echo $t['qns']['4']; ?></a></li>
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
									<p class="mg-lg-b"><?php echo $t['qns']['5']; ?></p>
									<ul>
										<?php echo $t['qns']['6']; ?>
									</ul>
								</div>
								<div class="tab-pane fade" id="tab2">
									<ul>
										<?php echo $t['qns']['7']; ?>
									</ul>
								</div>
								<div class="tab-pane fade" id="tab3">
									<ul class="list-has-bullets">
										<?php echo $t['qns']['8']; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="pd-v-xlg">
					<h2 class="title-md color-3 text-center mg-xlg-b"><?php echo $t['qns']['9']; ?></h2>
					<dl class="dl-horizontal">
						<dt class="title-md color-3"><?php echo $t['qns']['10']; ?></dt>
						<dd>
							<p class="font-1"><?php echo $t['qns']['11']; ?></p>
						</dd>
						<dt class="title-md color-3"><?php echo $t['qns']['12']; ?></dt>
						<dd>
							<p class="font-1"><?php echo $t['qns']['13']; ?></p>
						</dd>
						<dt class="title-md color-3"><?php echo $t['qns']['14']; ?></dt>
						<dd>
							<p class="font-1"><?php echo $t['qns']['15']; ?></p>
						</dd>
					</dl>
				</div>
			</div>

			<div class="bg bg-c3 pd-v-xlg">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/176195899?title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>
		
	</div>

	<?php include('inc/footer.php'); ?>

	<script type="text/javascript">

		$(function(){

			$('#nav-main a.quienes-somos').addClass('active');

		});

	</script>

</body>
</html>