<?php

  $permit = 'admin';

  $pathRoot = '../';

  require_once('inc/common_admin.php');

  require_once($pathRoot . 'lib/cls/cls.desarrollo.php');

  $obj = new clsDesarrollo();

  if ($_REQUEST['id']!='') {
    $obj->find($_REQUEST['id']);
  }

  if ($_POST['mode']=='process') {
    
    unset($_POST['mode']);
    
    $obj = new clsDesarrollo($_POST);

    if ($obj->fijo=='S') {
      $dbh->query("update desarrollos set fijo=0 where 1=1");
    }

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
        <div class="bg bg-gl pd-full-lg mg-lg-b">
          <div class="row">
            <div class="form-group col-md-3">
              <label class="label-control">Fijar?</label>
              <select name="fijo" class="form-control" required>
                <?php echo ui_refchilds_afirmaciones($dbh,$obj->fijo); ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Orden</label>
              <input type="text" name="orden" class="form-control" placeholder="4 dígitos" value="<?php echo $obj->orden; ?>"/>
            </div>
            <div class="col-md-2">
                <label class="label-control">Eliminar registro?</label>
                <a class="btn-del-desarrollo btn btn-default full" title="Eliminar" data-table="desarrollos" data-id="<?php echo $obj->id; ?>"><i class="glyph-icon flaticon-rubbish-bin-delete-button"></i> Eliminar</a>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="bg bg-gl pd-full-lg mg-lg-b">
          <div class="form-group">
            <label class="label-control">Título</label>
            <textarea name="titulo" class="form-control text-large" placeholder="Título" rows="2" required><?php echo $obj->titulo; ?></textarea>
          </div>
          <div class="form-group">
            <label class="label-control">Descripción corta</label>
            <textarea name="descripcion_corta" class="form-control" placeholder="Descripción corta" rows="2" required><?php echo $obj->descripcion_corta; ?></textarea>
          </div>
          <div class="form-group">
            <label class="label-control">Descripción</label>
            <textarea name="descripcion" class="form-control summernote" placeholder="Descripción" rows="6" required><?php echo $obj->descripcion; ?></textarea>
          </div>
        </div>
      </div>

      <div class="container">
        <h3 class="title-md mg-b">Especificaciones:</h3>
        <hr class="mg-lg-b">
      </div>

      <div class="container">
        <div class="bg bg-gl pd-full-lg mg-lg-b">
          <div class="row">
            <div class="form-group col-md-3">
              <label class="label-control">Superficie cubierta (m2)</label>
              <input type="text" name="sup_cubierta" class="form-control" placeholder="Superficie cubierta (m2)" value="<?php echo $obj->sup_cubierta; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Superficie total (m2)</label>
              <input type="text" name="sup_total" class="form-control" placeholder="Superficie total (m2)" value="<?php echo $obj->sup_total; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Habitaciones (cant.)</label>
              <input type="text" name="cant_habitaciones" class="form-control" placeholder="Habitaciones (cant.)" value="<?php echo $obj->cant_habitaciones; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Baños (cant.)</label>
              <input type="text" name="cant_banos" class="form-control" placeholder="Baños (cant.)" value="<?php echo $obj->cant_banos; ?>"/>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <h3 class="title-md mg-b">Link del desarrollo</h3>
        <hr class="mg-lg-b">
      </div>

      <div class="container">
        <div class="bg bg-gl pd-full-lg mg-lg-b">
          <div class="row">
            <div class="form-group col-md-6">
              <label class="label-control">URL</label>
              <input type="text" name="url" class="form-control" placeholder="www.dominio.com" value="<?php echo $obj->url; ?>"/>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <h3 class="title-md mg-b">Videos</h3>
        <hr class="mg-lg-b">
      </div>

      <div class="container">
        <div class="bg bg-gl pd-full-lg mg-lg-b">
          <div class="row">
            <div class="form-group col-md-6">
              <label class="label-control">Youtube</label>
              <input type="text" name="video_youtube" class="form-control" placeholder="Link completo" value="<?php echo $obj->video_youtube; ?>"/>
            </div>
            <div class="form-group col-md-6">
              <label class="label-control">Vimeo</label>
              <input type="text" name="video_vimeo" class="form-control" placeholder="Link completo" value="<?php echo $obj->video_vimeo; ?>"/>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <h3 class="title-md mg-b">Realidad virtual</h3>
        <hr class="mg-lg-b">
      </div>

      <div class="container">
        <div class="bg bg-gl pd-full-lg mg-lg-b">
          <div class="row">
            <div class="form-group col-md-4">
              <label class="label-control">URL 1</label>
              <input type="text" name="vr_url_1" class="form-control" placeholder="Link completo" value="<?php echo $obj->vr_url_1; ?>"/>
            </div>
            <div class="form-group col-md-4">
              <label class="label-control">URL 2</label>
              <input type="text" name="vr_url_2" class="form-control" placeholder="Link completo" value="<?php echo $obj->vr_url_2; ?>"/>
            </div>
            <div class="form-group col-md-4">
              <label class="label-control">URL 3</label>
              <input type="text" name="vr_url_3" class="form-control" placeholder="Link completo" value="<?php echo $obj->vr_url_3; ?>"/>
            </div>
          </div>
        </div>
      </div>

      <?php include('inc/form_actions.php'); ?>

    </form>
    
    <?php include('inc/form_attachment.php'); ?>

  </section>

  <section id="modal-desarrollo-delete-success" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times fa-lg"></i></button>
          <h4 class="modal-title title-md">Registro eliminado:</h4>
        </div>
        <div class="modal-body">
          <p class="text-center">
            <i class="fa fa-exclamation-triangle fa-fw fa-3x color-1 mg-b"></i><br>
            El registro fue eliminado con éxito.
          </p>
        </div>
      </div>
    </div>
  </section>

</div>

<?php include('inc/footer.php'); ?>

<script type="text/javascript">

  $(function() {

    $('#nav-main a.desarrollos').addClass('active');

    $('#form').validator({ disable: false });

    $('#form-attach').validator({ disable: false });

    $('#form .btn-del-desarrollo').click(function(){
      if (confirm('¿Estás seguro de eliminar este Desarrollo?')) {
        $table = $(this).data('table');
        $id = $(this).data('id');
        $.ajax({
          type: "POST",
          url: 'process/delete_record.php?table='+$table+'&id='+$id,
          data: $(this).serialize(),
          success: function(response){
            switch (response) {
              case '1':
                $('#modal-desarrollo-delete-success').modal('show');
                window.location = 'desarrollo_list.php';
                break;
              default:
                alert(response);
                break;
            }
          }
        });
      }
    });

  });

</script>

</body>
</html>