<section id="modal-login" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
        <h4 class="modal-title title-md"><?php echo $t['lgn']['1']; ?></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
            <form id="formLogin" action="#" method="POST" enctype="multipart/form-data" data-toggle="validator">
              <input type="hidden" name="mode" value="login">
              <div class="fh1">
                <div class="form-group">
                  <input name="cliente_user" type="email" class="form-control" placeholder="<?php echo $t['lgn']['2']; ?>" required />
                </div>
                <div class="form-group">
                  <input name="cliente_password" type="password" class="form-control" placeholder="<?php echo $t['lgn']['3']; ?>" autocomplete="off" required />
                </div>
                <p id="formLoginResponse" class="color-1 mg-t font-1"></p>
              </div>
              <button type="submit" class="btn btn-primary full mg-b"><?php echo $t['lgn']['4']; ?></button>
              <a href="#" class="forgot-password link" data-toggle="modal" data-target="#modal-forgot-password" data-dismiss="modal"><?php echo $t['lgn']['5']; ?></a>
            </form>
          </div>
          <div class="col-sm-6">
            <div class="fh1">
              <h4 class="title-sm font-1 color-4 text-center mg-lg-b mg-lg-t-xs-xs"><?php echo $t['lgn']['6']; ?></h4>
              <p class="text-center mg-lg-b font-2"><?php echo $t['lgn']['7']; ?></p>
            </div>
            <a href="#" class="btn btn-secondary full mg-b" data-dismiss="modal" data-toggle="modal" data-target="#modal-signup"><?php echo $t['lgn']['8']; ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="modal-contacto" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
        <h4 class="modal-title title-md"><?php echo $t['cnt']['1']; ?></h4>
      </div>
      <div class="modal-body">
        <form id="formContacto" action="#" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="mode" value="contacto">
          <div class="fh1">
              <div class="form-group">
                <input type="text" name="nombre_completo" class="form-control" placeholder="<?php echo $t['cnt']['2']; ?>"  required />
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="<?php echo $t['cnt']['3']; ?>"  required />
              </div>
              <div class="form-group">
                <input type="text" name="telefono" class="form-control" placeholder="<?php echo $t['cnt']['4']; ?>" required/>
              </div>
              <div class="form-group">
                <input type="text" name="pais" class="form-control" placeholder="<?php echo $t['cnt']['5']; ?>"  required />
              </div>
              <div class="form-group">
                <textarea rows="5" name="mensaje" class="form-control" placeholder="<?php echo $t['cnt']['6']; ?>" required ></textarea>
              </div>
              <button type="submit" class="btn btn-primary full mg-b"><?php echo $t['gui']['4']; ?></button>
              <p id="formContactoResponse" class="font-1 color-1 mg-t"></p>
              <hr class="mg-t mg-b">
              <p class="small font-2"><?php echo $t['cnt']['7']; ?></p>
            </div>
          </form>
      </div>
    </div>
  </div>
</section>

<section id="modal-signup" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
        <h4 class="modal-title title-md"><?php echo $t['sgn']['1']; ?></h4>
      </div>
      <div class="modal-body">
        <form id="formSignup" action="#" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="mode" value="signup">
          <div class="fh1">
              <div class="form-group">
                <input name="cliente_name" type="text" class="form-control" placeholder="<?php echo $t['sgn']['2']; ?>" required/>
              </div>
              <div class="form-group">
                <input name="cliente_user" type="email" class="form-control" placeholder="<?php echo $t['sgn']['3']; ?>" required/>
              </div>
              <div class="form-group">
                <input name="cliente_password" type="password" class="form-control" placeholder="<?php echo $t['sgn']['4']; ?>" required autocomplete="off" />
              </div>
              <div class="form-group">
                <label class="show-password control checkbox">
                  <p class="small font-2"><?php echo $t['sgn']['5']; ?></p>
                  <input type="checkbox"/>
                  <span class="control-indicator"></span>
                </label>
                <br/>
                <label class="control checkbox">
                  <p class="small font-2"><?php echo $t['sgn']['6']; ?></p>
                  <input name="cliente_suscrip" type="checkbox" value="1" checked/>
                  <span class="control-indicator"></span>
                </label>
              </div>
              <button type="submit" class="btn btn-primary full mg-b"><?php echo $t['sgn']['1']; ?></button>
              <p id="formSignupResponse" class="font-1 color-1 mg-t"></p>
            </div>
          </form>
      </div>
    </div>
  </div>
