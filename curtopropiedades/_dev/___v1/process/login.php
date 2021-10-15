<?php

$permit = '';

$pathRoot = '../';

require_once($pathRoot . 'inc/common.php');

$email = $_POST['cliente_user'];
$password = $_POST['cliente_password'];

if(isset($_POST) && $email!='' && $password!='') {
	
	$ret = $dbh->query("select * from clientes where cliente_user=:cliente_user and activo='S'", array("cliente_user"=>$email));

	$p = $ret[0]['cliente_password'];
	$id = $ret[0]['id'];

	if ($p==$password) {
		$_SESSION['cliente_id'] = $id;
		$_SESSION['cliente_user'] = $email;
		echo '1';
	} else {
		echo '0';
	}

}


?>
