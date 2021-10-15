<?php

$permit = '';

$pathRoot = '../';

require_once($pathRoot . 'inc/common.php');
require_once($pathRoot . 'lib/mailer/class.phpmailer.php');
require_once($pathRoot . 'lib/mailer/class.smtp.php');

$subject = 'Curto Propiedades: Recibiste una postulacion';

$contenido = file_get_contents($pathRoot . 'resp/rrhh.html');

/*if ($_REQUEST['nombre']=='' &&  $_REQUEST['mail']=='' && $_REQUEST['tel']=='') {
   echo('Datos requeridos incompletos.');
   exit;
}*/

echo 'file: '. $_FILES['file_cv']['name'];
exit;

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
			'[titulo]',
			'[area]'
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
			$_REQUEST['titulo'],
			$_REQUEST['area']
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

	/*$oMailer->Username = "nndesarrollo@gmail.com";
	$oMailer->Password = "e1f3id4e1f3id4..";*/

	$oMailer->SetFrom($_REQUEST['mail'], $_REQUEST['nombre']);
	$oMailer->Subject = $subject;
	$oMailer->Body = $contenido;

	$oMailer->AddAddress("nsotlar@gmail.com");

	/*$oMailer->AddAddress("nndesarrollo@gmail.com");
	$oMailer->AddAddress("administracion@curtopropiedades.com");

	$oMailer->AddAddress("m.curto@ladrilloslamarisa.com");
	$oMailer->AddAddress("g.curto@ladrilloslamarisa.com");
	$oMailer->AddAddress("g.ingaldi@curtopropiedades.com");
	$oMailer->AddAddress("m.baldi@curtopropiedades.com");*/

	if($_FILES['file_cv']['name'] != '') {

		/*$fileArchivoNombre = $_FILES['file_cv']['name'];
		$fileArchivoFile = $_FILES['file_cv']['tmp_name'];

		$oMailer->AddAttachment($fileArchivoFile, $fileArchivoNombre);*/

		$oMailer->AddAttachment($_FILES['file_cv']['tmp_name'],$_FILES['file_cv']['name'], 'base64',$_FILES['file_cv']['type']);

	}

	if(!$oMailer->Send()) {
	   echo('error');
	   exit;
	} else {
		echo('success');
	}
				
} catch (phpmailerException $e) {
   $sMsgText .= $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
    $sMsgText .= $e->getMessage(); //Boring error messages from anything else!
}

echo $sMsgText;

?>