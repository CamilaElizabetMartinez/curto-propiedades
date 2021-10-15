<?php

  $permit = 'admin';

  $pathRoot = '../';

  require_once('inc/common_admin.php');

  require_once($pathRoot . 'lib/cls/cls.planes.php');

  $obj = new clsPlanes();

  if ($_REQUEST['id']!='') {
    $obj->find($_REQUEST['id']);
  }

  if ($_POST['mode']=='process') {
    
    unset($_POST['mode']);
 
    $obj = new clsPlanes($_POST);

    if($_POST['id']=='') {
      $obj->activo = 'S';
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
        <div class="row">
          <div class="col-md-4">
            <div class="bg bg-gl pd-full-lg mg-lg-b">
              <h3 class="title-lg mg-b mg-lg-t">Full time</h3>
              <hr class="mg-lg-b">
              <div class="form-group">
                <label class="label-control">Título</label>
                <textarea name="titulo_fulltime" class="form-control text-large" placeholder="Título" rows="2" required><?php echo $obj->titulo_fulltime; ?></textarea>
              </div>
              <div class="form-group">
                <label class="label-control">Descripción</label>
                <textarea name="desc_fulltime" class="form-control" placeholder="Descripción" rows="2" required><?php echo $obj->desc_fulltime; ?></textarea>
              </div>
              <h3 class="title-md mg-b mg-lg-t">Valores</h3>
              <hr class="mg-lg-b">
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label class="label-control">Mensual</label>
                    <input type="number" name="valor_mensual_fulltime" class="form-control" placeholder="Mensual" value="<?php echo $obj->valor_mensual_fulltime; ?>" required>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label class="label-control">Quincenal</label>
                    <input type="number" name="valor_quincenal_fulltime" class="form-control" placeholder="Quincenal" value="<?php echo $obj->valor_quincenal_fulltime; ?>" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg bg-gl pd-full-lg mg-lg-b">
              <h3 class="title-lg mg-b mg-lg-t">Part time</h3>
              <hr class="mg-lg-b">
              <div class="form-group">
                <label class="label-control">Título</label>
                <textarea name="titulo_partime" class="form-control text-large" placeholder="Título" rows="2" required><?php echo $obj->titulo_partime; ?></textarea>
              </div>
              <div class="form-group">
                <label class="label-control">Descripción</label>
                <textarea name="desc_partime" class="form-control" placeholder="Descripción" rows="2" required><?php echo $obj->desc_partime; ?></textarea>
              </div>
              <h3 class="title-md mg-b mg-lg-t">Valores</h3>
              <hr class="mg-lg-b">
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label class="label-control">Mensual</label>
                    <input type="number" name="valor_mensual_partime" class="form-control" placeholder="Mensual" value="<?php echo $obj->valor_mensual_partime; ?>" required>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="form-group">
                    <label class="label-control">Quincenal</label>
                    <input type="number" name="valor_quincenal_partime" class="form-control" placeholder="Quincenal" value="<?php echo $obj->valor_quincenal_partime; ?>" required>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="bg bg-gl pd-full-lg mg-lg-b">
              <h3 class="title-lg mg-b mg-lg-t">Sala de reuniones</h3>
              <hr class="mg-lg-b">
              <div class="form-group">
                <label class="label-control">Título</label>
                <textarea name="titulo_sala" class="form-control text-large" placeholder="Título" rows="2" required><?php echo $obj->titulo_sala; ?></textarea>
              </div>
              <div class="form-group">
                <label class="label-control">Descripción</label>
                <textarea name="desc_sala" class="form-control" placeholder="Descripción" rows="2" required><?php echo $obj->desc_sala; ?></textarea>
              </div>
              <h3 class="title-md mg-b mg-lg-t">Valores</h3>
              <hr class="mg-lg-b">
              <div class="row">
                <div class="col-xs-6">
                  <div class="form-group">
                    <label class="label-control">Hora</label>
                    <input type="number" name="valor_hora_sala" class="form-control" placeholder="Hora" value="<?php echo $obj->valor_hora_sala; ?>" required>
                  </div>
                </div>
              </div>
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

    $('#nav-main a.planes').addClass('active');

    $('#form').validator({ disable: false });

  });

</script>

</body>
</html>