</section>

<section id="modal-favorito" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
      </div>
      <div class="modal-body">
        <p class="font-1 color-1 text-center">
          <?php echo $t['mip']['1']; ?>
        </p>
      </div>
    </div>
  </div>
</section>

<section id="modal-forgot-password" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
        <h4 class="modal-title title-md"><?php echo $t['fgt']['1']; ?></h4>
      </div>
      <div class="modal-body">
        <p class="font-1 color-1">
          <?php echo $t['fgt']['2']; ?>
        </p>
        <form id="formForgotPassword" action="#" method="POST" enctype="multipart/form-data" data-toggle="validator">
          <input type="hidden" name="mode" value="forgot-password">
            <div class="fh1">
              <div class="form-group">
                <input name="cliente_user" type="email" class="form-control" placeholder="<?php echo $t['fgt']['3']; ?>" required />
              </div>
              <p id="formForgotPasswordResponse" class="color-1 mg-t font-1"></p>
            </div>
            <button type="submit" class="btn btn-primary pull-right mg-b"><?php echo $t['fgt']['4']; ?></button>
            <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</section>

<section id="modal-me-interesa" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
        <h4 class="modal-title title-md"><?php echo $t['lik']['1']; ?></h4>
      </div>
      <div class="modal-body">
        <form id="formMeInteresa" action="#" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="mode" value="me-interesa">
          <input type="hidden" name="profit_id" value="<?php echo $obj->profit_id; ?>">
          <input type="hidden" name="propiedad_descripcion" value="<?php echo $obj->titulo_es; ?>">
          <h2 class="title-md color-1 mg-sm-b"><?php echo $obj->titulo_es; ?></h2>
          <p class="mg-lg-b"><?php echo $t['lik']['1']; ?></p>
          <div class="fh1">
              <div class="form-group">
                <input type="text" name="nombre_completo" class="form-control" placeholder="<?php echo $t['cnt']['2']; ?>"  required />
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="<?php echo $t['cnt']['3']; ?>"  required />
              </div>
              <div class="form-group">
                <input type="text" name="telefono" class="form-control" placeholder="<?php echo $t['cnt']['4']; ?>" required/>
              </div>
              <div class="form-group">
                <textarea rows="5" name="mensaje" class="form-control" placeholder="<?php echo $t['cnt']['6']; ?>" required ><?php echo $t['lik']['3']; ?></textarea>
              </div>
              <button type="submit" class="btn btn-primary full mg-b"><?php echo $t['lik']['4']; ?></button>
              <p id="formMeInteresaResponse" class="font-1 color-1 mg-t"></p>
              <hr class="mg-t mg-b">
              <p class="small font-2"><?php echo $t['lik']['5']; ?></p>
            </div>
          </form>
      </div>
    </div>
  </div>
</section>

