<?php

$permit = 'admin';

$pathRoot = '../';

require_once('inc/common_admin.php');

require_once($pathRoot . 'lib/cls/cls.cliente.php');

$obj = new clsCliente();

if ($_REQUEST['id']!='') {
  $obj->find($_REQUEST['id']);
}

if ($_POST['mode']=='process') {
  
  unset($_POST['mode']);
  
  $obj = new clsCliente($_POST);

  if($_POST['id']=='') {
    $obj->fecha_creado = date('Y-m-d H:i:s');
    $ret = $obj->create();
    $obj->find($obj->lastCreatedId());
  } else {
    $obj->fecha_modificado = date('Y-m-d H:i:s');
    $ret = $obj->save();
    $obj->find($_POST['id']);
  }

  header('location:'. $obj->_metadata['_form_page'] .'?'. $obj->_key .'='. $obj->id);

}

?>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
  <title><?php echo $obj->_metadata['title_single']; ?> | Administrador</title>
  <?php include('inc/head.php'); ?>
</head>
<body>

<?php include('inc/header.php'); ?>

<div class="wrapper">

	<section class="admin-form">

    <form id="form" action="#" method="POST" enctype="multipart/form-data" data-toggle="validator">

      <?php include('inc/form_actions.php'); ?>
      
      <?php include('inc/form_info_system.php'); ?>

      <div class="container">
        <h2 class="title-lg mg-b">Formulario: <?php echo $obj->_metadata['title_single']; ?></h2>
        <hr class="mg-lg-b">
      </div>

      <input type="hidden" name="mode" value="process">
      <input type="hidden" name="id" value="<?php echo $obj->id; ?>">

      <div class="container">
        <div class="bg bg-gl pd-full-lg mg-lg-b">
          <div class="row">
            <div class="form-group col-md-3">
              <label class="label-control">Nombre y apellido</label>
              <input type="text" name="cliente_name" class="form-control" placeholder="Nombre y apellido" value="<?php echo $obj->cliente_name; ?>" required/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Usuario / E-mail</label>
              <input type="text" name="cliente_user" class="form-control" placeholder="Usuario / E-mail" value="<?php echo $obj->cliente_user; ?>" required/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Contraseña</label>
              <input type="text" name="cliente_password" class="form-control" placeholder="Contraseña" value="<?php echo $obj->cliente_password; ?>" required/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Suscripto</label>
              <select name="cliente_suscrip" class="form-control" required>
                <option value="">Seleccionar</option>
                <?php echo ui_refchilds_afirmaciones($dbh,$obj->cliente_suscrip); ?>
              </select>
            </div>
          </div>
        </div>
      </div>

    </form>

  </section>

</div>

<?php include('inc/footer.php'); ?>

<script type="text/javascript">

  $(function() {

    $('#nav-main a.clientes').addClass('active');

    $('#file-to-upload').change(function(){
      $('.file-custom').attr('data-content',$('#file-to-upload').val());
    });

    $('#form').validator({ disable: false });

    $('#form-attach').validator({ disable: false });

  });

</script>

</body>
</html>