<header>
	<nav class="navbar">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-main" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="propiedad_list.php">Curto Propiedades: Administrador</a>
			</div>
			<div class="collapse navbar-collapse" id="nav-main">
				<ul class="nav navbar-nav navbar-right">
					<li><a class="propiedades" href="propiedad_list.php" title="Listado de propiedades">Propiedades</a></li>
					<li><a class="desarrollos" href="desarrollo_list.php" title="Listado de desarrollos">Desarrollos</a></li>
					<li><a class="clientes" href="cliente_list.php" title="Listado de suscriptores">Suscriptores</a></li>
					<!--<li><a href="parameters.php"><i class="glyph-icon flaticon-settings-cogwheel-button"></i></a></li>-->
					<li><a href="logout.php" title="Desconectarme"><i class="glyph-icon flaticon-exit-to-app-button"></i></a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>

<script type="text/javascript">

	$(function(){
		$.initBeautifulAlert();
	});

</script>