<section id="modal-compartir" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
        <h4 class="modal-title title-md"><?php echo $t['shr']['1']; ?></h4>
      </div>
      <div class="modal-body">
        <form id="formCompartir" action="#" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="mode" value="compartir">
          <input type="hidden" class="propiedad-id" name="propiedad_id" value="">
          <input type="hidden" class="propiedad-titulo" name="propiedad_titulo" value="">
          <input type="hidden" name="lang" value="<?php echo $lang; ?>">
          <h2 class="compartir-titulo title-md color-1 mg-sm-b"></h2>
          <p class="mg-lg-b"><?php echo $t['shr']['2']; ?></p>
          <div class="fh1">
              <div class="form-group">
                <input type="text" name="nombre_completo" class="form-control" placeholder="<?php echo $t['shr']['3']; ?>"  required />
              </div>
              <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="<?php echo $t['shr']['4']; ?>"  required />
              </div>
              <div class="form-group">
                <textarea rows="5" name="mensaje" class="form-control" placeholder="<?php echo $t['shr']['5']; ?>" required ></textarea>
              </div>
              <button type="submit" class="btn btn-primary full mg-b"><?php echo $t['shr']['6']; ?></button>
              <p id="formCompartirResponse" class="font-1 color-1 mg-t"></p>
              <hr class="mg-t mg-b">
            </div>
          </form>
      </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  
  $(function(){

    $('#modal-login').on('show.bs.modal',function(){
      $('#formLoginPassword').trigger('reset');
      $('#formLoginPasswordResponse').html('');
    });
    $('#modal-login').on('shown.bs.modal',function(){
      $('#formLogin').validator('destroy').validator();

      $('#formLogin').submit(function(e){
        if (e.isDefaultPrevented()) {
          $('#formLoginResponse').html('<i class="fa fa-times fa-fw"></i> Datos requeridos incompletos.');          
        } else {
          $.ajax({
            type: "POST",
            url: 'process/login.php',
            data: $(this).serialize(),
            success: function(response){
              switch(response) {
                case '0':
                  $('#formLoginResponse').html('<i class="fa fa-times fa-fw"></i> Usuario o contraseña incorrectos');
                  break;
                case '1':
                  $('#formLogin').trigger('reset');
                  $('#formLoginResponse').html('<i class="fa fa-check fa-fw"></i> Login exitoso!');
                  location.reload();
                  break;
              }
            }
          });
        }
        return false;
      });
    
    });

    $('#modal-contacto').on('show.bs.modal',function(){
      $('#formContactoPassword').trigger('reset');
      $('#formContactoPasswordResponse').html('');
    });
    $('#modal-contacto').on('shown.bs.modal',function(){
      $('#formContacto').validator('destroy').validator();

      $('#formContacto').validator().submit(function(e){
        if (e.isDefaultPrevented()) {
          $('#formContactoResponse').html('<i class="fa fa-times fa-fw"></i> Datos requeridos incompletos.');    
        } else {
          $.ajax({
            type: "POST",
            url: 'process/contacto.php',
            data: $(this).serialize(),
            success: function(response){
              console.log(response);
              switch (response) {
                case 'success':
                  $('#formContacto').trigger('reset');
                  $('#formContactoResponse').html('<i class="fa fa-check fa-fw"></i> Mensaje enviado con éxito!');
                  break;
                case 'error':
                  $('#formContactoResponse').html('<i class="fa fa-times fa-fw"></i> Existen errores en la transacción.');
                  break;
                default:
                  $('#formContactoResponse').html('<i class="fa fa-times fa-fw"></i> '+response);
                  break;
              }
            }
          });
        }
        return false;
      });

    });

    $('#modal-signup').on('show.bs.modal',function(){
      $('#formSignupPassword').trigger('reset');
      $('#formSignupPasswordResponse').html('');
    });
    $('#modal-signup').on('shown.bs.modal',function(){
      $('#formSignup').validator('destroy').validator();

      $('#formSignup').submit(function(e){
        if (e.isDefaultPrevented()) {
          $('#formSignupResponse').html('<i class="fa fa-times fa-fw"></i> Datos requeridos incompletos.');    
        } else {
          $.ajax({
            type: "POST",
            url: 'process/add_cliente.php',
            data: $(this).serialize(),
            success: function(response){
              switch (response) {
                case 'user-exists':
                  $('#formSignupResponse').html('<i class="fa fa-times fa-fw"></i> Usuario existente.');
                  break;
                case 'success':
                  $('#formSignup').trigger('reset');
                  $('#formSignupResponse').html('<i class="fa fa-check fa-fw"></i> Usuario creado con éxito!');
                  break;
                case 'error':
                  $('#formSignupResponse').html('<i class="fa fa-times fa-fw"></i> Existen errores en la transacción.');
                  break;
              }
            }
          });
        }
        return false;
      });

      $('#modal-signup').on('hidden.bs.modal',function(){
         location.reload();
      });

      $('.show-password').click(function(){
        var check = $(this).find('input[type="checkbox"]');
        if (check.is(':checked')) {
          $('#modal-signup').find('input[name="cliente_password"]').attr({type:"text"});
        } else {
          $('#modal-signup').find('input[name="cliente_password"]').attr({type:"password"});
        }
      });

    });

    $('#modal-forgot-password').on('show.bs.modal',function(){
      $('#formForgotPassword').trigger('reset');
      $('#formForgotPasswordResponse').html('');
    });
    $('#modal-forgot-password').on('shown.bs.modal',function(){
      $('#formForgotPassword').validator('destroy').validator();

      $('#formForgotPassword').submit(function(e){
        if (e.isDefaultPrevented()) {
          $('#formForgotPasswordResponse').html('<i class="fa fa-times fa-fw"></i> Datos requeridos incompletos.');    
        } else {
          $.ajax({
            type: "POST",
            url: 'process/recover_password.php',
            data: $(this).serialize(),
            success: function(response){
              switch (response) {
                case 'success':
                  $('#formForgotPassword').trigger('reset');
                  $('#formForgotPasswordResponse').html('<i class="fa fa-check fa-fw"></i> Te enviamos tu contraseña a tu cuenta de e-mail.');
                  break;
                case 'error':
                  $('#formForgotPasswordResponse').html('<i class="fa fa-times fa-fw"></i> Existen errores en la transacción.');
                  break;
                default:
                  $('#formForgotPasswordResponse').html('<i class="fa fa-times fa-fw"></i> '+response);
                  break;
              }
            }
          });
        }
        return false;
      });

    });

    $('#modal-me-interesa').on('show.bs.modal',function(){
      $('#formMeInteresa').trigger('reset');
      $('#formMeInteresaResponse').html('');
    });
    $('#modal-me-interesa').on('shown.bs.modal',function(){
      $('#formMeInteresa').validator('destroy').validator();

      $('#formMeInteresa').submit(function(e){
        if (e.isDefaultPrevented()) {
          $('#formMeInteresaResponse').html('<i class="fa fa-times fa-fw"></i> Datos requeridos incompletos.');    
        } else {
          $.ajax({
            type: "POST",
            url: 'process/me-interesa.php',
            data: $(this).serialize(),
            success: function(response){
              console.log(response);
              switch (response) {
                case 'success':
                  $('#formMeInteresa').trigger('reset');
                  $('#formMeInteresaResponse').html('<i class="fa fa-check fa-fw"></i> Solicitud de información enviada con éxito!');
                  break;
                case 'error':
                  $('#formMeInteresaResponse').html('<i class="fa fa-times fa-fw"></i> Existen errores en la transacción.');
                  break;
                default:
                  $('#formMeInteresaResponse').html('<i class="fa fa-times fa-fw"></i> '+response);
                  break;
              }
            }
          });
        }
        return false;
      });

    });

    $('#modal-compartir').on('show.bs.modal',function(){
      $('#formCompartir').trigger('reset');
      $('#formCompartirResponse').html('');
    });
    $('#modal-compartir').on('shown.bs.modal',function(event){
      $('#formCompartir').validator('destroy').validator();

      var button = $(event.relatedTarget);
      var propiedad_id = button.data('propiedad_id');
      var propiedad_titulo = button.data('propiedad_titulo');

      $(this).find('.compartir-titulo').html(propiedad_titulo);

      $(this).find('.propiedad-id').val(propiedad_id);
      $(this).find('.propiedad-titulo').val(propiedad_titulo);

      $('#formCompartir').submit(function(e){
        if (e.isDefaultPrevented()) {
          $('#formCompartirResponse').html('<i class="fa fa-times fa-fw"></i> Datos requeridos incompletos.');
        } else {
          $.ajax({
            type: "POST",
            url: 'process/compartir.php',
            data: $(this).serialize(),
            success: function(response){
              switch (response) {
                case 'success':
                  $('#formCompartir').trigger('reset');
                  $('#formCompartirResponse').html('<i class="fa fa-check fa-fw"></i> Compartiste la propiedad con éxito!');
                  break;
                case 'error':
                  $('#formCompartirResponse').html('<i class="fa fa-times fa-fw"></i> Existen errores en la transacción.');
                  break;
                default:
                  $('#formCompartirResponse').html('<i class="fa fa-times fa-fw"></i> '+response);
                  break;
              }
            }
          });
        }
        return false;
      });

    });

  });

</script>