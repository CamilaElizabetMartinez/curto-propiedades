<?php

error_reporting (E_ALL ^ E_NOTICE);

$pathRoot = '../';

//echo hash('sha256', 'curto2017..'.'curto.curto.curto.'.'s*vl%/?s8b*b4}b/w%w4'); 

session_start();

if ($_SESSION['user']!='') {
	header('Location: home.php');
}

include($pathRoot. 'config/config.php');

require_once($pathRoot . 'lib/log.php');
require_once($pathRoot . 'lib/db.php');
require_once($pathRoot . 'lib/crud.php');
require_once($pathRoot . 'lib/functions.php');
require_once($pathRoot . 'lib/custom.php');

$dbh = new db();

$email = $_POST['mail'];
$password = $_POST['pass'];

if(isset($_POST) && $email!='' && $password!='') {

	$ret = $dbh->query('select * from sys_users where username="'. $email .'"');

	$p = $ret[0]['password'];
	$psalt = $ret[0]['psalt'];
	$id = $ret[0]['id'];

	$site_salt = 'curto.curto.curto.';

	$salted_hash = hash('sha256', $password.$site_salt.$psalt);

	if ($p==$salted_hash) {
		$_SESSION['user'] = $id;
		header('Location: planes_list.php');die;
	} else {
		$ret = '<i class="fa fa-times fa-fw"></i> Usuario o contraseña incorrectos';
	}
}

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Ingreso | Admin</title>
    <?php include('inc/head.php'); ?>
</head>
<body class="body-login">

  <div class="wrapper">

  	<section id="login">
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
  					
  					<h1 class="title-lg font-1 color-w text-center mg-lg-b">
  						<i class="fa flaticon-round-account-button-with-user-inside fa-fw fa-3x mg-b"></i><br>
  						Administrador
  					</h1>

	  				<form method="POST" action="index.php" enctype="application/x-www-form-urlencoded">
	  					<div class="form-group">
	  						<label for="mail" class="label-control color-w mg-b">Usuario</label>
	  						<input type="text" name="mail" class="form-control" placeholder="Usuario" autocomplete="off" />
	  					</div>
	  					<div class="form-group">
	  						<label for="pass" class="label-control color-w mg-b">Contraseña</label>
	  						<input type="password" name="pass" class="form-control" placeholder="Contraseña" autocomplete="off" />
	  					</div>
	  					<button type="submit" class="btn btn-primary full mg-t">Ingresar</button>
	  					<?php if ($ret!='') { ?>
	  					<p class="color-w mg-lg-t"><?php echo $ret; ?></p>
	  					<?php } ?>
	  				</form>

  				</div>
  			</div>
  		</div>
  	</section>
    
  </div>

</body>
</html>
