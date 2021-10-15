<?php

	$url = 'home';

	$pathRoot = '';

	require_once($pathRoot . 'inc/i_common.php');

	/*--------------------------------------------------------------*/
	// PLANES:
	/*--------------------------------------------------------------*/

	require_once($pathRoot . 'lib/cls/cls.planes.php');

	$sql = 'select max(id) as maxid from coworking_planes where activo="S"';

	$ret = $dbh->query($sql, $arr_filters);

	$cnt_planes = count($ret);

	$objPlanes = new clsPlanes();

	$objPlanes->find($ret[0]['maxid']);

	//print_r($ret[0]['maxid']);die;

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Curto Coworking&mdash;La calidez del barrio con los servicios profesionales que necesitás para desarrollarte.</title>

	<?php include('inc/i_head.php'); ?>

</head>
<body data-spy="scroll" data-target="#navbar-nav" data-offset="200">

	<main id="wrapper">

		<?php include('inc/i_header.php'); ?>

		<section id="home" class="page-home">

			<section id="hero" class="block-home-hero">
				<div id="hero-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#hero-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#hero-carousel" data-slide-to="1"></li>
						<li data-target="#hero-carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="assets/images/hero_slides/slide1.jpg" class="image-fixed-height -md d-block w-100">
							<div class="carousel-caption">
								<div class="container">
									<h5 class="txt-8 font-1 mb-lg-5">La calidez del barrio con los servicios profesionales que necesitás para desarrollarte.</h5>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<img src="assets/images/hero_slides/slide1.jpg" class="image-fixed-height -md d-block w-100">
							<div class="carousel-caption">
								<div class="container">
									<h5 class="txt-8 font-1 mb-lg-5">La calidez del barrio con los servicios profesionales que necesitás para desarrollarte.</h5>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<img src="assets/images/hero_slides/slide1.jpg" class="image-fixed-height -md d-block w-100">
							<div class="carousel-caption">
								<div class="container">
									<h5 class="txt-8 font-1 mb-lg-5">La calidez del barrio con los servicios profesionales que necesitás para desarrollarte.</h5>
								</div>
							</div>
						</div>
					</div>
					<a class="carousel-control-prev" href="#hero-carousel" role="button" data-slide="prev">
						<i class="fal fa-chevron-left fa-fw fa-3x"></i>
					</a>
					<a class="carousel-control-next" href="#hero-carousel" role="button" data-slide="next">
						<i class="fal fa-chevron-right fa-fw fa-3x"></i>
					</a>
				</div>
			</section>

			<section id="bienvenidos" class="py-5">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-9">
							<div class="text-center">
								<h2 class="txt-7 color-1 mt-5 mb-5">¡BIENVENIDOS!</h2>
								<p class="txt-4 mb-5">
									Creamos un nuevo espacio de coworking en Monte Grande para profesionales, emprendedores y equipos que buscan trabajar en un lugar "de barrio", cómodo, con infraestructura y rodeado de otros profesionales con los que poder generar nuevos proyectos. 
									<br><br>
									En CURTO COWORKING contamos con puestos de trabajo individuales, una sala para reuniones, un espacio privado para videollamadas y un comedor con cocina para que puedas descansar y socializar con otros coworkers. 
									<br><br>
									Un nuevo espacio, una forma diferente de trabajar. <strong>¡Conocenos!</strong> 
								</p>
								<a href="#contacto" class="goto-link btn btn-outline-primary btn-lg px-5 mb-5">¡Quiero más info!</a>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="planes" class="block-home-planes">
				<div class="bg-4 py-5">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-9">
								<div class="text-center">
									<h2 class="txt-7 color-1 mt-4 mb-5">PLANES</h2>
									<p class="txt-4 mb-5 pb-5">
										Cada plan está diseñado especialmente para que los emprendedores, profesionales y equipos de trabajo de una pequeña empresa, encuentren su espacio ideal sin tener que alquilar una oficina con gastos fijos.
										<br><br>
										Vos impulsá tu negocio, <strong>¡del resto nos ocupamos nosotros!</strong>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>


				<?php if ($cnt_planes>0) { ?>
				<div class="mb-4 pb-4" style="margin-top: -65px;">
					<div class="container">
						<div class="row justify-content-md-center justify-content-lg-between">
							<div class="col-md-6 col-lg-4 px-2 px-lg-4">
								<div class="card text-center h-100">
									<div class="card-header py-3 px-4">
										<h5 class="card-title txt-5 color-w m-0" style="line-height: 1em;"><?php echo $objPlanes->titulo_fulltime; ?></h5>
									</div>
									<div class="card-body pt-3 pb-4 px-4 d-flex flex-column justify-content-between align-items-center">
										<p class="card-text txt-4 color-w mb-3"><?php echo $objPlanes->desc_fulltime; ?></p>
										<img src="assets/images/icons/planes_icon1.svg" class="card-image d-block px-4">
									</div>
									<div class="card-footer d-flex align-items-center px-0">
										<div class="w-100">
											<span class="txt-4 d-block color-w">Mensual $<?php echo $objPlanes->valor_mensual_fulltime; ?> + IVA</span>
											<hr class="hr-light my-2">
											<span class="txt-4 d-block color-w">Quincenal $<?php echo $objPlanes->valor_quincenal_fulltime; ?> + IVA</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-4 px-2 px-lg-4">
								<div class="card text-center h-100">
									<div class="card-header py-3 px-4">
										<h5 class="card-title txt-5 color-w m-0" style="line-height: 1em;"><?php echo $objPlanes->titulo_partime; ?></h5>
									</div>
									<div class="card-body pt-3 pb-4 px-4 d-flex flex-column justify-content-between align-items-center">
										<p class="card-text txt-4 color-w mb-3"><?php echo $objPlanes->desc_partime; ?></p>
										<img src="assets/images/icons/planes_icon2.svg" class="card-image d-block px-4">
									</div>
									<div class="card-footer d-flex align-items-center px-0">
										<div class="w-100">
											<span class="txt-4 d-block color-w">Mensual $<?php echo $objPlanes->valor_mensual_partime; ?> + IVA</span>
											<hr class="hr-light my-2">
											<span class="txt-4 d-block color-w">Quincenal $<?php echo $objPlanes->valor_quincenal_partime; ?> + IVA</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-lg-4 px-2 px-lg-4">
								<div class="card text-center h-100">
									<div class="card-header py-3 px-4">
										<h5 class="card-title txt-5 color-w m-0" style="line-height: 1em;"><?php echo $objPlanes->titulo_sala; ?></h5>
									</div>
									<div class="card-body pt-3 pb-4 px-4 d-flex flex-column justify-content-between align-items-center">
										<p class="card-text txt-4 color-w mb-3"><?php echo $objPlanes->desc_sala; ?></p>
										<img src="assets/images/icons/planes_icon3.svg" class="card-image d-block px-4">
									</div>
									<div class="card-footer d-flex align-items-center px-0" style="height: 90px;">
										<span class="txt-4 w-100 d-block color-w">$<?php echo $objPlanes->valor_hora_sala; ?> por hora + IVA</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>


				<div class="container">
					<div class="px-2 px-lg-3">
						<div class="planes-banner bg-g2 mb-5">
							<div class="d-flex justify-content-start align-items-center">
								<img src="assets/images/planes_graf_alert.svg">
								<h3 class="txt-5 font-3 color-1 mx-4 py-3">¡Tené en cuenta que <strong>todos nuestros planes son mensuales o quincenales</strong>!</h3>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="planes-custom" class="block-home-planes-custom block-py-sm" style="background: url('assets/images/planes_custom_bg.jpg') center center no-repeat; background-size: cover;">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="color-w mr-5">
								<h2 class="txt-7 mb-3">¿NO ENCONTRASTE <br class="d-none d-md-block">TU PLAN PERFECTO?</h2>
								<p class="txt-5 mb-4">¡Comunicate con nosotros y lo armamos!</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="bg-alpha border-radius p-2 p-md-4">
								<form id="formPlanes" action="#" method="POST" data-toggle="validator">
									<div class="form-group">
										<input type="text" name="nombre_completo" class="form-control form-control-lg" placeholder="Nombre" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" class="form-control form-control-lg" placeholder="E-mail" required>
									</div>
									<div class="form-group">
										<textarea name="mensaje" class="form-control form-control-lg" rows="4" placeholder="Contanos tu necesidad"></textarea>
									</div>
									<div class="row align-items-center">
										<div class="col-7">
											<p id="formPlanesResponse" class="txt-3 color-1"></p>	
										</div>
										<div class="col-5">
											<div class="text-right">
												<button type="submit" class="btn btn-primary btn-lg px-5 mb-0">Enviar</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="salas" class="block-home-salas my-3">
				<div id="salas-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#salas-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#salas-carousel" data-slide-to="1"></li>
						<li data-target="#salas-carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="assets/images/salas_slides/slide1.jpg" class="image-fixed-height -sm d-block w-100">
						</div>
						<div class="carousel-item">
							<img src="assets/images/salas_slides/slide1.jpg" class="image-fixed-height -sm d-block w-100">
						</div>
						<div class="carousel-item">
							<img src="assets/images/salas_slides/slide1.jpg" class="image-fixed-height -sm d-block w-100">
						</div>
					</div>
					<a class="carousel-control-prev" href="#salas-carousel" role="button" data-slide="prev">
						<i class="fal fa-chevron-left fa-fw fa-3x"></i>
					</a>
					<a class="carousel-control-next" href="#salas-carousel" role="button" data-slide="next">
						<i class="fal fa-chevron-right fa-fw fa-3x"></i>
					</a>
				</div>
				<div class="salas-caption">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-md-9 col-lg-6">
								<div class="bg-alpha border-radius p-4 p-md-5 mr-md-5">
									<h5 class="txt-6 font-6 mb-1">COWORK</h5>	
									<p class="txt-4">En nuestro espacio de coworking contamos con 8 puestos de trabajo. Una oficina amplia y luminosa, equipada con todas las comodidades que necesitás.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="servicios" class="block-home-servicios bg-g2 py-5">
				<div class="container">
					<h2 class="txt-7 text-center color-1 mt-5 mb-5 pb-3">SERVICIOS</h2>
					<div class="row justify-content-center">
						<div class="col-md-6 col-lg-3">
							<div class="item p-3 mb-5">
								<img src="assets/images/icons/servicios_icon1.svg" class="item-image d-block mx-auto mb-4">
								<h3 class="txt-4 font-4 text-center">Sala de reunión</h3>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="item p-3 mb-5">
								<img src="assets/images/icons/servicios_icon2.svg" class="item-image d-block mx-auto mb-4">
								<h3 class="txt-4 font-4 text-center">Wifi de alta velocidad</h3>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="item p-3 mb-5">
								<img src="assets/images/icons/servicios_icon3.svg" class="item-image d-block mx-auto mb-4">
								<h3 class="txt-4 font-4 text-center">Impresora y scanner</h3>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="item p-3 mb-5">
								<img src="assets/images/icons/servicios_icon4.svg" class="item-image d-block mx-auto mb-4">
								<h3 class="txt-4 font-4 text-center">Café y bebidas disponibles todo el día</h3>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="item p-3 mb-5">
								<img src="assets/images/icons/servicios_icon5.svg" class="item-image d-block mx-auto mb-4">
								<h3 class="txt-4 font-4 text-center">Cocina con heladera y microondas</h3>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="item p-3 mb-5">
								<img src="assets/images/icons/servicios_icon6.svg" class="item-image d-block mx-auto mb-4">
								<h3 class="txt-4 font-4 text-center">Limpieza permanente</h3>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="item p-3 mb-5">
								<img src="assets/images/icons/servicios_icon7.svg" class="item-image d-block mx-auto mb-4">
								<h3 class="txt-4 font-4 text-center">Y los viernes, ¡after de coworkers!</h3>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section id="lugar" class="block-home-lugar my-3">
				<div id="lugar-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#lugar-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#lugar-carousel" data-slide-to="1"></li>
						<li data-target="#lugar-carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="assets/images/lugar_slides/slide1.jpg" class="image-fixed-height -md d-block w-100">
						</div>
						<div class="carousel-item">
							<img src="assets/images/lugar_slides/slide1.jpg" class="image-fixed-height -md d-block w-100">
						</div>
						<div class="carousel-item">
							<img src="assets/images/lugar_slides/slide1.jpg" class="image-fixed-height -md d-block w-100">
						</div>
					</div>
					<a class="carousel-control-prev" href="#lugar-carousel" role="button" data-slide="prev">
						<i class="fal fa-chevron-left fa-fw fa-3x"></i>
					</a>
					<a class="carousel-control-next" href="#lugar-carousel" role="button" data-slide="next">
						<i class="fal fa-chevron-right fa-fw fa-3x"></i>
					</a>
				</div>
			</section>

			<section id="beneficios" class="block-home-beneficios bg-4 mb-3 block-py-sm">
				<div class="container">
					<h2 class="txt-7 text-center color-1 mt-4 mb-5">BENEFICIOS</h2>
					<div class="item d-flex flex-column flex-md-row justify-content-start align-items-start mb-4">
						<img src="assets/images/icons/beneficios_icon1.svg" class="item-image mb-3 mb-md-0 ml-0 ml-md-4 mr-4">
						<div class="item-body">
							<h5 class="txt-4 mt-0">CONTACTOS</h5>
							<p class="txt-3">Al habitar un mismo espacio, vas a conocer distintos profesionales, cada uno con su propia red de contactos. Esto te va a dar la oportunidad de compartir conocimientos, generar nuevas relaciones, proyectos y <strong>¡negocios!</strong></p>
						</div>
					</div>
					<hr class="hr-dark mb-5">
					<div class="item d-flex flex-column flex-md-row justify-content-start align-items-start mb-4">
						<img src="assets/images/icons/beneficios_icon2.svg" class="item-image order-lg-1 mb-3 mb-md-0 ml-0 ml-md-4 mr-4">
						<div class="item-body text-lg-right order-lg-0">
							<h5 class="txt-4 mt-0">AHORRO</h5>
							<p class="txt-3">La alternativa ideal si estás arrancando un nuevo proyecto o dando tus primeros pasos como profesional. Ser parte de un coworking te permite dejar de trabajar desde tu casa pero sin pagar los gastos fijos de una oficina.</p>
						</div>
					</div>
					<hr class="hr-dark mb-5">
					<div class="item d-flex flex-column flex-md-row justify-content-start align-items-start mb-4">
						<img src="assets/images/icons/beneficios_icon3.svg" class="item-image mb-3 mb-md-0 ml-0 ml-md-4 mr-4">
						<div class="item-body">
							<h5 class="txt-4 mt-0">MANEJÁ TUS TIEMPOS</h5>
							<p class="txt-3">Tenemos una amplia franja horaria para que puedas organizarte y disponer de tu tiempo como te quede mejor.</p>
						</div>
					</div>
					<hr class="hr-dark mb-5">
					<div class="item d-flex flex-column flex-md-row justify-content-start align-items-start mb-4">
						<img src="assets/images/icons/beneficios_icon4.svg" class="item-image order-lg-1 mb-3 mb-md-0 ml-0 ml-md-4 mr-4">
						<div class="item-body text-lg-right order-lg-0">
							<h5 class="txt-4 mt-0">ESTABILIDAD</h5>
							<p class="txt-3">Contar con un espacio asegurado es de gran importancia para tu negocio; vas a tener un lugar donde recibir clientes y así olvidarte de pensar a qué cafetería ir o qué consumir para poder trabajar.</p>
						</div>
					</div>
				</div>
			</section>

			<section id="contacto" class="block-home-contacto block-py-sm" style="background: url('assets/images/contacto_bg.jpg') center center no-repeat; background-size: cover;">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="color-w mr-5 mb-5">
								<h2 class="txt-6 mb-3">CONTACTO</h2>
								<p class="txt-3 mb-3">Esperamos tu consulta para sacarte todas las dudas y que te unas a nuestra comunidad. Escribinos, llamanos, visitanos. <strong>¡Nos encanta saber de vos!</strong></p>
								<p class="txt-3 mb-3">
									// Dirección: <a href="#" class="link-underlined color-w -hover-c4">Vicente López 515, B1842<br class="d-none d-md-block"> 
										Monte Grande, Buenos Aires</a>
									<br><br>
									// Teléfono: <a href="#" class="link-underlined color-w -hover-c4">011 5263-9039</a>
									<br><br>
									// e-mail: <a href="#" class="link-underlined color-w -hover-c4">coworking@curtopropiedades.com</a>
								</p>
							</div>
						</div>
						<div class="col-md-6">
							<div class="bg-alpha border-radius p-2 p-md-4 mb-5">
								<form id="formContact" action="#" method="POST" data-toggle="validator">
									<div class="form-group">
										<input type="text" name="nombre_completo" class="form-control form-control-lg" placeholder="Nombre" required>
									</div>
									<div class="form-group">
										<input type="email" name="email" class="form-control form-control-lg" placeholder="E-mail" required>
									</div>
									<div class="form-group">
										<textarea name="mensaje" class="form-control form-control-lg" rows="4" placeholder="Contanos tu necesidad"></textarea>
									</div>
									<div class="row align-items-center">
										<div class="col-7">
											<p id="formContactResponse" class="txt-3 color-1"></p>	
										</div>
										<div class="col-5">
											<div class="text-right">
												<button type="submit" class="btn btn-primary btn-lg px-5 mb-0">Enviar</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-md-6">
							<div class="color-w mr-5">
								<h2 class="txt-5 mb-3">¡SUMATE A NUESTRA COMUNIDAD!</h2>
								<p class="txt-3 mb-4 mb-md-0">Seguinos en redes y enterate de las últimas novedades y de todo lo que pasa en <strong>CURTO COWORKING</strong>.</p>
							</div>
						</div>
						<div class="col-md-6">
							<ul class="nav-social list-unstyled d-flex">
								<li><a href="#" class="mr-3"><i class="fab fa-facebook-f fa-2x fa-fw"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram fa-2x fa-fw"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>

		</section>

		<?php include('inc/i_footer.php'); ?>

	</main>

	<script type="text/javascript">

		$(document).ready(function(){

			$('#formPlanes').validator().submit(function(e){
				if (e.isDefaultPrevented()) {
					$('#formPlanesResponse').html('<i class="fal fa-times fa-fw"></i> Datos requeridos incompletos (*)');    
				} else {
					$.ajax({
						type: "POST",
						url: 'process/planes.php',
						data: $(this).serialize(),
						success: function(response){
							console.log(response);
							switch (response) {
								case 'success':
								$('#formPlanes')[0].reset();
								$('#formPlanesResponse').html('<i class="fal fa-check fa-fw"></i> Mensaje enviado con éxito!');
								break;
								case 'error':
								$('#formPlanesResponse').html('<i class="fal fa-times fa-fw"></i> Existen errores en la transacción.');
								break;
								default:
								$('#formPlanesResponse').html('<i class="fal fa-times fa-fw"></i> '+response);
								break;
							}
						}
					});
				}
				return false;
			});

			$('#formContact').validator().submit(function(e){
				if (e.isDefaultPrevented()) {
					$('#formContactResponse').html('<i class="fal fa-times fa-fw"></i> Datos requeridos incompletos (*)');    
				} else {
					$.ajax({
						type: "POST",
						url: 'process/contact.php',
						data: $(this).serialize(),
						success: function(response){
							console.log(response);
							switch (response) {
								case 'success':
								$('#formContact')[0].reset();
								$('#formContactResponse').html('<i class="fal fa-check fa-fw"></i> Mensaje enviado con éxito!');
								break;
								case 'error':
								$('#formContactResponse').html('<i class="fal fa-times fa-fw"></i> Existen errores en la transacción.');
								break;
								default:
								$('#formContactResponse').html('<i class="fal fa-times fa-fw"></i> '+response);
								break;
							}
						}
					});
				}
				return false;
			});

		});

	</script>

</body>
</html>