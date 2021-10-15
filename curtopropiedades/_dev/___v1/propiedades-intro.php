<?php

	$url = 'buscar-propiedades';

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

	<div class="wrapper">

		<section id="propiedades">

			<div id="hero-busqueda">
				<div class="container fh1">
					<div class="busqueda-form">
						<h1 class="hero-title mg-b"><?php echo $t['prp']['1']; ?></h1>
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="bg">
									<form id="form-propiedades-search" action="buscar-propiedades/<?php echo $lang; ?>" method="POST" enctype="multipart/form-data" data-toggle="validator" data-focus="false">
										<input type="hidden" name="mode" value="propiedades-search">
										<input type="hidden" name="lang" value="<?php echo $lang; ?>">
										<div class="row">
											<div class="col-sm-6 col-md-5">
												<div class="form-group no-mg">
													<select id="operationType" class="form-control" required>
														<option value=""><?php echo $t['prp']['2']; ?></option>
														<option value="1">Venta</option>
														<option value="2">Alquiler</option>
														<option value="3">Alquiler temporario</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6 col-md-5">
												<div class="form-group no-mg">
													<select id="propertyTypes" class="form-control" required>
														<option value=""><?php echo $t['prp']['3']; ?></option>
														<option value="1" >Terreno</option>
														<option value="2" >Departamento</option>
														<option value="3" >Casa</option>
														<option value="4" >Casa de fin de semana</option>
														<option value="5" >Oficina</option>
														<option value="6" >Amarradero</option>
														<option value="7" >Local</option>
														<option value="8" >Edficios comerciales</option>
													</select>
												</div>
											</div>
											<!--<div class="col-sm-6 col-md-4">
												<div class="form-group mg-b-xs-xs">
													<input type="text" id="zona" name="zona" class="form-control typeahead" placeholder="<?php //echo $t['prp']['4']; ?>" autocomplete="off">
												</div>
											</div>-->
											<div class="col-sm-6 col-md-2">
												<button type="submit" class="btn btn-secondary full"><i class="fa fa-search fa-fw fa-lg"></i></button>
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

			if( $("#operationType").val()!=''){
				operation_types = $("#operationType").val();
			} else {
				operation_types = '1,2,3';
			}

			if( $("#propertyTypes").val()!=''){
				property_types = $("#propertyTypes").val();
			} else {
				property_types = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25';
			}

			window.location='propiedades.php?order_by=price&limit=6&order=desc&page=1&operation_types='+operation_types+'&property_types='+property_types;
		}

		$(function(){

			$('#form-propiedades-search').validator().on('submit', function(e){
				if (e.isDefaultPrevented()) {
				} else {
					doSearch();
				}
				return false;
			});

		});

	</script>

</body>
</html>