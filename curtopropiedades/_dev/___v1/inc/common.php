<?php
	
error_reporting (E_ALL ^ E_NOTICE);
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

header("Content-Type: text/html; charset=utf-8");

date_default_timezone_set('America/Buenos_Aires');

setlocale(LC_TIME, 'es_ES');

require_once($pathRoot . 'config/config.php');

require_once($pathRoot . 'lib/log.php');
require_once($pathRoot . 'lib/db.php');
require_once($pathRoot . 'lib/crud.php');
require_once($pathRoot . 'lib/functions.php');
require_once($pathRoot . 'lib/custom.php');

$dbh = new db();

session_start();

if (isset($_SESSION['cliente_id'])) {
	if ($_SESSION['cliente_id']=='' and $permit=='cliente_favoritos') {
		header('Location:'. $_SERVER['PHP_SELF'] .'/home');
	}
}

if (isset($_POST['mode']) and $_POST['mode']=='login') {

	$email = $_POST['cliente_user'];
	$password = $_POST['cliente_password'];

	if(isset($_POST) && $email!='' && $password!='') {

		$ret = $dbh->query('select * from clientes where cliente_user="'. $email .'"');

		$p = $ret[0]['cliente_password'];
		$id = $ret[0]['id'];

		if ($p==$password) {
			$_SESSION['cliente_id'] = $id;
			$_SESSION['cliente_user'] = $email;
			//header("Location: mis-propiedades");
		} else {
			$ret = '<i class="fa fa-times fa-fw"></i> Usuario o contraseña incorrectos';
		}

	}

}

if (isset($_POST['mode']) and $_POST['mode']=='signup') {

	$email = $_POST['cliente_user'];
	$password = $_POST['cliente_password'];

}


// Tokko Brokkers

require_once ($pathRoot . 'api/api.inc');

$auth = new TokkoAuth('4fbfb1318c148749d76fa87803fcb5ed83620e7f');

?>