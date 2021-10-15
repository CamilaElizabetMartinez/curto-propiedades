<?php

	$permit = '';

	$pathRoot = '../';

	require_once($pathRoot . 'inc/common.php');

	$data = array(
		'property' => $_REQUEST['prop_id'],
		'text' => $_REQUEST['mensaje'],
		'name' => $_REQUEST['nombre_completo'],
		'email' => $_REQUEST['email'],
		'cellphone' => $_REQUEST['telefono'],
		'phone' => $_REQUEST['telefono']);

	$webcontact = new TokkoWebContact($auth, $data);

	$webcontact->send();

	echo 'success';

?>