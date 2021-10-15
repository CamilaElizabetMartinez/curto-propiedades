<?php

$permit = '';

$pathRoot = '../';

require_once($pathRoot . 'inc/common.php');

require_once($pathRoot . 'lib/mailer/class.phpmailer.php');

require_once($pathRoot . 'lib/mailer/class.smtp.php');

/*------------------------------------------------------------------------------------*/

$cliente_user = $_REQUEST['cliente_user'];

$ret = $dbh->query("select * from clientes where cliente_user=:cliente_user", array("cliente_user"=>$cliente_user));

//print_r($ret);die;

$cliente_name = $ret[0]['cliente_name'];
$cliente_user = $ret[0]['cliente_user'];
$cliente_password = $ret[0]['cliente_password'];

/*------------------------------------------------------------------------------------*/

$subject = 'Curto Propiedades: Te enviamos tu password';

$contenido = file_get_contents($pathRoot . 'resp/recover_password.html');

try {

    $contenido = str_replace(
        array(
			'[[cliente_name]]',
			'[[cliente_user]]',
			'[[cliente_password]]'
		),
        array(
        	$cliente_name,
			$cliente_user,
			$cliente_password
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

	$oMailer->SetFrom("administracion@curtopropiedades.com", "Curto Propiedades");
	$oMailer->Subject = $subject;
	$oMailer->Body = $contenido;
	$oMailer->AddAddress($cliente_user, $cliente_name);

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