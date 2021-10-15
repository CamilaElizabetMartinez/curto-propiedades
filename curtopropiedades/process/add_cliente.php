<?php

$permit = '';

$pathRoot = '../';

require_once($pathRoot . 'inc/common.php');

$cliente_name = $_REQUEST['cliente_name'];
$cliente_user = $_REQUEST['cliente_user'];
$cliente_password = $_REQUEST['cliente_password'];

if (!isset($_REQUEST['cliente_suscrip'])) {
	$cliente_suscrip = 'N';
} else {
	switch ($_REQUEST['cliente_suscrip']) {
		case '0':
			$cliente_suscrip = 'N';
			break;
		case '1':
			$cliente_suscrip = 'S';
			break;
	}
}

//usuario existente:
$ret = $dbh->query("select * from clientes where cliente_user=:cliente_user", array("cliente_user"=>$cliente_user));

if(count($ret)>0) {
	echo 'user-exists';die;
}

$ret = $dbh->query("
		insert into clientes (
			fecha_creado,
			activo,
			cliente_name, 
			cliente_user, 
			cliente_password, 
			cliente_suscrip
		) values (
			:fecha_creado,
			:activo,
			:cliente_name, 
			:cliente_user, 
			:cliente_password, 
			:cliente_suscrip
		)", array(
			"fecha_creado"=>date('Y-m-d H:i:s'),
			"activo"=>'S',
			"cliente_name"=>$cliente_name,
			"cliente_user"=>$cliente_user, 
			"cliente_password"=>$cliente_password, 
			"cliente_suscrip"=>$cliente_suscrip
		));

switch ($ret) {
	case '0':
		echo 'error';
		break;
	case '1':
		echo 'success';
		break;
}

?>
