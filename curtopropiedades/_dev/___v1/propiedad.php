<?php

	$url = 'propiedad';

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

	require_once($pathRoot.'lang/'. $lang .'/lang.php');

	/*--------------------------------------------------------------*/
	// LANG:
	/*--------------------------------------------------------------*/

	switch ($lang) {
		case 'es':
			$titulo = $obj->titulo_es;
			$descripcion = $obj->descripcion_es;
			break;
		case 'en':
			$titulo = $obj->titulo_en;
			$descripcion = $obj->descripcion_en;
			break;
		case 'pt':
			$titulo = $obj->titulo_pt;
			$descripcion = $obj->descripcion_pt;
			break;
	}

    $id = $_REQUEST['id'];
//echo '--'.$id;die;
	$property = new TokkoProperty('reference_code', $id, $auth);

	$arr_images = $property->get_field('photos');

	foreach ($property->get_field('photos') as $photo) {
		$buffer_carousel .= '
			<a href="'. $photo->original .'" class="popup-image" rel="gallery">
				<img src="'. $photo->original .'" class="full"/>
			</a>';
	}


?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title><?php echo $property->get_field("type")->name .' en '. $property->get_field("location")->short_location; ?> | Curto Propiedades</title>
    
    <?php include($pathRoot.'inc/head.php'); ?>

    <?php include($pathRoot.'inc/head_seo2.php'); ?>

