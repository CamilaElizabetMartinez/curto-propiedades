<?php

//echo $_SESSION['client_id'];die;

?>

<header>

	<div class="header-top">
		<div class="container">
			
			<?php if ($_SESSION['cliente_id']=='') { ?>
			<a href="#" class="btn-login btn btn-ghost4 small pull-right" data-toggle="modal" data-target="#modal-login"><?php echo $t['hdr']['6']; ?></a>
			<?php } else { ?>
			<div class="btn-user dropdown pull-right">
				<button class="btn btn-ghost4 small dropdown-toggle" type="button" id="drop2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['cliente_user']; ?>
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu" aria-labelledby="drop2">
					<li><a href="mis-propiedades/<?php echo $lang; ?>"><?php echo $t['hdr']['7']; ?></a></li>
					<li><a href="logout"><?php echo $t['hdr']['8']; ?></a></li>
				</ul>
			</div>
			<?php } ?>

			<ul class="nav-lang pull-right">
				<li><a class="es" href="<?php echo $url; ?>/es">Es</a></li>
				<li><a class="en" href="<?php echo $url; ?>/en">En</a></li>
				<li><a class="pt" href="<?php echo $url; ?>/pt">Pt</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>

	<nav class="navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-main" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home/<?php echo $lang; ?>">
					<span class="logo"></span>
					<span class="logo-small"></span>
				</a>
			</div>
			<div class="collapse navbar-collapse" id="nav-main">
				<ul class="nav navbar-nav navbar-right">				
					<li class="dropdown show-mobile">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Español <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a class="es" href="<?php echo $url; ?>/es">Es</a></li>
							<li><a class="en" href="<?php echo $url; ?>/en">En</a></li>
							<li><a class="pt" href="<?php echo $url; ?>/pt">Pt</a></li>
						</ul>
					</li>
					<li><a href="quienes-somos/<?php echo $lang; ?>" class="quienes-somos"><?php echo $t['hdr']['1']; ?></a></li>
					<li><a href="buscar-propiedades/<?php echo $lang; ?>" class="propiedades"><?php echo $t['hdr']['2']; ?></a></li>
					<li><a href="desarrollos/<?php echo $lang; ?>/pagina/1" class="desarrollos"><?php echo $t['hdr']['3']; ?></a></li>
					<li><a href="servicios/<?php echo $lang; ?>" class="servicios"><?php echo $t['hdr']['4']; ?></a></li>
					<?php if ($lang=='es') { ?>
					<li><a href="rrhh/<?php echo $lang; ?>">Trabaje con nosotros</a></li>
					<?php } ?>
					<li><a href="agro/<?php echo $lang; ?>" class="agro"><?php echo $t['hdr']['9']; ?></a></li>
					<li><a href="#" data-toggle="modal" data-target="#modal-contacto"><?php echo $t['hdr']['5']; ?></a></li>
					<?php if ($_SESSION['cliente_id']=='') { ?>
					<li class="show-mobile"><a href="#" class="font-5" data-toggle="modal" data-target="#modal-login"><?php echo $t['hdr']['6']; ?></a></li>
					<?php } else { ?>
					<li class="dropdown show-mobile">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user fa-fw"></i>&nbsp;<?php echo $_SESSION['cliente_user']; ?> <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="mis-propiedades/<?php echo $lang; ?>"><?php echo $t['hdr']['7']; ?></a></li>
							<li><a href="logout"><?php echo $t['hdr']['8']; ?></a></li>
						</ul>
					</li>
					<?php } ?>	
				</ul>
			</div>
		</div>
	</nav>

</header>