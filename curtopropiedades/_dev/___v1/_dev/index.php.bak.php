<?php

	$url = 'home';

	$permit = '';

	$pathRoot = '../';

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

	error_reporting(0);

	include 'api.inc';

	$auth = new TokkoAuth('a289c133348c53c870cf2ae21cc513a238ea684a');

	$search_form = new TokkoSearchForm($auth);

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Propiedades | Curto Propiedades</title>

    <?php include($pathRoot.'inc/head.php'); ?>

    <?php include($pathRoot.'inc/head_seo1.php'); ?>

</head>
<body>
  
	<?php include($pathRoot.'inc/header.php'); ?>

	<div class="wrapper wrapper-pd-t">

		<section id="propiedades">

			<div class="bg bg-image pd-v-lg">
				<div class="busqueda-form">
					<div class="container">
						<h1 class="hero-title mg-lg-b"><?php echo $t['prp']['1']; ?></h1>
						<form id="form-propiedades-search" action="#" method="POST" enctype="multipart/form-data" data-toggle="validator" data-focus="false">
							<div class="row">
								<div class="col-sm-4">
									<p>Tipo de operación</p>
									<?php $search_form->deploy_operation_types_selection('operation_selector', "Tipo de operacion", [1,2], "campos_prop"); ?>
									<p>Tipo de inmueble</p>
									<?php $search_form->deploy_property_types_selection('property_types_selector', "Tipo de propiedad", "campos_prop"); ?>
								</div>
								<div class="col-sm-8">
									<div class="form-inline-third">
										<?php $search_form->deploy_location_tree('location_tree', "Seleccionar", "location_tree-type", "location_tree-id", "147", "state", 3, 'div', false, ['Provincia','Ciudad','Zona']); ?>
									</div>
									<div class="row">
										<!--<div class="col-sm-4">
											<div class="form-moneda">
												<p>Moneda</p>
												<ul class="lista_buscador_avanz">
													<?php //$search_form->deploy_currency_selection('currency_selector', "", ["USD","ARS"], "input_buscador", "ARS", "radiobutton", 'li'); ?>
												</ul>
											</div>
										</div>-->
										<div class="col-sm-6">
											<div class="form-inline-half">
												<p>Precio</p>
												<?php $search_form->deploy_price_range_selection('price_range_selector', ["minimo", "maximo"]); ?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-inline-half">
												<p>Ambientes</p>
												<?php $search_form->deploy_range_filter_selection('room_amount_selector', "room_amount", ["minimo", "maximo"]); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3 col-sm-offset-9">
									<?php $search_form->deploy_search_button('do_search_button', 'BUSCAR', 'enviar_prop'); ?>	
								</div>
							</div>
							<?php $search_form->deploy_search_function('_dev/propiedades.php'); ?>
						</form>
					</div>
				</div>
			</div>

			<div class="pd-v-xlg">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<p class="large text-center mg-xlg-b"><?php echo $t['prp']['5']; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="row">
								<div class="col-xs-6 col-sm-3 col-no-pd-r mg-b-xs-xs">
									<span class="link-icon">
										<i class="icon-icon11"></i>
										<hr/>
										<span class="caption"><?php echo $t['prp']['6']; ?></span>
									</span>
								</div>
								<div class="col-xs-6 col-sm-3 col-no-pd-r col-no-pd-l mg-b-xs-xs">
									<span class="link-icon">
										<i class="icon-icon14"></i>
										<hr/>
										<span class="caption"><?php echo $t['prp']['7']; ?></span>
									</span>	
								</div>
								<div class="col-xs-6 col-sm-3 col-no-pd-r col-no-pd-l mg-b-xs-xs">
									<span class="link-icon">
										<i class="icon-icon16"></i>
										<hr/>
										<span class="caption"><?php echo $t['prp']['8']; ?></span>
									</span>
								</div>
								<div class="col-xs-6 col-sm-3 col-no-pd-l mg-b-xs-xs">
									<span class="link-icon">
										<i class="icon-icon5"></i>
										<hr/>
										<span class="caption"><?php echo $t['prp']['9']; ?></span>
									</span>	
								</div>
							</div>						
						</div>
					</div>
				</div>
			</div>

		</section>
		
	</div>

	<?php include($pathRoot.'inc/footer.php'); ?>

	<script type="text/javascript">

		$(function(){

		});

	</script>

</body>
</html>