<footer class="pd-v-xlg">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-5">
				<a href="index.php" class="logo pull-left"></a>
				<p>Somos una organización con visión de futuro, especializada en la asesoría y producción de bienes inmuebles orientada al servicio integral, contando con un equipo comprometido con la filosofía del mejoramiento continuo, el trabajo en conjunto y una actitud de servicio de alta calidad.</p>
				<div class="clearfix"></div>
				<p class="mg-t mg-lg-b-xs">
					Vicente López 515 - Piso 2 - Oficinas 1 y 4 <br/>
					Monte Grande - Prov. Buenos Aires - Argentina<br/>
					Tel. <a href="tel:52639039">5263-9039</a> - <a href="tel:+5491162964168">(+54 9 11) 6296-4168</a><br/> 
					<a href="mailto:alquileres@curtopropiedades.com">alquileres@curtopropiedades.com</a> - <a href="mailto:ventas@curtopropiedades.com">ventas@curtopropiedades.com</a>
				</p>
			</div>
			<div class="col-sm-6 col-md-3">
				<ul class="social text-center mg-b-xs">
					<li><a href="#"><i class="fa fa-instagram fa-fw"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook fa-fw"></i></a></li>
					<li><a href="#"><i class="fa fa-envelope fa-fw"></i></a></li>
				</ul>
			</div>
			<div class="col-sm-6 col-md-4">
				<p class="mg-lg-b">Si desea mantenerse informado del mundo inmobiliaro, complete el formulario y recibirá nuestro newsletter.</p>
				<form action="https://curtopropiedades.us10.list-manage.com/subscribe/post?u=e94bf2ab6734bad7f992a66a7&amp;id=96a070572f" method="post">
					<div class="form-group">
						<input type="text" name="FNAME" id="mce-FNAME" class="form-control" placeholder="nombre"/>
					</div>
					<div class="form-group">
						<input type="email" name="EMAIL" id="mce-EMAIL" class="form-control" placeholder="e-mail"/>
					</div>
					<input type="submit" value="Enviar" name="subscribe" id="mc-embedded-subscribe" class="btn btn-color2 full">
				</form>
			</div>
		</div>
		<hr class="mg-lg-b mg-lg-t">
		<p class="no-mg small">Diseño y desarrollo web: <a href="http://www.alonauta.com">www.alonauta.com</a></p>
	</div>
</footer>

<?php include('inc/i_modals.php'); ?>

<script src="assets/js/bootstrap.min.js"></script>

<script type="text/javascript">
	
	$(function(){

		$(window).scroll(function(){
			var value = $(this).scrollTop();
			if ($(window).width()>1000) {
				if (value>1) {
					$('body').addClass('header-small');
				} else {
					$('body').removeClass('header-small');
				}
			}
		});
		$(window).scroll();

		$('.dropdown').on('show.bs.dropdown', function(e){
			$(this).find('.dropdown-toggle').addClass('active');
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
		});

		$('.dropdown').on('hide.bs.dropdown', function(e){
			$(this).find('.dropdown-toggle').removeClass('active');
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(150);
		});

	});

</script>