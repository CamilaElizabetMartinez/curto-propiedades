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

	$auth = new TokkoAuth('4fbfb1318c148749d76fa87803fcb5ed83620e7f');

	$search_form = new TokkoSearchForm($auth);

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Propiedades | Curto Propiedades</title>

    <?php include($pathRoot.'inc/head.php'); ?>

    <?php include($pathRoot.'inc/head_seo1.php'); ?>

	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">google.load('jquery', '1.7.1');</script>
	<script type="text/javascript">google.load('jqueryui', '1.8.13');</script>

</head>
<body>
  
	<?php include($pathRoot.'inc/header.php'); ?>

	<div class="wrapper">

		<section id="propiedades">

			<div id="hero-busqueda">
				<div class="container fh1">
					<div class="busqueda-form">
						<h1 class="hero-title mg-b"><?php echo $t['prp']['1']; ?></h1>
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
								<div class="bg">
									<form id="form-propiedades-search" action="#" method="POST" enctype="multipart/form-data" data-toggle="validator" data-focus="false">
										<input type="hidden" name="mode" value="propiedades-search">
										<input type="hidden" name="lang" value="<?php echo $lang; ?>">
										<div class="row">
											<div class="col-sm-6 col-md-5">
												<div class="form-group no-mg">
													<select id="operationType" class="form-control" required>
														<option value='-1'><?php echo $t['prp']['2']; ?></option>
														<option value='1'>Venta</option>
														<option value='2'>Alquiler</option>
														<option value='3'>Alquiler temporario</option>
													</select>
													<!--<div class="help-block with-errors title-xxsm font-2"></div>-->
												</div>
											</div>
											<div class="col-sm-6 col-md-5">
												<div class="form-group no-mg">
													<select id="propertyTypes" class="form-control">
														<option value='-1'><?php echo $t['prp']['3']; ?></option>
														<option value='1' >Terreno</option>
														<option value='2' >Departamento</option>
														<option value='3' >Casa</option>
														<option value='4' >Casa de fin de semana</option>
														<option value='5' >Oficina</option>
														<option value='6' >Amarradero</option>
														<option value='7' >Local</option>
														<option value='8' >Edficios comerciales</option>
													</select>
												</div>
											</div>
											<!--<div class="col-sm-6 col-md-4">
												<div class="form-group mg-b-xs-xs">
													<input type="text" id="zona" name="zona" class="form-control typeahead" placeholder="<?php //echo $t['prp']['4']; ?>" autocomplete="off">
												</div>
											</div>-->
											<div class="col-sm-6 col-md-2">
												<!--<button type="submit" class="btn btn-color4 full"></button>-->
												<input type="button" class="btn btn-color4 full" onclick="doSearch()" value="<?php echo $t['gui']['1']; ?>" />	
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
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

	<script>

		function doSearch(){
			//Init data dictionary with general parameters
			var data = {"current_localization_id":0,"current_localization_type":"country","price_from":0,"price_to":999999999,"operation_types":[1,2,3],"property_types":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],"currency":"ANY","filters":[]}
			//Set operation type value
			if( $("#operationType").val() != -1 ){
				data['operation_types'] = [$("#operationType").val()];
			}
			// Set property type value
			if( $("#propertyTypes").val() != -1 ){
				data['property_types'] = [$("#propertyTypes").val()];
			}
			// Send data by GET to properties result page
			window.location='_dev/propiedades.php?order_by=price&limit=10&order=desc&page=1&data='+JSON.stringify(data);
		}

	</script>

</body>
</html>