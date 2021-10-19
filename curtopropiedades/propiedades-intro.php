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

	require_once('lang/'. $lang .'/lang.php');

	/*--------------------------------------------------------------*/
	// PROPIEDADES:
	/*--------------------------------------------------------------*/

	// Zonas:

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

		<section id="propiedades">

			<div id="hero-busqueda">
				<div class="container fh1">
					<div class="busqueda-form">
						<h1 class="hero-title mg-b"><?php echo $t['prp']['1']; ?></h1>
						<div class="bg">
							<form id="form-propiedades-search" action="#" method="POST" enctype="multipart/form-data" data-toggle="validator" data-focus="false">
								<input type="hidden" name="mode" value="propiedades-search">
								<input type="hidden" name="lang" value="<?php echo $lang; ?>">
								<div class="row">
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<select id="tipo-operacion" name="tipo_operacion" class="form-control" required="true">
								                <option value=""><?php echo $t['prp']['2']; ?></option>
								                <?php echo ui_refchilds_combo($dbh,'4',$fltr_op_slug,true); ?>
											</select>
											<div class="help-block with-errors title-xxsm font-2"></div>
										</div>
									</div>
									<div class="col-sm-6 col-md-3">
										<div class="form-group">
											<select id="tipo-propiedad" name="tipo_propiedad" class="form-control">
												<option value="todas"><?php echo $t['prp']['3']; ?></option>
								                <?php echo ui_refchilds_combo($dbh,'2','',true); ?>
											</select>
										</div>
									</div>
									<div class="col-sm-6 col-md-4">
										<div class="form-group mg-b-xs-xs">
											<input type="text" id="zona" name="zona" class="form-control typeahead" placeholder="<?php echo $t['prp']['4']; ?>" autocomplete="off">
										</div>
									</div>
									<div class="col-sm-6 col-md-2">
										<button type="submit" class="btn btn-color4 full"><?php echo $t['gui']['1']; ?></button>
									</div>
								</div>
							</form>
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

	<?php include('inc/footer.php'); ?>

	<script type="text/javascript">

		$(function(){

			$('#nav-main a.propiedades').addClass('active');

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

            $('#form-propiedades-search').validator().on('submit', function(e){
                if (e.isDefaultPrevented()) {
					return false;
              	} else {
              		$(this).attr('action','http://localhost/curto-propiedades/curtopropiedades/propiedades-list.php');
              	}
          	});

		});

	</script>

</body>
</html>