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

	require_once('lang/'. $lang .'/lang.php');

	/*--------------------------------------------------------------*/
	// PROPIEDADES:
	/*--------------------------------------------------------------*/

	require_once($pathRoot . 'lib/cls/cls.propiedad.php');

	$obj = new clsPropiedad();

	if ($_REQUEST['id']!='') {
	  	
	  	$obj->find($_REQUEST['id']);

		if ($_SESSION['cliente_id']!='') {
			$client_fav = '<a href="#" class="add-fav btn btn-color2-bg small full" data-propiedad-id="'. $obj->id .'">'. $t['gui']['3'] .'</a>';
		} else {
			$client_fav = '<a href="#" class="btn btn-color2-bg small full" data-toggle="modal" data-target="#modal-login">'. $t['gui']['3'] .'</a>';
		}

		$url = 'propiedad/'. $obj->id;

		//---//

		if ($obj->estado_en_profit=='R' or $obj->estado_en_profit=='RESERVADO') {
			$reservado = '<span class="font-2 color-3 blink">RESERVADO</span>&nbsp;';
		} else {
			$reservado = '';
		}

	}

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

	/*$image = ret_attachment_by_id($dbh, $obj->id, 1);

	if ($image!='') {
		$buffer_carousel = '<img src="'. $image .'" class="full" alt="'. $titulo .'"/>';	
	} else {
		$buffer_carousel = '<img src="images/thumb_default.jpg" class="full" alt="'. $titulo .'"/>';
	}*/

	$arr_images = ret_attachment_array_by_id($dbh, $obj->id, 1);

	$count_images = count($arr_images);

	$main_thumb = $static_url . 'images/propiedades/'. $arr_images[0]['file']; // share

	$seo_title = $titulo;
	$seo_desc = $descripcion;
	$seo_thumb = $static_url . $main_thumb;

	for ($i=0; $i < $count_images; $i++) { 

		$thumb = $arr_images[$i]['file'];

		$file = pathinfo($thumb,PATHINFO_FILENAME);
		$ext = pathinfo($thumb, PATHINFO_EXTENSION);

		if ($thumb=='') {
			$thumb = 'images/thumb_default.jpg';
		} else {
		    if(file_exists('images/propiedades/'. $file .'.'. strtolower($ext)) or file_exists('images/propiedades/'. $file .'.'. strtoupper($ext))) {
				$thumb = 'images/propiedades/'. $thumb;
			} else {
				$thumb = 'images/thumb_default.jpg';
			}
		}

		$buffer_carousel .= '
			<a href="'. $thumb .'" class="popup-image" rel="gallery">
				<img src="'. $thumb .'" class="full" alt=""/>
			</a>';

		if ($i<=5) {
			$buffer_images_print .= '
				<div style="float: right; width: 50%;">
					<img src="'. $thumb .'" class="full" style="display: block; width: 100%; height: 200px; object-fit: cover; border: 2px solid white;"/>
				</div>';
		}
	}

	if ($count_images==0) {
		$buffer_carousel = '<img src="images/thumb_default.jpg" class="full" alt=""/>';
		$buffer_images_print = '<img src="images/thumb_default.jpg" class="full" alt=""/>';
	}

	// Imagenes 360º:

	$arr_360 = ret_attachment_array_by_id($dbh, $obj->id, 2);

	$count_360 = count($arr_360);

	for ($i=0; $i < $count_images; $i++) {
		
		$img360 = $arr_360[$i]['file'];

		$file = pathinfo($img360,PATHINFO_FILENAME);
		$ext = pathinfo($img360, PATHINFO_EXTENSION);

		if ($img360=='') {
			$img360 = 'images/thumb_default.jpg';
		} else {
		    if(file_exists('images/propiedades/'. $file .'.'. strtolower($ext)) or file_exists('images/propiedades/'. $file .'.'. strtoupper($ext))) {
				$img360 = $static_url . 'images/propiedades/'. $img360;
			} else {
				$img360 = 'images/thumb_default.jpg';
			}

			$buffer_360 .= '<a href="#" class="btn btn-color2-bg full mg-b" data-toggle="modal" data-target="#modal-360" data-image360-url="'. $img360 .'"><i class="fa fa-camera fa-fw"></i> Ver imágen 360º</a>';

		}

	}

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title><?php echo $titulo; ?> | Curto Propiedades</title>
    
    <?php include('inc/head.php'); ?>

    <?php include('inc/head_seo2.php'); ?>

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
  	
  	<div class="hide-print">
		<?php include('inc/header.php'); ?>
	</div>

	<div class="wrapper wrapper-pd-t print-pd-t-0">

		<section id="propiedades">
			
			<div class="pd-v-xlg hide-print">
				<div class="container">
					<div class="row">
						<div class="col-sm-9 print-w-100 border-r border-hide-xs print-bd-0">
							<?php echo $reservado; ?>
							<div class="row">
								<div class="col-md-6">
									<h1 class="propiedades-detail-subtitle font-1 color-4 text-ucase pull-left"><?php echo $titulo; ?></h1>
									<ul class="propiedades-actions pull-right">
										<?php if($obj->loc_lat!='' && $obj->loc_long!='' ) { ?>
										<li>
											<a href="http://maps.google.com/maps?q=loc:<?php echo $obj->loc_lat; ?>,<?php echo $obj->loc_long; ?>" target="_blank">
												<i class="fa fa-map-marker fa-fw"></i>
											</a>
										</li>
										<?php } ?>
										<li><a href="#" class="btn-print"><i class="fa fa-print fa-fw"></i></a></li>
										<li>
											<a href="#" class="subnav-toggle"><i class="fa fa-share-alt fa-fw"></i></a>
											<ul class="social-subnav">
												<li>
													<a 
														href="#" 
														data-propiedad_id="<?php echo $obj->id; ?>"
														data-propiedad_titulo="<?php echo $obj->titulo_es; ?>"
														data-toggle="modal" 
														data-target="#modal-compartir">
															<i class="fa fa-envelope-o fa-fw"></i>
													</a>
												</li>
												<li>
													<a href="https://twitter.com/intent/tweet?text=Curto Propiedades - <?php echo(utf8_encode($obj->titulo_es)); ?>&amp;url=<?php echo ($static_url .'propiedad/'. $obj->id); ?>" target="_blank">
														<i class="fa fa-twitter fa-fw"></i>
													</a>
												</li>
												<li>
													<a href="http://www.facebook.com/sharer.php?u=<?php echo($static_url .'propiedad/'. $obj->id); ?>" target="_blank">
														<i class="fa fa-facebook fa-fw"></i>
													</a>
												</li>
												<li>
													<a href="https://plus.google.com/share?url=<?php echo($static_url .'propiedad/'. $obj->id); ?>&amp;t=Curto Propiedades - <?php echo($obj->titulo_es); ?>" target="_blank">
														<i class="fa fa-google-plus fa-fw"></i>
													</a>
												</li>
												<li>
													<a href="https://pinterest.com/pin/create/button/?url=<?php $static_url .'propiedad/'. $obj->id; ?>&media=<?php echo($static_url.$main_thumb); ?>&description=<?php echo('Curto Propiedades' .' - '. $oObj->descripcion_es); ?>" target="_blank">
														<i class="fa fa-pinterest fa-fw"></i>
													</a>
												</li>
											</ul>
										</li>
									</ul>
									<div class="clearfix"></div>
									<hr class="gray mg-b mg-t"/>
									<div class="carousel has-nav mg-b">
										<?php echo $buffer_carousel; ?>
									</div>
									<!--<div id="360img" class="mg-b" style="width: 100%; height: 300px;"></div>-->
									<?php echo $buffer_360; ?>
									<div class="item-info pull-left">
										
										<?php if($obj->en_venta!=0) { ?>
										<span class="text-ucase">Venta</span>
										<?php } ?>

										<?php if($obj->en_alquiler!=0) { ?>
										<span class="text-ucase">Alquiler</span>
										<?php } ?>
										
										<?php if(ret_refchilds_tipo_propiedad($dbh, $obj->tipo_propiedad)!='') { ?>
										<span class="text-ucase"><?php echo ret_refchilds_tipo_propiedad($dbh, $obj->tipo_propiedad); ?></span>
										<?php } ?>

										<?php if($obj->localidad!='') { ?>
										<span class="text-ucase"><?php echo $obj->localidad; ?></span>
										<?php } ?>

										<span class="text-ucase">Cod.: <?php echo $obj->profit_id; ?></span>

										<span class="text-ucase">ID.: <?php echo $obj->id; ?></span>

									</div>

									<!--<p class="item-code pull-right font-2 color-4 small">Cod.: <?php echo $obj->id; ?></p>-->
									<div class="clearfix"></div>
									<hr class="gray mg-b mg-t"/>
									<a href="#" class="propiedades-detail-back hide-print"><i class="fa fa-angle-left fa fw"></i> <?php echo $t['prp']['16']; ?></a>
								</div>
								<div class="col-md-5">
									<div class="propiedades-detail-desc">
										<h4 class="propiedades-detail-subtitle font-1 color-4 mg-b mg-lg-t-xs-xs"><?php echo $t['prp']['17']; ?></h4>
										<article>
											<?php echo strip_tags($descripcion,'<strong>,<b>,<i>,<em>,<br>,<p>,<a>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>'); ?>
										</article>
										<h4 class="propiedades-detail-subtitle font-1 color-4 mg-b mg-lg-t"><?php echo $t['prp']['18']; ?></h4>
										<ul class="mg-lg-b-xs-xs">

											<?php if(ret_refchilds_tipo_propiedad($dbh, $obj->tipo_propiedad)!='') { ?>
											<li>
												<i class="icon-icon7"></i>
												<span class="caption"><?php echo ret_refchilds_tipo_propiedad($dbh, $obj->tipo_propiedad); ?></span>
											</li>
											<?php } ?>

											<?php if($obj->precio_venta>0) { ?>
											<li>
												<i class="icon-icon9"></i>
												<span class="caption"><?php echo $t['prp']['25']; ?>  <?php echo ret_refchilds_name($dbh, $obj->moneda_venta_id) .' '. number_format($obj->precio_venta,0,",","."); ?></span>
											</li>
											<?php } ?>

											<?php if($obj->sup_total>0) { ?>
											<li>
												<i class="icon-icon19"></i>
												<span class="caption"><?php echo $obj->sup_total; ?>m² <?php echo $t['prp']['19']; ?></span>
											</li>
											<?php } ?>
											
											<?php if($obj->sup_cubierta>0) { ?>
											<li>
												<i class="icon-icon19"></i>
												<span class="caption"><?php echo $obj->sup_cubierta; ?>m² <?php echo $t['prp']['20']; ?></span>
											</li>
											<?php } ?>
											
											<?php if($obj->cant_habitaciones>0) { ?>
											<li>
												<i class="icon-icon23"></i>
												<span class="caption"><?php echo $obj->cant_habitaciones; ?> <?php echo $t['prp']['21']; ?></span>
											</li>
											<?php } ?>

											<?php if($obj->cant_banos>0) { ?>
											<li>
												<i class="icon-icon18"></i>
												<span class="caption"><?php echo $obj->cant_banos; ?> <?php echo $t['prp']['22']; ?></span>
											</li>
											<?php } ?>

											<?php if($obj->cant_cocheras>0) { ?>
											<li>
												<i class="icon-icon8"></i>
												<span class="caption"><?php echo $obj->cant_cocheras; ?> <?php echo $t['prp']['23']; ?></span>
											</li>
											<?php } ?>

											<?php if($obj->antiguedad>0) { ?>
											<li>
												<i class="icon-icon6"></i>
												<span class="caption">Antigüedad: <?php echo $obj->antiguedad; ?> <?php echo $t['prp']['24']; ?></span>
											</li>
											<?php } ?>

										</ul>
									</div>
								</div>	
							</div>
						</div>
						<div class="col-sm-3">
							<?php 

							if($obj->precio_venta==0) {
								$precio_venta = '';
							} else {
								// En venta:
								$precio_venta = $t['prp']['25'] .' '. ret_refchilds_name($dbh, $obj->moneda_venta_id) .' '. number_format($obj->precio_venta,0,",",".") .'<br>';
							}

							if($obj->precio_alquiler==0) {
								$precio_alquiler = '';
							} else {
								// En alquiler:
								$precio_alquiler = $t['prp']['26'] .' '. ret_refchilds_name($dbh, $obj->moneda_alquiler_id) .' '. number_format($obj->precio_alquiler,0,",",".") .'<br>';
							}

							$precio = $precio_venta .' '. $precio_alquiler;

							if ($precio=='') {
								// Consultar:
								$precio = $t['prp']['27'];
							}

							?>
							<p class="price large font-3 color-5 mg-b"><?php echo $precio; ?></p>
							<a href="#" class="btn btn-color2-bg small full mg-b" data-toggle="modal" data-target="#modal-me-interesa"><?php echo $t['prp']['28']; ?></a>
							<?php echo $client_fav; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="show-print">
				<div class="mg-lg-b">
					<img src="assets/images/logo.svg" class="pull-left" style="width: 45px; margin-right: 30px;">
					<p class="pull-left">
						Vicente López 515 - Piso 2 - Of. 1 y 4 <br>
						Monte Grande - Prov. Buenos Aires - Argentina<br>
						Tel. 5263-9039 - (+54 9 11) 6296-4168<br>
						alquileres@curtopropiedades.com - ventas@curtopropiedades.com
					</p>
					<div class="clearfix"></div>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<?php echo $buffer_images_print; ?>
						<div class="clearfix"></div>
					</div>
					<div class="col-xs-7">
						<div class="propiedades-detail-desc">
							<?php echo $reservado; ?>
							<h1 class="propiedades-detail-subtitle font-1 color-4 text-ucase mg-b"><?php echo $titulo; ?></h1>
							<!-- precio -->
							<p class="large font-3 color-5 mg-b"><?php echo $precio; ?></p>
							<h4 class="propiedades-detail-subtitle font-1 color-4 mg-b"><?php echo $t['prp']['17']; ?></h4>
							<article>
								<?php echo strip_tags($descripcion,'<strong>,<b>,<i>,<em>,<br>,<p>,<a>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>'); ?>
							</article>
							<h4 class="propiedades-detail-subtitle font-1 color-4 mg-b mg-lg-t"><?php echo $t['prp']['18']; ?></h4>
							<ul class="mg-lg-b-xs-xs">
								<?php if(ret_refchilds_tipo_propiedad($dbh, $obj->tipo_propiedad)!='') { ?>
								<li>
									<i class="icon-icon7"></i>
									<span class="caption"><?php echo ret_refchilds_tipo_propiedad($dbh, $obj->tipo_propiedad); ?></span>
								</li>
								<?php } ?>
								<?php if($obj->precio_venta>0) { ?>
								<li>
									<i class="icon-icon9"></i>
									<span class="caption"><?php echo $t['prp']['25']; ?>  <?php echo ret_refchilds_name($dbh, $obj->moneda_venta_id) .' '. number_format($obj->precio_venta,0,",","."); ?></span>
								</li>
								<?php } ?>
								<?php if($obj->sup_total>0) { ?>
								<li>
									<i class="icon-icon19"></i>
									<span class="caption"><?php echo $obj->sup_total; ?>m² <?php echo $t['prp']['19']; ?></span>
								</li>
								<?php } ?>
								<?php if($obj->sup_cubierta>0) { ?>
								<li>
									<i class="icon-icon19"></i>
									<span class="caption"><?php echo $obj->sup_cubierta; ?>m² <?php echo $t['prp']['20']; ?></span>
								</li>
								<?php } ?>
								<?php if($obj->cant_habitaciones>0) { ?>
								<li>
									<i class="icon-icon23"></i>
									<span class="caption"><?php echo $obj->cant_habitaciones; ?> <?php echo $t['prp']['21']; ?></span>
								</li>
								<?php } ?>
								<?php if($obj->cant_banos>0) { ?>
								<li>
									<i class="icon-icon18"></i>
									<span class="caption"><?php echo $obj->cant_banos; ?> <?php echo $t['prp']['22']; ?></span>
								</li>
								<?php } ?>
								<?php if($obj->cant_cocheras>0) { ?>
								<li>
									<i class="icon-icon8"></i>
									<span class="caption"><?php echo $obj->cant_cocheras; ?> <?php echo $t['prp']['23']; ?></span>
								</li>
								<?php } ?>
								<?php if($obj->antiguedad>0) { ?>
								<li>
									<i class="icon-icon6"></i>
									<span class="caption">Antigüedad: <?php echo $obj->antiguedad; ?> <?php echo $t['prp']['24']; ?></span>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</section>
		
		<div class="hide-print">
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
		
	</div>
	
	<div class="hide-print">
		<?php include('inc/footer.php'); ?>
	</div>

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


			<?php if ($count_images>1) { ?>
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
			<?php } ?>


			$('.propiedades-detail-back').click(function(){
				history.back(1);
				return false;
			});

		});

	</script>

</body>
</html>