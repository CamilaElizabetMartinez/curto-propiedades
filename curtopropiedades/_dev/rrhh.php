<?php

	$url = 'servicios';

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
	// ENVIO:
	/*--------------------------------------------------------------*/

	$sMsgText = '';

	if ($_POST['mode']=='process') {

		require_once($pathRoot . 'lib/mailer/class.phpmailer.php');
		require_once($pathRoot . 'lib/mailer/class.smtp.php');

		$subject = 'Curto Propiedades: Recibiste una postulacion';

		$contenido = file_get_contents($pathRoot . 'resp/rrhh.html');

		if ($_REQUEST['nombre']=='' &&  $_REQUEST['mail']=='' && $_REQUEST['tel']=='') {
		   echo('Datos requeridos incompletos.');
		   exit;
		} else {

			try {

			    $contenido = str_replace(
			        array(
						'[nombre]',
						'[apellido]',
						'[mail]',
						'[dni]',
						'[fecha_nac]',
						'[provincia]',
						'[tel]',
						'[cel]',
						'[direccion]',
						'[localidad]',
						'[cp]',
						'[formacion_academica]',
						'[titulo]'
					),
			        array(
						$_REQUEST['nombre'],
						$_REQUEST['apellido'],
						$_REQUEST['mail'],
						$_REQUEST['dni'],
						$_REQUEST['fecha_nac'],
						$_REQUEST['provincia'],
						$_REQUEST['tel'],
						$_REQUEST['cel'],
						$_REQUEST['direccion'],
						$_REQUEST['localidad'],
						$_REQUEST['cp'],
						$_REQUEST['formacion_academica'],
						$_REQUEST['titulo']
			        ), 
			        $contenido);

				$oMailer = new PHPMailer(); // create a new object
				$oMailer->IsSMTP(); // enable SMTP
				$oMailer->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
				$oMailer->SMTPAuth = true; // authentication enabled
				$oMailer->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
				$oMailer->Host = "smtp.gmail.com";
				$oMailer->Port = 465; // or 587
				$oMailer->IsHTML(true);

				$oMailer->Username = "curtopropiedades.smtp@gmail.com";
				$oMailer->Password = "curto2017..";

				$oMailer->SetFrom($_REQUEST['mail'], $_REQUEST['nombre']);
				$oMailer->Subject = $subject;
				$oMailer->Body = $contenido;

				$oMailer->AddAddress("nsotlar@gmail.com");

				$oMailer->AddAddress("m.curto@ladrilloslamarisa.com");
				$oMailer->AddAddress("g.curto@ladrilloslamarisa.com");

				/*$oMailer->AddAddress("nndesarrollo@gmail.com");
				$oMailer->AddAddress("administracion@curtopropiedades.com");

				$oMailer->AddAddress("m.curto@ladrilloslamarisa.com");
				$oMailer->AddAddress("g.curto@ladrilloslamarisa.com");
				$oMailer->AddAddress("g.ingaldi@curtopropiedades.com");
				$oMailer->AddAddress("m.baldi@curtopropiedades.com");*/

				if($_FILES['file_cv']['name'] != '') {
					$oMailer->AddAttachment($_FILES['file_cv']['tmp_name'],$_FILES['file_cv']['name'], 'base64',$_FILES['file_cv']['type']);
				}

				if(!$oMailer->Send()) {
				   $sMsgText = 'error';
				   exit;
				} else {
					$sMsgText = 'success';
				}
							
			} catch (phpmailerException $e) {
			   $sMsgText .= $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
			    $sMsgText .= $e->getMessage(); //Boring error messages from anything else!
			}

			$sMsgText;

		}

	}

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Sumate a nuestro equipo | Curto Propiedades</title>

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

		<section id="rrhh">

			<div class="section-header"></div>

			<div class="container">
				<div class="pd-v-xlg">
					<h1 class="title-lg text-center mg-lg-b color-1">Sumate a nuestro equipo</h1>
					<p class="text-center color-1 font-2 large no-mg">Si está interesado en formar parte de nuestro equipo de trabajo, <br>complete el formulario que se despliega a continuación. <br>Será analizado por nuestra área de Recursos Humanos <br>y nos contactaremos con usted.</p>
				</div>
			</div>
			
			<div class="bg bg-c6 pd-v-lg">
				<div class="container">
					<h2 class="mg-t mg-b title-sm color-1">Datos Personales:</h2>
					<form id="form-rrhh" action="rrhh" method="POST" enctype="multipart/form-data" data-toggle="validator">
						<input type="hidden" name="mode" value="process">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" name="nombre" class="form-control" placeholder="Nombre *" required>
								</div>
								<div class="form-group">
									<input type="text" name="apellido" class="form-control" placeholder="Apellido *" required>
								</div>
								<div class="form-group">
									<input type="text" name="mail" class="form-control" placeholder="Correo electrónico *" required>
								</div>
								<div class="form-group">
									<input type="text" name="dni" class="form-control" placeholder="DNI *" required>
								</div>
								<div class="form-group">
									<input type="text" name="fecha_nac" class="form-control" placeholder="Fecha de nacimiento *" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" name="tel" class="form-control" placeholder="Teléfono fijo *" required>
								</div>
								<div class="form-group">
									<input type="text" name="cel" class="form-control" placeholder="Celular *" required>
								</div>
								<div class="form-group">
									<input type="text" name="direccion" class="form-control" placeholder="Dirección *" required>
								</div>
								<div class="form-group">
									<input type="text" name="localidad" class="form-control" placeholder="Localidad, Ciudad *" required>
								</div>
								<div class="form-group">
									<input type="text" name="cp" class="form-control" placeholder="Código postal *" required>
								</div>
								<div class="form-group">
									<select name="provincia" class="form-control" required>
										<option value="">Provincia</option>
										<option value="CABA">CABA</option>
										<option value="Buenos Aires">Buenos Aires</option>
										<option value="Buenos Aires Norte">Buenos Aires Norte</option>
										<option value="Buenos Aires Oeste">Buenos Aires Oeste</option>
										<option value="Buenos Aires Sur">Buenos Aires Sur</option>
										<option value="Catamarca">Catamarca</option>
										<option value="Chaco">Chaco</option>
										<option value="Chubut">Chubut</option>
										<option value="Cordoba">Cordoba</option>
										<option value="Corrientes">Corrientes</option>
										<option value="Entre Rios">Entre Rios</option>
										<option value="Formosa">Formosa</option>
										<option value="Jujuy">Jujuy</option>
										<option value="La Pampa">La Pampa</option>
										<option value="La Rioja">La Rioja</option>
										<option value="Mendoza">Mendoza</option>
										<option value="Misiones">Misiones</option>
										<option value="Neuquen">Neuquen</option>
										<option value="Rio Negro">Rio Negro</option>
										<option value="Salta">Salta</option>
										<option value="San Juan">San Juan</option>
										<option value="San Luis">San Luis</option>
										<option value="Santa Cruz">Santa Cruz</option>
										<option value="Santa Fe">Santa Fe</option>
										<option value="Santiago del Estero">Santiago del Estero</option>
										<option value="Tierra del Fuego">Tierra del Fuego</option>
										<option value="Tucuman">Tucuman</option>
										<option value="Otro">Otro</option>
									</select>
								</div>
							</div>
						</div>
						<h2 class="mg-lg-t mg-b title-sm color-1">Educación y Experiencia:</h2>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<select name="formacion_academica" class="form-control" required>
										<option value="">Formación Académica training</option>
										<option value="Posgrado">Posgrado</option>
										<option value="Universitario Completo">Universitario Completo</option>
										<option value="Universitario Incompleto">Universitario Incompleto</option>
										<option value="Terciario Completo">Terciario Completo</option>
										<option value="Terciario Incompleto">Terciario Incompleto</option>
										<option value="Secundario Completo">Secundario Completo</option>
										<option value="Secundario Incompleto">Secundario Incompleto</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" name="titulo" class="form-control" placeholder="Título Obtenido">
								</div>
							</div>
						</div>
						<h2 class="mg-lg-t mg-b title-sm color-1">Adjúntenos su Curriculum:</h2>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="file">
										<input type="file" id="file-to-upload" name="file_cv" required/>
										<span class="file-custom" data-content="Seleccionar archivo .pdf o .doc (máx. 2mb)"></span>
									</label>          
								</div>
							</div>
						</div>
						<hr class="mg-lg-t mg-lg-b">
						<div class="row">
							<div class="col-sm-6">
								<p class="form-response font-1 color-1 mg-t"></p>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-6">
										<button type="submit" class="btn btn-primary full mg-b"><?php echo $t['gui']['4']; ?></button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="container">
				<div class="pd-v-xlg">
					<p class="text-center color-3 larger">
						<?php echo $t['srv']['11']; ?>
					</p>
				</div>
			</div>
			
		</section>
		
	</div>

	<?php include('inc/footer.php'); ?>

	<script type="text/javascript">

		$(function(){

			<?php if($sMsgText=='success') { ?>
			swal('Postulación exitosa','Su postulación fue enviada con éxito. Nos contactaremos con usted.');
			<?php } ?>

			$('#nav-main a.servicios').addClass('active');

			$('#file-to-upload').change(function(){
				$('.file-custom').attr('data-content',$('#file-to-upload').val());
			});

			$('#file-to-upload').change(function(){
				var vFilesize = (this.files[0].size/1024/1024).toFixed(0);
				if (vFilesize>2) {
					swal('Atención','El archivo que intenta subir supera el tamaño máximo de 2MB','error');
					$(this).val('');
					$('.file-custom').attr('data-content','Seleccionar archivo .pdf o .doc (máx. 2mb)');
				} else {
					$('.file-custom').attr('data-content',$('#file-to-upload').val());
				}
			});

			/*$('#form-rrhh').validator().on('submit',function(e){
				var form = $(this);
				if (!e.isDefaultPrevented()) {
					$.ajax({
						data: form.serialize(),
						url: "process/rrhh.php"
					}).done(function(data) {
						console.log(data);
						if (data=='success') {
							$('#form-rrhh')[0].reset();
							$('#file-to-upload').val('');
							$('.file-custom').attr('data-content','Seleccionar archivo .pdf o .doc (máx. 2mb)');
							form.find('.form-response').html('<i class="fa fa-exclamation fa-fw"></i> Postulación enviada con éxito.');
						} else {
							form.find('.form-response').html(data);
						}
					}
					);
				}
				return false;
			});*/

		});

	</script>

</body>
</html>