</head>
<body>
  
	<?php include($pathRoot.'inc/header.php'); ?>

	<div class="wrapper wrapper-pd-t">

		<section id="propiedades">
			<div class="pd-v-xlg">
				<div class="container">
					<div class="row">
						<div class="col-sm-9 border-r border-hide-xs">
							<?php echo $reservado; ?>
							<div class="row">
								<div class="col-md-6">
									<h1 class="propiedades-detail-subtitle font-1 color-4 text-ucase pull-left"><?php echo $property->get_field("type")->name .' en '. $property->get_field("location")->short_location; ?></h1>
									<ul class="propiedades-actions pull-right">
										<?php if($property->get_field("geo_lat")!='' && $property->get_field("geo_long")!='' ) { ?>
										<li>
											<a href="http://maps.google.com/maps?q=loc:<?php echo $property->get_field("geo_lat"); ?>,<?php echo $property->get_field("geo_long"); ?>" target="_blank">
												<i class="fa fa-map-marker fa-fw"></i>
											</a>
										</li>
										<?php } ?>
										<li><a href="#" class="btn-print"><i class="fa fa-print fa-fw"></i></a></li>
									</ul>
									<div class="clearfix"></div>
									<hr class="gray mg-b mg-t"/>

									<div class="carousel has-nav mg-b">
										<?php echo $buffer_carousel; ?>
									</div>

									<div class="item-info pull-left">
										<span class="text-ucase">Cod.: <?php echo $property->get_field("reference_code"); ?></span>
									</div>

									<div class="clearfix"></div>
									<hr class="gray mg-b mg-t"/>
									<a href="#" class="propiedades-detail-back"><i class="fa fa-angle-left fa fw"></i> <?php echo $t['prp']['16']; ?></a>
								</div>
								<div class="col-md-5">
									<div class="propiedades-detail-desc">
										<h4 class="propiedades-detail-subtitle font-1 color-4 mg-b mg-lg-t-xs-xs"><?php echo $t['prp']['17']; ?></h4>
										<article>
											<?php echo $property->get_field("description"); ?>
										</article>
										<h4 class="propiedades-detail-subtitle font-1 color-4 mg-b mg-lg-t"><?php echo $t['prp']['18']; ?></h4>
										<ul class="mg-lg-b-xs-xs">

											<?php if($property->get_field("type")->name!='') { ?>
											<li>
												<i class="icon-icon7"></i>
												<span class="caption"><?php echo $property->get_field("type")->name; ?></span>
											</li>
											<?php } ?>

											<?php if($property->get_field("total_surface")!='') { ?>
											<li>
												<i class="icon-icon19"></i>
												<span class="caption"><?php echo $property->get_field("total_surface"); ?>m² <?php echo $t['prp']['19']; ?></span>
											</li>
											<?php } ?>
											
											<?php if($property->get_field("roofed_surface")!='') { ?>
											<li>
												<i class="icon-icon19"></i>
												<span class="caption"><?php echo $property->get_field("roofed_surface"); ?>m² <?php echo $t['prp']['20']; ?></span>
											</li>
											<?php } ?>
											
											<?php if($property->get_field("suite_amount")!='') { ?>
											<li>
												<i class="icon-icon23"></i>
												<span class="caption"><?php echo $property->get_field("suite_amount"); ?> <?php echo $t['prp']['21']; ?></span>
											</li>
											<?php } ?>

											<?php if($property->get_field("bathroom_amount")!='') { ?>
											<li>
												<i class="icon-icon18"></i>
												<span class="caption"><?php echo $property->get_field("bathroom_amount"); ?> <?php echo $t['prp']['22']; ?></span>
											</li>
											<?php } ?>

											<?php if($property->get_field("parking_lot_amount")!='') { ?>
											<li>
												<i class="icon-icon8"></i>
												<span class="caption"><?php echo $property->get_field("parking_lot_amount"); ?> <?php echo $t['prp']['23']; ?></span>
											</li>
											<?php } ?>

											<?php if($property->get_field("age")!='') { ?>
											<li>
												<i class="icon-icon6"></i>
												<span class="caption">Antigüedad: <?php echo $property->get_field("age"); ?> <?php echo $t['prp']['24']; ?></span>
											</li>
											<?php } ?>

										</ul>
									</div>
								</div>	
							</div>
						</div>
						<div class="col-sm-3">
							<p class="price large font-3 color-5 mg-b"><?php echo implode("<br>", $property->get_available_operations()); ?></p>
							<a href="#" class="btn btn-color2-bg small full mg-b" data-toggle="modal" data-target="#modal-me-interesa" data-prod-id="<?php echo $property->get_field("reference_code"); ?>">
								<?php echo $t['prp']['28']; ?>
							</a>
							<?php echo $client_fav; ?>
						</div>
					</div>
				</div>
			</div>

		</section>

		<section id="modal-360" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
						<h4 class="modal-title title-md">Imágen 360º</h4>
					</div>
					<div class="modal-body">
						<div id="360img" class="mg-b" style="width: 100%; height: 400px;"></div>
					</div>
				</div>
			</div>
		</section>
		
	</div>

	<?php include($pathRoot.'inc/footer.php'); ?>

	<script type="text/javascript">

		$(function(){

			$('#nav-main a.propiedades').addClass('active');

			$('#modal-360').on('shown.bs.modal',function(event){
				var button = $(event.relatedTarget);
				var image360URL = button.data('image360-url');
				var div = document.getElementById('360img');
				var PSV = new PhotoSphereViewer({
					panorama: image360URL,
					container: div,
					time_anim: 3000,
					navbar: true,
					navbar_style: {
						backgroundColor: 'rgba(58, 67, 77, 0.7)'
					},
				});
			});


			$('.btn-print').click(function(){
				window.print();
				return false;
			});


			$('.social-subnav').fadeOut(0);
			$('.propiedades-actions .subnav-toggle').click(function(){
				if ($('.social-subnav').is(':visible')) {
					$('.social-subnav').fadeOut();
				} else {
					$('.social-subnav').fadeIn();
				}
				return false;
			});


			$('.carousel').owlCarousel({
				autoplay: true,
				autoplayHoverPause: true,
				autoHeight: true,
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


			$('.propiedades-detail-back').click(function(){
				history.back(1);
				return false;
			});

		});

	</script>

</body>
</html>