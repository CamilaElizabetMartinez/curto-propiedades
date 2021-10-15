<?php
	
error_reporting (E_ALL ^ E_NOTICE);

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

if ($_SESSION['user']=='' and $permit=='admin') {

	header('Location:index.php');

}

?>