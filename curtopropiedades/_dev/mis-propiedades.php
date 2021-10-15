<?php

	$url = 'mis-propiedades';

	$permit = 'cliente_favoritos';

	$pathRoot = '';

	/*--------------------------------------------------------------*/
	// LANG:
	/*--------------------------------------------------------------*/

	if (!isset($_REQUEST['lang']) or $_REQUEST['lang']=='') {
		$lang = 'es';
	} else {
		$lang = $_REQUEST['lang'];
	}

	require_once('lang/'. $lang .'/lang.php');

	require_once($pathRoot . 'inc/common.php');

	require_once($pathRoot . 'lib/cls/cls.propiedad.php');

	require_once($pathRoot . 'lib/cls/cls.cliente_favorito.php');

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	$sql = 'select id from clientes_favoritos where cliente_id=:cliente_id';

	$arr_filters['cliente_id'] = $_SESSION['cliente_id'];

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
			$buffer_paging = '<li><a href="mis-propiedades/pagina/'. $back .'"><span>&larr;</span></a></li>';
		}
	    for($i=$from_page;$i<=$to_page;$i++){
	       if ($iPage == $i)
	          $buffer_paging .= '<li class="active"><span>' . $iPage . '</span></li>';
	       else
	          $buffer_paging .= '<li><a href="mis-propiedades/pagina/'. $i .'">'. $i .'</a></li>';
	    }
	}

	if($iPage < $iPagesTotal) {
		$buffer_paging .= '<li><a href="mis-propiedades/pagina/'. $next .'"><span>&rarr;</span></a></li>';
	}

	$ret = $dbh->query($sql_final,$arr_filters);

	$cnt = count($ret);

	for ($i=0; $i < $cnt; $i++) { 

		$obj1 = new clsClienteFavorito();

		$obj1->find($ret[$i]['id']);

		$obj = new clsPropiedad();

		$obj->find($obj1->propiedad_id);

		if($obj->precio_venta==0) {
			$precio_venta = '';
		} else {
			$precio_venta = 'Venta: '. ret_refchilds_name($dbh, $obj->moneda_venta_id) .' '. number_format($obj->precio_venta,0,",",".") .'<br>';
		}

		if($obj->precio_alquiler==0) {
			$precio_alquiler = '';
		} else {
			$precio_alquiler = 'Alquiler: '. ret_refchilds_name($dbh, $obj->moneda_alquiler_id) .' '. number_format($obj->precio_alquiler,0,",",".") .'<br>';
		}

		$precio = $precio_venta .' '. $precio_alquiler;

		if ($precio=='') {
			$precio = 'Consultar';
		}

		$thumb = ret_attachment_by_id($dbh, $obj->id, 1);

		if ($thumb=='') {
			$thumb = 'images/thumb_default.jpg';
		} else {
		    if(file_exists('images/propiedades/'. $thumb)) {
				$thumb = 'images/propiedades/'. $thumb;
			} else {
				$thumb = 'images/thumb_default.jpg';
			}
		}

		$buffer .= '
			<div id="item-'. $obj1->id .'" class="item mg-lg-b">
				<ul class="propiedades-actions pull-right mg-b">
					<li>
						<a href="http://maps.google.com/maps?q=loc:'.  $obj->loc_lat .','.  $obj->loc_long .'" target="_blank">
							<i class="fa fa-map-marker fa-fw"></i>
						</a>
					</li>
					<li>
						<a href="#" class="subnav-toggle" data-target="#social-subnav'. $i .'"><i class="fa fa-share-alt fa-fw"></i></a>
						<ul id="social-subnav'. $i .'" class="social-subnav">
							<li>
								<a 
									href="#" 
									data-propiedad_id="'.  $obj->id .'"
									data-propiedad_titulo="'.  $obj->titulo_es .'"
									data-toggle="modal" 
									data-target="#modal-compartir">
										<i class="fa fa-envelope-o fa-fw"></i>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/intent/tweet?text=Curto Propiedades - '. utf8_encode($obj->titulo_es) .'&amp;url='.  $static_url .'propiedad/'. $obj->id .'" target="_blank">
									<i class="fa fa-twitter fa-fw"></i>
								</a>
							</li>
							<li>
								<a href="http://www.facebook.com/sharer.php?u='. $static_url .'propiedad/'. $obj->id .'" target="_blank">
									<i class="fa fa-facebook fa-fw"></i>
								</a>
							</li>
							<li>
								<a href="https://plus.google.com/share?url='. $static_url .'propiedad/'. $obj->id .'&amp;t=Curto Propiedades - '. $obj->titulo_es .'" target="_blank">
									<i class="fa fa-google-plus fa-fw"></i>
								</a>
							</li>
							<li>
								<a href="https://pinterest.com/pin/create/button/?url='. $static_url .'propiedad/'. $obj->id .'&media='. $static_url.$main_thumb .'&description="Curto Propiedades" - '. $oObj->descripcion_es .'" target="_blank">
									<i class="fa fa-pinterest fa-fw"></i>
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-4">
						<a href="propiedad/'. $obj->id .'">
							<div class="item-thumb fh1 mg-lg-b" style="background:url('. $thumb .') center center no-repeat;"></div>
						</a>
					</div>
					<div class="col-md-5">
						<div class="item-caption mg-lg-b fh1">
							<a href="propiedad/'. $obj->id .'"><h3 class="item-title mg-b">'. substr($obj->titulo_es, 0, 100) .'</h3></a>
							<div class="item-desc">'. substr($obj->descripcion_es, 0, 200) .'</div>
							<div class="item-info mg-t">
								<span>'. $obj->sup_cubierta .' M² CUBIERTOS</span>
								<span>'. $obj->cant_habitaciones .' HABITACIONES</span>
								<span>'. $obj->cant_banos .' BAÑOS</span>
							</div>										
						</div>
					</div>
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12 col-sm-4">
								<p class="price large font-3 color-5 mg-lg-b">'. $precio .'</p>
							</div>
							<div class="col-md-12 col-sm-4">
								<a href="propiedad/'. $obj->id .'" class="btn btn-color2-bg small full mg-b">Ver detalles</a>
								<a 
									href="#" 
									class="btn btn-color2-bg small full mg-b" 
									data-propiedad_id = "'. $obj->id .'"
									data-propiedad_titulo = "'. $obj->titulo_es .'"
									data-toggle="modal" 
									data-target="#modal-compartir">
										Compartir
								</a>
								<a href="#" class="btn-delete btn btn-color2-bg small full mg-t" data-id="'. $obj1->id .'">Eliminar</a>
							</div>
						</div>
					</div>
				</div>
				<hr/>
			</div>';

		unset($obj);
	}

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Mis propiedades | Curto Propiedades</title>

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

	<div class="wrapper wrapper-pd-t">

		<section id="propiedades">
			<div class="pd-v-xlg">
				<div class="container">
					<div class="bg bg-c7 pd-full-lg">
						<div class="row">
							<div class="col-sm-10">
								<h2 class="font-1 text-ucase color-4 title-sm mg-t"><?php echo $t['mip']['2']; ?></h2>	
							</div>
							<div class="col-sm-2">
								<!--<a href="#" class="btn btn-ghost4">Compartir todas</a>-->
							</div>
						</div>
					</div>
					<div class="bg bg-c6 pd-full-lg">
						
						<?php if ($buffer=='') { ?>
						<p class="text-center pd-v-xlg font-1 color-1">
							<i class="fa fa-exclamation-triangle fa-fw fa-3x mg-b"></i><br>
							Todavia no guardaste ninguna propiedad.
						</p>
						<?php } ?>

						<?php echo $buffer; ?>

						<!--<?php //for ($i=0; $i < 4; $i++) { ?>
						<div class="item mg-lg-b">
							<div class="row">
								<div class="col-sm-4">
									<a href="propiedades-detail.php"><div class="item-thumb fh1 mg-lg-b" style="background:url('http://dummyimage.com/260x250/ccc/666') center center no-repeat;"></div></a>
								</div>
								<div class="col-sm-5">
									<div class="item-caption mg-lg-b fh1 border-r border-hide-xs">
										<a href="propiedades-detail.php"><h3 class="item-title mg-b">Alem 3500, Monte Grande</h3></a>
										<div class="item-desc">
											<p>Donec suscipit, tortor sit amet rhoncus porta, dui ligula suscipit nulla, id tincidunt dolor libero id mi. Nullam iaculis, elit vel tempor vehicula, enim ex pretium odio, et viverra erat nisl at est. Donec suscipit, tortor sit amet rhoncus porta, dui ligula suscipit nulla, id tincidunt dolor libero id mi. Nullam iaculis, elit vel tempor vehicula, enim ex pretium odio, et viverra erat nisl at est.</p>
										</div>
										<div class="item-info mg-t">
											<span>177 M² CUBIERTOS</span>
											<span>5 AMBIENTES</span>
											<span>2 BAÑOS</span>
										</div>										
									</div>
								</div>
								<div class="col-sm-3">
									<p class="price large font-3 color-5 mg-lg-b">U$S 1.500.000</p>
									<a href="propiedades-detail.php" class="btn btn-color2-bg small full mg-b">Ver detalles</a>
								</div>
							</div>
							<hr/>
						</div>
						<?php //} ?>-->
					</div>

					<nav>
						<ul class="pagination text-center">
							<?php echo $buffer_paging; ?>
						</ul>
					</nav>
					
					<!--<nav>
						<ul class="pagination text-center">
							<li>
								<a href="#" aria-label="Previous">
									<span aria-hidden="true">&larr;</span>
								</a>
							</li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
								<a href="#" aria-label="Next">
									<span aria-hidden="true">&rarr;</span>
								</a>
							</li>
						</ul>
					</nav>-->	
				</div>
			</div>

		</section>
		
	</div>

	<?php include('inc/footer.php'); ?>

	<script type="text/javascript">

		$(function(){

			$('#nav-main a.propiedades').addClass('active');

			$('.social-subnav').fadeOut(0);
			$('.propiedades-actions .subnav-toggle').click(function(event){
				var clip = $($(this).data('target'));
				if (clip.is(':visible')) {
					clip.fadeOut();
				} else {
					clip.fadeIn();
				}
				return false;
			});

			$('.btn-delete').click(function(){
				var $id = $(this).attr('data-id');
				$.ajax({
					type: "POST",
					url: 'process/remove_fav.php?id='+$id,
					data: $(this).serialize(),
					success: function(response){
						$('section#propiedades').find('#item-'+$id).slideUp('fast',function(){
							location.reload();
						});

					}
				});
				return false;
			});

		});

	</script>

</body>
</html>