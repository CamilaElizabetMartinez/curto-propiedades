<footer class="pd-v-xlg">
	
	<a href="https://web.whatsapp.com/send?phone=+5491162964168" class="fab-whatsapp visible-md visible-lg" target="_blank">
		<i class="fa fa-whatsapp"></i>
	</a>

	<a href="https://api.whatsapp.com/send?phone=+5491162964168" class="fab-whatsapp visible-xs" target="_blank">
		<i class="fa fa-whatsapp"></i>
	</a>	

	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-5">
				<a href="index.php" class="logo pull-left"></a>
				<p><?php echo $t['ftr']['1']; ?></p>
				<div class="clearfix"></div>
				<p class="mg-t mg-lg-b-xs">
					Vicente López 515 - Piso 2 - Of. 1 y 4 <br/>
					Monte Grande - Prov. Buenos Aires - Argentina<br/>
					Tel. <a href="tel:52639039">5263-9039</a> - <a href="tel:+5491162964168">(+54 9 11) 6296-4168</a><br/> 
					<a href="mailto:alquileres@curtopropiedades.com">alquileres@curtopropiedades.com</a> - <a href="mailto:ventas@curtopropiedades.com">ventas@curtopropiedades.com</a>
				</p>
			</div>
			<div class="col-sm-6 col-md-3">
				<ul class="social text-center mg-b-xs">
					<li><a href="https://www.instagram.com/curtopropiedades/" target="_blank"><i class="fa fa-instagram fa-fw"></i></a></li>
					<li><a href="http://www.facebook.com/0curtopropiedades0/" target="_blank"><i class="fa fa-facebook fa-fw"></i></a></li>
					<li><a href="mailto:ventas@curtopropiedades.com"><i class="fa fa-envelope fa-fw"></i></a></li>
				</ul>
			</div>
			<div class="col-sm-6 col-md-4">
				<p class="mg-lg-b"><?php echo $t['ftr']['2']; ?></p>
				<form id="formSignupFooter" action="#" method="POST" data-toggle="validator">
					<input type="hidden" name="cliente_suscrip" value="1">
					<div class="form-group">
						<input type="text" name="cliente_name" class="form-control" placeholder="<?php echo $t['cnt']['2']; ?>" required/>
					</div>
					<div class="form-group">
						<input type="email" name="cliente_user" class="form-control" placeholder="<?php echo $t['cnt']['3']; ?>" required/>
					</div>
					<button type="submit" class="btn btn-color2 full"><?php echo $t['gui']['4']; ?></button>
					<p id="formSignupFooterResponse" class="font-1 color-w mg-t"></p>
				</form>
			</div>
		</div>
		<hr class="mg-lg-b mg-lg-t">
		<p class="no-mg small">Diseño y desarrollo web: <a href="http://www.alonauta.com" target="_blank">www.alonauta.com</a></p>
	</div>
</footer>

<?php include($pathRoot.'inc/modals.php'); ?>

<script src="assets/js/printThis.js"></script>

<script src="assets/js/bootstrap.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88343813-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-88343813-1');
</script>

<script type="text/javascript">
	
	$(function(){

		<?php if ($lang!='') { ?>
		$('header a.<?php echo $lang; ?>').addClass('active');
		<?php } ?>

		$(window).scroll(function(){
			var value = $(this).scrollTop();
			if ($(window).width()>1100) {
				if (value>1) {
					$('body').addClass('header-small');
				} else {
					$('body').removeClass('header-small');
				}
			} else {
				$('body').addClass('header-small');
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

		$('.add-fav').click(function(){
			var button = $(this);
			var propiedad_id = button.data('propiedad-id');
			$.ajax({
				url: "process/add_fav.php?cliente_id=<?php echo $_SESSION['cliente_id']; ?>&propiedad_id="+propiedad_id
				}).done(function(data) {
					console.log(data)
					$('#modal-favorito').modal('show');
				}
			);
			return false;
		});

		$('.popup-image').swipebox( {
			useCSS : true, // false will force the use of jQuery for animations
			useSVG : true, // false to force the use of png for buttons
			initialIndexOnArray : 0, // which image index to init when a array is passed
			hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
			removeBarsOnMobile : true, // false will show top bar on mobile devices
			hideBarsDelay : 3000, // delay before hiding bars on desktop
			videoMaxWidth : 1140, // videos max width
		});

		$('#formSignupFooter').validator('destroy').validator();

		$('#formSignupFooter').submit(function(e){
			if (e.isDefaultPrevented()) {
				$('#formSignupFooterResponse').html('<i class="fa fa-times fa-fw"></i> Datos requeridos incompletos.');    
			} else {
				$.ajax({
					type: "POST",
					url: 'process/add_cliente.php',
					data: $(this).serialize(),
					success: function(response){
						switch (response) {
							case 'success':
								$('#formSignupFooter').trigger('reset');
								$('#formSignupFooterResponse').html('<i class="fa fa-check fa-fw"></i> Suscripción exitosa!');
								break;
							case 'error':
								$('#formSignupFooterResponse').html('<i class="fa fa-times fa-fw"></i> Existen errores en la transacción.');
								break;
						}
					}
				});
			}
			return false;
		});

	});

</script>