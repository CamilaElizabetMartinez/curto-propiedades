<?php

	$url = 'desarrollos';

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

	require_once($pathRoot . 'lib/cls/cls.desarrollo.php');

	/*--------------------------------------------------------------*/
	// DESARROLLOS:
	/*--------------------------------------------------------------*/

	$sql = '
		select id from desarrollos where activo="S" order by fijo desc, orden asc, id desc';

	$ret = $dbh->query($sql, $arr_filters);

	$contador_total = count($ret);

	$iTotal = $contador_total;

	$iLimit = 3;

	$iPage = $_REQUEST['page'];

	if(!$iPage) {
		$inicio = 0;
		$iPage = '1';
	} else {
		$inicio = ($iPage - 1) * $iLimit;
	}

	$iPagesTotal = ceil($iTotal / $iLimit);

	$sql_final = $sql .' limit '. $inicio .', '. $iLimit .';';

	$back = $iPage - 1;
	$next = $iPage + 1;

	//muestra cierta cantidad de numeros en vez de todos para el paginado
	$from_page = $iPage - 5;

	if($from_page < 5) { $from_page = 1; }

	$to_page = $iPage + 5;

	if($to_page > $iPagesTotal) { $to_page = $iPagesTotal; }

	if ($iPagesTotal > 1){
		if($iPage > 1) {
			$buffer_paging = '<li><a href="desarrollos/pagina/'. $back .'"><span>&larr;</span></a></li>';
		}
	    for($i=$from_page;$i<=$to_page;$i++){
	       if ($iPage == $i)
	          $buffer_paging .= '<li class="active"><span>' . $iPage . '</span></li>';
	       else
	          $buffer_paging .= '<li><a href="desarrollos/pagina/'. $i .'">'. $i .'</a></li>';
	    }
	}

	if($iPage < $iPagesTotal) {
		$buffer_paging .= '<li><a href="desarrollos/pagina/'. $next .'"><span>&rarr;</span></a></li>';
	}

	$ret = $dbh->query($sql_final,$arr_filters);

	$cnt = count($ret);

	for ($i=0; $i < $cnt; $i++) { 

		$obj = new clsDesarrollo();

		$obj->find($ret[$i]['id']);

		// Logo:

		$logo = ret_attachment_by_id($dbh, $obj->id, 6);

		if ($logo!='') {
		    if(file_exists('images/desarrollos/'. $logo)) {
				$logo = '<img src="images/desarrollos/'. $logo .'" class="logo mg-lg-b">';
			} else {
				$logo = '';
			}
		} else {
			$logo = '';
		}

		// Main thumb:

		$main_thumb = ret_attachment_by_id($dbh, $obj->id, 4);

		if ($main_thumb=='') {
			$main_thumb = 'images/thumb_default.jpg';
		} else {
		    if(file_exists('images/desarrollos/'. $main_thumb)) {
				$main_thumb = 'images/desarrollos/'. $main_thumb;
			} else {
				$main_thumb = 'images/thumb_default.jpg';
			}
		}

		// Carousel:

		$arr_images = ret_attachment_array_by_id($dbh, $obj->id, 5);

		$count_images = count($arr_images);

		for ($a=0; $a<$count_images; $a++) { 

			$thumb = $arr_images[$a]['file'];

			if ($thumb=='') {
				$thumb = 'images/thumb_default.jpg';
			} else {
			    if(file_exists('images/desarrollos/'. $thumb)) {
					$thumb = $static_url .'images/desarrollos/'. $thumb;
				} else {
					$thumb = $static_url .'images/thumb_default.jpg';
				}
			}

			$buffer_carousel .= '
				<a href="'. $thumb .'" class="popup-image" rel="group'. $obj->id .'">
					<img src="'. $thumb .'" class="full" title="'. $thumb .'">
				</a>';
		}

		/*if ($count_images>1) {

			$buffer_carousel_script = '
				<script type="text/javascript">
					$(function(){
						$("#carousel-'. $obj->id .'").owlCarousel({
							autoplay: false,
							autoplayHoverPause: true,
							autoHeight: true,
						    loop: true,
						    dots: true,
						    nav: true,
						    navText: ["",""],
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
					});
				</script>';
		}*/

		// Link: URL

		$buffer_url = $obj->url;

		if ($buffer_url!='') {
			$buffer_url = '<a href="http://'. $buffer_url .'" class="btn btn-color2-bg full mg-sm-b" target="_blank"><i class="fa fa-external-link fa-fw"></i> '. $obj->url .'</a>';
		} else {
			$buffer_url = '';
		}

		// Video: Youtube:

		$buffer_youtube = $obj->video_youtube;

		if ($buffer_youtube!='') {
			$buffer_youtube = get_youtube_id_from_url($buffer_youtube);
			$buffer_youtube = '
				<div class="embed-responsive embed-responsive-16by9 mg-b">
				  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'. $buffer_youtube .'" frameborder="0" allowfullscreen></iframe>
				</div>';
		} else {
			$buffer_youtube = '';
		}

		// Video: Vimeo:

		$buffer_vimeo = $obj->video_vimeo;

		if ($buffer_vimeo!='' && $buffer_vimeo!=0) {
			$buffer_vimeo = get_vimeo_id_from_url($buffer_vimeo);
			$buffer_vimeo = '
				<div class="embed-responsive embed-responsive-16by9 mg-b">
				  <iframe src="https://player.vimeo.com/video/'. $buffer_vimeo .'?byline=0&portrait=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>';
		} else {
			$buffer_vimeo = '';
		}

		//-----------------------------------//

		// 360 1:

		$arr_360 = ret_attachment_array_by_id($dbh, $obj->id, 7);

		$count_360 = count($arr_360);

		$img360 = $arr_360[0]['file'];

		if ($img360!='') {
		    if(file_exists('images/desarrollos/'. $img360)) {
				$img360 = $static_url . 'images/desarrollos/'. $img360;
			} else {
				$img360 = 'images/thumb_default.jpg';
			}
		}

		if ($count_360>0) {
			$buffer_3601 = '<a href="#" class="btn btn-color2-bg full mg-sm-b" data-toggle="modal" data-target="#modal-360" data-image360-url="'. $img360 .'"><i class="fa fa-camera fa-fw"></i> Ver imágen 360º</a>';
		} else {
			$buffer_3601 = '';
		}

		//-----------------------------------//

		// 360 2:

		$arr_360 = ret_attachment_array_by_id($dbh, $obj->id, 8);

		$count_360 = count($arr_360);

		$img360 = $arr_360[0]['file'];

		if ($img360!='') {
		    if(file_exists('images/desarrollos/'. $img360)) {
				$img360 = $static_url . 'images/desarrollos/'. $img360;
			} else {
				$img360 = 'images/thumb_default.jpg';
			}
		}

		if ($count_360>0) {
			$buffer_3602 = '<a href="#" class="btn btn-color2-bg full mg-sm-b" data-toggle="modal" data-target="#modal-360" data-image360-url="'. $img360 .'"><i class="fa fa-camera fa-fw"></i> Ver imágen 360º</a>';
		} else {
			$buffer_3602 = '';
		}

		//-----------------------------------//

		// 360 3:

		$arr_360 = ret_attachment_array_by_id($dbh, $obj->id, 9);

		$count_360 = count($arr_360);

		$img360 = $arr_360[0]['file'];

		if ($img360!='') {
		    if(file_exists('images/desarrollos/'. $img360)) {
				$img360 = $static_url . 'images/desarrollos/'. $img360;
			} else {
				$img360 = 'images/thumb_default.jpg';
			}
		}

		if ($count_360>0) {
			$buffer_3603 = '<a href="#" class="btn btn-color2-bg full mg-sm-b" data-toggle="modal" data-target="#modal-360" data-image360-url="'. $img360 .'"><i class="fa fa-camera fa-fw"></i> Ver imágen 360º</a>';
		} else {
			$buffer_3603 = '';
		}

		//-----------------------------------//

		// VR 1:

		$buffer_vr1 = $obj->vr_url_1;

		if ($buffer_vr1!='') {
			$buffer_vr1 = '
				<a href="'. $buffer_vr1 .'" class="btn btn-color2-bg full mg-sm-b" target="_blank"><i class="fa fa-camera fa-fw"></i> Tour de realidad virtual 1</a>';
		} else {
			$buffer_vr1 = '';
		}

		// VR 2:

		$buffer_vr2 = $obj->vr_url_2;

		if ($buffer_vr2!='') {
			$buffer_vr2 = '
				<a href="'. $buffer_vr2 .'" class="btn btn-color2-bg full mg-sm-b" target="_blank"><i class="fa fa-camera fa-fw"></i> Tour de realidad virtual 2</a>';
		} else {
			$buffer_vr2 = '';
		}

		// VR 3:

		$buffer_vr3 = $obj->vr_url_3;

		if ($buffer_vr3!='') {
			$buffer_vr3 = '
				<a href="'. $buffer_vr3 .'" class="btn btn-color2-bg full mg-sm-b" target="_blank"><i class="fa fa-camera fa-fw"></i> Tour de realidad virtual 3</a>';
		} else {
			$buffer_vr3 = '';
		}

		//-----------------------------------//

		if ($obj->sup_cubierta!='' && $obj->sup_cubierta>0) {
			$buffer_item_info .= '<span>'. $obj->sup_cubierta .' M² CUBIERTOS</span>';
		}

		if ($obj->cant_habitaciones!='' && $obj->cant_habitaciones>0) {
			$buffer_item_info .= '<span>'. $obj->cant_habitaciones .' HABITACIONES</span>';
		}

		if ($obj->cant_banos!='' && $obj->cant_banos>0) {
			$buffer_item_info .= '<span>'. $obj->cant_banos .' BAÑOS</span>';
		}

		if ($buffer_item_info!='') {
			$buffer_item_info = 
				'<div class="item-info mg-b">
					'. $buffer_item_info  .'
				</div>';
		}

		//-----------------------------------//

		$buffer .= '
			<div id="item-'. $i .'" class="item mg-lg-b">
				<div class="row">
					<div class="col-sm-4">
						<a href="'. $main_thumb .'" class="popup-image" rel="group'. $obj->id .'">
							<div class="item-thumb fh1" style="background:url('. $main_thumb .') center center no-repeat;"></div>
						</a>
					</div>
					<div class="col-sm-8">
						<div class="item-caption mg-lg-b fh1">
							<h3 class="item-title mg-b">'. substr($obj->titulo, 0, 100) .'</h3>
							'. $buffer_item_info  .'
							<div class="item-desc"><p>'. $obj->descripcion_corta .'</p></div>
							<a href="#" class="view-more btn btn-link pull-right" data-target="#item-'. $i .'">Conocer más</a>
						</div>
					</div>
				</div>
				<div class="item-more">
					<div class="row">
						<div class="col-sm-4">
							<div id="carousel-'. $obj->id .'" class="carousel has-nav">
								'. $buffer_carousel .'
							</div>
							'. $buffer_youtube .'
							'. $buffer_vimeo .'
							'. $buffer_3601 .'
							'. $buffer_3602 .'
							'. $buffer_3603 .'
							'. $buffer_vr1 .'
							'. $buffer_vr2 .'
							'. $buffer_vr3 .'
							'. $buffer_url .'
						</div>
						<div class="col-sm-8">
							'. $logo .'
							<article class="mg-lg-b">
								<h4>Características:</h4>
								'. strip_tags($obj->descripcion,'<strong>,<b>,<i>,<em>,<br>,<p>,<a>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>') .'
							</article>
						</div>
					</div>
					<a href="#" class="view-less btn btn-link pull-right" data-target="#item-'. $i .'">Conocer menos</a>
				</div>
				<hr class="fx"/>
			</div>';

		unset($obj);
		$buffer_carousel = '';
	}

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Desarrollos | Curto Propiedades</title>
    
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

		<section id="desarrollos">

			<div class="section-header"></div>

			<div class="pd-v-xlg">
				<div class="container">

					<?php if ($buffer=='') { ?>
					<p class="text-center pd-v-xlg font-1 color-1">
						<i class="fa fa-exclamation-triangle fa-fw fa-3x mg-b"></i><br>
						No hay desarrollos disponibles.
					</p>
					<?php } ?>
					
					<?php echo $buffer; ?>
					
					<nav>
						<ul class="pagination text-center">
							<?php echo $buffer_paging; ?>
						</ul>
					</nav>
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

	<?php include('inc/footer.php'); ?>

	<script type="text/javascript">

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

		$(function(){

			$('#nav-main a.desarrollos').addClass('active');

			$('.item-more').slideUp(0);

			var carousel_settings = {
				autoplay: false,
				autoplayHoverPause: true,
				autoHeight: true,
			    loop: true,
			    dots: true,
			    nav: true,
			    navText: ["",""],
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
			};

			$owl1 = $('body').find('.carousel');

			function initializeRequestVillas(){
				$owl1.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
				$owl1.find('.owl-stage-outer').children().unwrap();
				$owl1.owlCarousel(carousel_settings);
			}

			$('.item .view-more').click(function(){
				$('.item.expanded .item-more').slideUp();
				$('.item.expanded .view-more').fadeIn();
				var clip = $(this).attr('data-target');
				$(clip).addClass('expanded');
				$(clip).find('.view-more').fadeOut();
				$(clip).find('.item-more').slideDown(function(){
					initializeRequestVillas();
				});
				return false;
			});

			$('.item .view-less').click(function(){
				var clip = $(this).attr('data-target');
				$(clip).removeClass('expanded');
				$(clip).find('.item-more').slideUp();
				$(clip).find('.view-more').fadeIn();
				return false;
			});

		});

	</script>

</body>
</html>