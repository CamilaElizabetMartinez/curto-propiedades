<?php

$permit = '';

$pathRoot = '../';

require_once($pathRoot . 'inc/common.php');

require_once($pathRoot . 'lib/mailer/class.phpmailer.php');

require_once($pathRoot . 'lib/mailer/class.smtp.php');

$subject = 'Recibiste una publicacion desde la web Curto Propiedades';

$contenido = file_get_contents($pathRoot . 'resp/compartir.html');

if ($_POST['nombre_completo']=='' &&  $_POST['email']=='' && $_POST['mensaje']) {
   echo('Datos requeridos incompletos.');
   exit;
}

try {

    $contenido = str_replace(
        array(
			'[[propiedad_titulo]]',
			'[[url]]',
			'[[nombre_completo]]',
			'[[email]]',
			'[[mensaje]]'
		),
        array(
        	$_POST['propiedad_titulo'],
			$static_url .'propiedad/'. $_POST['propiedad_id'] .'/'. $_POST['lang'],
			$_POST['nombre_completo'],
			$_POST['email'],
			$_POST['mensaje']
        ), 
        $contenido);
echo $contenido;die;
	$oMailer = new PHPMailer(); // create a new object
	$oMailer->IsSMTP(); // enable SMTP
	$oMailer->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$oMailer->SMTPAuth = true; // authentication enabled
	$oMailer->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$oMailer->Host = "smtp.gmail.com";
	$oMailer->Port = 465; // or 587
	$oMailer->IsHTML(true);

	/*$oMailer->Username = "fabricalamarisa@gmail.com";
	$oMailer->Password = "curto2017..";*/

	$oMailer->Username = "curtopropiedades.smtp@gmail.com";
	$oMailer->Password = "curto2017..";

	$oMailer->SetFrom("administracion@curtopropiedades.com", "Curto Propiedades");
	$oMailer->Subject = $subject;
	$oMailer->Body = $contenido;
	$oMailer->AddAddress($_POST['email']);

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