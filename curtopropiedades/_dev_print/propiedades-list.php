<?php

	$url = 'buscar-propiedades';

	$permit = '';

	$pathRoot = '';

	require_once($pathRoot . 'inc/common.php');

	require_once($pathRoot . 'lib/cls/cls.propiedad.php');

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

	$sql = '
		select id 
		from propiedades 
		where activo = "S"
		and 1=1 
		and 2=2 
		and 3=3
		and 4=4
		order by tipo_propiedad asc, id desc';

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	$tipo_operacion = $_REQUEST['tipo_operacion'];
	$tipo_propiedad = $_REQUEST['tipo_propiedad'];
	$zona = $_REQUEST['zona'];

	$arr_filters = array();

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	// Filtro: Tipo de operacion:

	if (isset($tipo_operacion) and $tipo_operacion!='' and $tipo_operacion!='todas') {

		if ($tipo_operacion=='alquiler') {
			$sql = str_replace('1=1', 'en_alquiler=:en_alquiler', $sql);
			$arr_filters['en_alquiler'] = 'S';
			$fltr_op_slug = 'alquiler';
			$fltr_op_name = 'Alquiler';
		} else {
			$sql = str_replace('1=1', 'en_venta=:en_venta', $sql);
			$arr_filters['en_venta'] = 'S';
			$fltr_op_slug = 'venta';
			$fltr_op_name = 'Venta';
		}
	} else {
		$fltr_op_slug = 'todas';
	}

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	// Filtro: Tipo de propiedad:

	if (isset($tipo_propiedad) and $tipo_propiedad!='' and $tipo_propiedad!='todas') {

		$id_in_db = $dbh->single("select id from propiedades where profit_id=:profit_id", array("profit_id"=>$profit_id));

		$sql = str_replace('3=3', 'tipo_propiedad=:tipo_propiedad', $sql);
		
		$arr_filters['tipo_propiedad'] = $dbh->single("select id from sys_refs_childs where slug=:slug", array("slug"=>$tipo_propiedad));;
		$fltr_prop_slug = $tipo_propiedad;
		$fltr_prop_name = $dbh->single("select name from sys_refs_childs where slug=:slug", array("slug"=>$tipo_propiedad));
	} else {
		$fltr_prop_slug = 'todas';
	}

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	// Filtro: Zona:

	if (isset($zona) and $zona!='' and $zona!='todas') {
		$fltr_zona_id = '';
		$fltr_zona_slug = friendlyUrl($_REQUEST['zona']);
		$fltr_zona_name = str_replace('-', ' ', $fltr_zona_slug);

		$sql = str_replace('4=4', '(lower(localidad) like "%'. strtolower(str_replace('-', ' ', $fltr_zona_slug)) .'%" or lower(pais) like "%'. strtolower(str_replace('-', ' ', $fltr_zona_slug)) .'%" or lower(provincia) like "%'. strtolower(str_replace('-', ' ', $fltr_zona_slug)) .'%" or lower(zona) like "%'. strtolower(str_replace('-', ' ', $fltr_zona_slug)) .'%")', $sql);
	} else {
		$fltr_zona_slug = 'todas';
	}

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	if ($_POST['mode']=='propiedades-search') {
		header ("Location: ". $static_url ."propiedades/$lang/tipo-operacion/$fltr_op_slug/tipo-propiedad/$fltr_prop_slug/zona/$fltr_zona_slug/pagina/1"); die;
	}

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	$ret = $dbh->query($sql, $arr_filters);

	$contador_total = count($ret);

	$iTotal = $contador_total;

	$iLimit = 800;

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

	$from_page = $iPage - 5;

	if($from_page < 5) { $from_page = 1; }

	$to_page = $iPage + 5;

	if($to_page > $iPagesTotal) { $to_page = $iPagesTotal; }

	if ($iPagesTotal > 1){
		if($iPage > 1) {
			$buffer_paging = '<li><a href="propiedades/'. $lang .'/tipo-operacion/'. $fltr_op_slug .'/tipo-propiedad/'. $fltr_prop_slug .'/zona/'. $fltr_zona_slug .'/pagina/'. $back .'"><span>&larr;</span></a></li>';
		}
	    for($i=$from_page;$i<=$to_page;$i++){
	       if ($iPage == $i)
	          $buffer_paging .= '<li class="active"><span>' . $iPage . '</span></li>';
	       else
	          $buffer_paging .= '<li><a href="propiedades/'. $lang .'/tipo-operacion/'. $fltr_op_slug .'/tipo-propiedad/'. $fltr_prop_slug .'/zona/'. $fltr_zona_slug .'/pagina/'. $i .'">'. $i .'</a></li>';
	    }
	}

	if($iPage < $iPagesTotal) {
		$buffer_paging .= '<li><a href="propiedades/'. $lang .'/tipo-operacion/'. $fltr_op_slug .'/tipo-propiedad/'. $fltr_prop_slug .'/zona/'. $fltr_zona_slug .'/pagina/'. $next .'"><span>&rarr;</span></a></li>';
	}

	$ret = $dbh->query($sql_final,$arr_filters);

