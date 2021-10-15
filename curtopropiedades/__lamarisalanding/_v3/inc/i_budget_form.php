<div class="budget-form">
	<div class="container">
		<a href="#" class="budget-form-close">
			<i class="fal fa-times fa-fw fa-2x"></i>
		</a>
		<h2 class="txt-8 font-1 color-w mb-3">PEDÍ PRESUPUESTO</h2>
		<p class="txt-4 font-1 color-w mb-5">Comunicate con nosotros, dejanos tu mensaje.</p>
		<form id="formBudget" action="#" method="POST" data-toggle="validator">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<input type="text" name="nombre_completo" class="form-control form-control-lg" placeholder="NOMBRE Y APELLIDO *" required>
					</div>
					<div class="form-group">
						<input type="text" name="telefono" class="form-control form-control-lg" placeholder="TELÉFONO *" required>
					</div>
					<div class="form-group">
						<input type="text" name="email" class="form-control form-control-lg" placeholder="E-MAIL *" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<textarea name="mensaje" class="form-control form-control-lg" placeholder="MENSAJE" style="height: 112px;"></textarea>
					</div>
					<button type="submit" class="btn btn-secondary w-100" style="height: 48px;">ENVIAR</button>
					<p id="formBudgetResponse" class="color-w mt-4 position-absolute"><!--<i class="fal fa-times fa-fw"></i> Datos requeridos incompletos.--></p>
				</div>
			</div>
		</form>
	</div>
</div>