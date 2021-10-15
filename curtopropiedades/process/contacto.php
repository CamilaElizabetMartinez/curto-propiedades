<?php

$permit = '';

$pathRoot = '../';

require_once($pathRoot . 'inc/common.php');

require_once($pathRoot . 'lib/mailer/class.phpmailer.php');

require_once($pathRoot . 'lib/mailer/class.smtp.php');

$subject = 'Curto Propiedades: Recibiste un mensaje de contacto desde la web';

$contenido = file_get_contents($pathRoot . 'resp/contacto.html');

if ($_POST['nombre_completo']=='' &&  $_POST['email']=='' && $_POST['telefono']=='' && $_POST['pais']=='' && $_POST['mensaje']) {
   echo('Datos requeridos incompletos.');
   exit;
}

try {

    $contenido = str_replace(
        array(
			'[[nombre_completo]]',
			'[[email]]',
			'[[telefono]]',
			'[[pais]]',
			'[[mensaje]]'
		),
        array(
			$_POST['nombre_completo'],
			$_POST['email'],
			$_POST['telefono'],
			$_POST['pais'],
			$_POST['mensaje']
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

	/*$oMailer->Username = "fabricalamarisa@gmail.com";
	$oMailer->Password = "curto2017..";*/

	$oMailer->Username = "curtopropiedades.smtp@gmail.com";
	$oMailer->Password = "curto2017..";

	$oMailer->SetFrom($_POST['email'], $_POST['nombre_completo']);
	$oMailer->Subject = $subject;
	$oMailer->Body = $contenido;
	$oMailer->AddAddress("nndesarrollo@gmail.com");
	$oMailer->AddAddress("administracion@curtopropiedades.com");

	$oMailer->AddAddress("m.curto@ladrilloslamarisa.com");
	$oMailer->AddAddress("g.curto@ladrilloslamarisa.com");
	$oMailer->AddAddress("g.ingaldi@curtopropiedades.com");
	$oMailer->AddAddress("m.baldi@curtopropiedades.com");

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