//$x = $dbh->query('select count(*) from propiedades');
/*$x = $dbh->query('select count(*) from propiedades where propiedades.en_venta = "N" and propiedades.en_alquiler = "N"');*/
/*print_r($arr_filters); die;*/
/*echo $sql_final; die;*/

	$cnt = count($ret);

	for ($i=0; $i < $cnt; $i++) { 

		$obj = new clsPropiedad();

		$obj->find($ret[$i]['id']);

		if ($_SESSION['cliente_id']!='') {
			$client_fav = '
				<div class="col-md-12 col-sm-4">
					<a href="#" class="add-fav btn btn-color2-bg small full" data-propiedad-id="'. $obj->id .'">'. $t['gui']['3'] .'</a>
				</div>';
		} else {
			$client_fav = '
				<div class="col-md-12 col-sm-4">
					<a href="#" class="btn btn-color2-bg small full" data-toggle="modal" data-target="#modal-login">'. $t['gui']['3'] .'</a>
				</div>';
		}

		switch ($fltr_op_slug) {
			case 'alquiler':
					if($obj->precio_alquiler==0) {
						$precio = 'Consultar';
					} else {
						$precio = ret_refchilds_name($dbh, $obj->moneda_alquiler_id) .' '. number_format($obj->precio_alquiler,0,",",".");
					}
				break;
			case 'venta':
				if($obj->precio_venta==0) {
					$precio = 'Consultar';
				} else {
					$precio = ret_refchilds_name($dbh, $obj->moneda_venta_id) .' '. number_format($obj->precio_venta,0,",",".");
				}
				break;
			default:
				if($obj->precio_venta==0 and $obj->precio_alquiler==0) {
					$precio = 'Consultar';
				} else if($obj->precio_venta!=0 and $obj->precio_alquiler==0) {
					$precio = ret_refchilds_name($dbh, $obj->moneda_venta_id) .' '. number_format($obj->precio_venta,0,",",".");
				} else if($obj->precio_venta==0 and $obj->precio_alquiler!=0) {
					$precio = ret_refchilds_name($dbh, $obj->moneda_alquiler_id) .' '. number_format($obj->precio_alquiler,0,",",".");					
				} else if($obj->precio_venta!=0 and $obj->precio_alquiler!=0) {
					$precio = ret_refchilds_name($dbh, $obj->moneda_alquiler_id) .' '. number_format($obj->precio_alquiler,0,",",".") .' /<br>'. ret_refchilds_name($dbh, $obj->moneda_venta_id) .' '. number_format($obj->precio_venta,0,",",".");
				}
				break;			
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

		$thumb = ret_attachment_by_id($dbh, $obj->id, 1);

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
		
		//---//

		if ($obj->sup_cubierta==0) {
			$sup_cubierta = '';
		} else {
			$sup_cubierta = '<span class="text-ucase">'. number_format($obj->sup_cubierta,0,",",".") .' M² '. $t['prp']['20'].'</span>';
		}

		//---//

		if ($obj->cant_habitaciones==0) {
			$habitaciones = '';
		} else {
			$habitaciones = '<span>'. $obj->cant_habitaciones .' HABITACION/ES</span>';
		}

		//---//

		if ($obj->cant_banos==0) {
			$banos = '';
		} else {
			$banos = '<span>'. $obj->cant_banos .' BAÑO/S</span>';
		}

		//---//

		if ($obj->estado_en_profit=='R' or $obj->estado_en_profit=='RESERVADO') {
			$reservado = '<span class="label-reservado blink">RESERVADO</span>';
		} else {
			$reservado = '';
		}

		$buffer .= '
			<div class="item mg-lg-b">
				'. $reservado .'
				<div class="row">
					<div class="col-md-4">
						<a href="propiedad/'. $obj->id .'/'. $lang .'">
							<div class="item-thumb fh1 mg-lg-b" style="background:url('. $thumb .') center center no-repeat;"></div>
						</a>
					</div>
					<div class="col-md-5">
						<div class="item-caption mg-lg-b fh1">
							<a href="propiedad/'. $obj->id .'/'. $lang .'"><h3 class="item-title mg-b">'. substr($titulo, 0, 100) . ' ('. $obj->profit_id .')</h3></a>
							<div class="item-desc">'. substr(strip_tags($descripcion), 0, 250) .'</div>
							<div class="item-info mg-t">
								'. $sup_cubierta .'
								'. $habitaciones .'
								'. $banos .'
							</div>										
						</div>
					</div>
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-12 col-sm-4">
								<p class="price large font-3 color-5 mg-lg-b">'. $precio .'</p>
							</div>
							<div class="col-md-12 col-sm-4">
								<a href="propiedad/'. $obj->id .'/'. $lang .'" class="btn btn-color2-bg small full mg-b">'. $t['gui']['2'] .'</a>
							</div>
							'. $client_fav .'
						</div>
					</div>
				</div>
				<hr/>
			</div>';

		unset($obj);
	}

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	// Armo sidebar de filtros:

	if ($fltr_op_slug!='todas') {
		$buffer_terms .= '<li><strong>'. $fltr_op_name .'</strong></li>';
		$buffer_filtros .= '
			<li>
				<span>
					<i class="icon-icon3"></i>&nbsp;'. $fltr_op_name .' 
					<a href="propiedades/'. $lang .'/tipo-operacion/todas/tipo-propiedad/'. $fltr_prop_slug .'/zona/'. $fltr_zona_slug .'/pagina/1" class="close"><i class="fa fa-times fa-fw"></i></a>
				</span>
			</li>';
	}

	if ($fltr_prop_slug!='todas') {
		$buffer_terms .= '<li><strong>'. $fltr_prop_name .'</strong></li>';
		$buffer_filtros .= '
			<li>
				<span>
					<i class="icon-icon7"></i>&nbsp;'. $fltr_prop_name .' 
					<a href="propiedades/'. $lang .'/tipo-operacion/'. $fltr_op_slug .'/tipo-propiedad/todas/zona/'. $fltr_zona_slug .'/pagina/1" class="close"><i class="fa fa-times fa-fw"></i></a>
				</span>
			</li>';
	}

	if ($fltr_zona_slug!='todas') {
		$buffer_terms .= '<li><strong>'. $fltr_zona_name .'</strong></li>';
		$buffer_filtros .= '
			<li>
				<span>
					<i class="icon-icon7"></i>&nbsp;'. $fltr_zona_name .' 
					<a href="propiedades/'. $lang .'/tipo-operacion/'. $fltr_op_slug .'/tipo-propiedad/'. $fltr_prop_slug .'/zona/'. $fltr_zona_slug .'/pagina/1" class="close"><i class="fa fa-times fa-fw"></i></a>
				</span>
			</li>';
	}

	/*-------------------------------------------------------------------------------------------------------------------------------*/

	// Typehead zonas:


	$ret = $dbh->column('select distinct(localidad) from propiedades where activo = "S" order by localidad');

	$cnt = count($ret);

	for($i=0;$i<$cnt;$i++) {
		$buffer_zonas .= '"'. ucwords(strtolower(strtoupper($ret[$i]))) .'",';
	}

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Propiedades | Curto Propiedades</title>

    <?php include('inc/head.php'); ?>

    <?php include('inc/head_seo1.php'); ?>

</head>
<body>
  
	<?php include('inc/header.php'); ?>

	<div class="wrapper wrapper-pd-t">

		<section id="propiedades">
			<div class="pd-v-xlg">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-3">
							<div class="sidebar mg-lg-b-xs-xs">
								<?php if ($buffer_filtros!='') { ?>
								<h4 class="font-1 title-sm color-4 mg-b"><?php echo $t['prp']['10']; ?></h4>
								<ul class="tags mg-b">
									<?php echo $buffer_filtros; ?>
								</ul>
								<a href="propiedades/<?php echo $lang; ?>/tipo-operacion/todas/tipo-propiedad/todas/zona/todas/pagina/1" class="tags-clear font-1 color-4 mg-lg-b"><?php echo $t['prp']['11']; ?></a>
								<hr class="white mg-b mg-t"/>
								<?php } ?>
								<p class="font-1 color-4"><?php echo $t['prp']['12']; ?></p>
								<form id="form-propiedades-search" action="#" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<select id="tipo-operacion" name="tipo_operacion" class="form-control" required="true">
							                <option value="todas"><?php echo $t['prp']['2']; ?></option>
							                <?php echo ui_refchilds_combo($dbh,'4',$fltr_op_slug,true); ?>
										</select>
									</div>
									<!--<div class="input-group mg-b">
										<span class="input-group-addon"><i class="icon-icon3"></i></span>
										<select id="tipo-operacion" name="tipo_operacion" class="form-control">
							                <option value="todas">Tipo de operación</option>
							                <?php //echo ui_refchilds_combo($dbh,'4',$fltr_op_slug,true); ?>
										</select>
									</div>-->
									<div class="form-group">
										<select id="tipo-propiedad" name="tipo_propiedad" class="form-control">
											<option value="todas"><?php echo $t['prp']['3']; ?></option>
							                <?php echo ui_refchilds_combo($dbh,'2','',true); ?>
										</select>
									</div>
									<!--<div class="input-group mg-b">
										<span class="input-group-addon"><i class="icon-icon7"></i></span>
										<select id="tipo-propiedad" name="tipo_propiedad" class="form-control">
							                <option value="todas">Tipo de propiedad</option>
							                <?php //echo ui_refchilds_combo($dbh,'2',$fltr_prop_slug,true); ?>
										</select>
									</div>-->
									<div class="form-group mg-b-xs-xs">
										<input type="text" id="zona" name="zona" class="form-control typeahead" placeholder="<?php echo $t['prp']['4']; ?>" value="<?php echo $fltr_zona_name; ?>">
									</div>
								</form>
							</div>
						</div>
						<div class="col-sm-8 col-md-9">
							<div class="results mg-lg-b color-4 font-1">
								
								<?php if ($contador_total>1 || $contador_total==0){ ?>
								<span><?php echo $contador_total; ?> <?php echo $t['prp']['13']; ?></span>
								<?php } else { ?>
								<span><?php echo $contador_total; ?> <?php echo $t['prp']['14']; ?></span>
								<?php } ?>

								<?php if ($buffer_terms!='') { ?>
								<ul class="results-terms">
									<li><?php echo $t['prp']['15']; ?></li>
									<?php echo $buffer_terms; ?>
								</ul>
								<?php } ?>
							</div>
							<?php echo $buffer; ?>
							<nav>
								<ul class="pagination text-center">
									<?php echo $buffer_paging; ?>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>

		</section>
		
	</div>

	<?php include('inc/footer.php'); ?>

	<script type="text/javascript">

		$(function(){

			$('#nav-main a.propiedades').addClass('active');

			$('#form-propiedades-search .form-control').change(function(){
				$('#form-propiedades-search').submit();				
			});

			$('#form-propiedades-search').submit(function(e){
				var tipo_op = $('#tipo-operacion').val();
				var tipo_prop = $('#tipo-propiedad').val();
				var zona = convertToSlug($('#zona').val());
				if (zona=='') {
					zona = 'todas';
				}
				$(this).attr('action', "propiedades/<?php echo $lang; ?>/tipo-operacion/"+ tipo_op +"/tipo-propiedad/"+ tipo_prop +"/zona/"+ zona +"/pagina/1");
			});

			function convertToSlug(textString) {
			    return textString.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
			}

			// Typehead:

			var substringMatcher = function(strs) {
				return function findMatches(q, cb) {
					var matches, substringRegex;
					matches = [];
					substrRegex = new RegExp(q, 'i');
					$.each(strs, function(i, str) {
						if (substrRegex.test(str)) {
							matches.push(str);
						}
					});
					cb(matches);
				};
			};

			var zonas_dataset = [ <?php echo $buffer_zonas; ?> ];

			$('.typeahead').typeahead({
				hint: true,
				highlight: true,
				minLength: 1
			}, {
				name: 'zonas_dataset',
				source: substringMatcher(zonas_dataset)
			});

		});

	</script>

</body>
</html>