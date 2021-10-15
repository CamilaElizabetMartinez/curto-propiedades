<?php

  $permit = 'admin';

  $pathRoot = '../';

  require_once('inc/common_admin.php');

  require_once($pathRoot . 'lib/cls/cls.propiedad.php');

  $obj = new clsPropiedad();

  if ($_REQUEST['id']!='') {
    $obj->find($_REQUEST['id']);
  }

  if ($_POST['mode']=='process') {
    
    unset($_POST['mode']);
    
    $obj = new clsPropiedad($_POST);

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
              <label class="label-control">Profit ID</label>
              <input type="text" name="profit_id" class="form-control" placeholder="Profit ID" value="<?php echo $obj->profit_id; ?>" disabled/>           
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Tipo de propiedad</label>
              <select name="tipo_propiedad" class="form-control" required>
                <option value="">Seleccionar</option>
                <?php echo ui_refchilds_combo($dbh,'2',$obj->tipo_propiedad); ?>
              </select>            
            </div>
          </div>
          <hr class="mg-b">
          <div class="row">
            <div class="form-group col-md-3">
              <label class="label-control">En venta</label>
              <select name="en_venta" class="form-control" required>
                <option value="">Seleccionar</option>
                <?php echo ui_refchilds_afirmaciones($dbh,$obj->en_venta); ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Moneda venta</label>
              <select name="moneda_venta_id" class="form-control">
                <option value="">Seleccionar</option>
                <?php echo ui_refchilds_combo($dbh,'3',$obj->moneda_venta_id); ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Precio venta</label>
              <input type="text" name="precio_venta" class="form-control" placeholder="Precio venta" value="<?php echo $obj->precio_venta; ?>"/>
            </div>
          </div>
          <hr class="mg-b">
          <div class="row">
            <div class="form-group col-md-3">
              <label class="label-control">En alquiler</label>
              <select name="en_alquiler" class="form-control" required>
                <option value="">Seleccionar</option>
                <?php echo ui_refchilds_afirmaciones($dbh,$obj->en_alquiler); ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Moneda alquiler</label>
              <select name="moneda_alquiler_id" class="form-control">
                <option value="">Seleccionar</option>
                <?php echo ui_refchilds_combo($dbh,'3',$obj->moneda_alquiler_id); ?>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Precio alquiler</label>
              <input type="text" name="precio_alquiler" class="form-control" placeholder="Precio venta" value="<?php echo $obj->precio_alquiler; ?>"/>
            </div>
          </div>
          <hr class="mg-b">
          <div class="row">
            <div class="form-group col-md-3">
              <label class="label-control">País</label>
              <input type="text" name="pais" class="form-control" placeholder="País" value="<?php echo $obj->pais; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Provincia</label>
              <input type="text" name="provincia" class="form-control" placeholder="Provincia" value="<?php echo $obj->provincia; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Localidad</label>
              <input type="text" name="localidad" class="form-control" placeholder="Localidad" value="<?php echo $obj->localidad; ?>"/>
            </div>  
            <div class="form-group col-md-3">
              <label class="label-control">Zona</label>
              <input type="text" name="zona" class="form-control" placeholder="Zona" value="<?php echo $obj->zona; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Orientación</label>
              <input type="text" name="orientacion" class="form-control" placeholder="Orientación" value="<?php echo $obj->orientacion; ?>"/>
            </div>  
            <div class="form-group col-md-3">
              <label class="label-control">Ubicación</label>
              <input type="text" name="ubicacion" class="form-control" placeholder="Ubicación" value="<?php echo $obj->ubicacion; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Latitud (geoloc.)</label>
              <input type="text" name="loc_lat" class="form-control" placeholder="Latitud (geoloc.)" value="<?php echo $obj->loc_lat; ?>"/>
            </div>  
            <div class="form-group col-md-3">
              <label class="label-control">Longitud (geoloc.)</label>
              <input type="text" name="loc_long" class="form-control" placeholder="Longitud (geoloc.)" value="<?php echo $obj->loc_long; ?>"/>
            </div>                
          </div>
          <hr class="mg-b">
          <div class="row">
            <div class="form-group col-md-3">
              <label class="label-control">Superficie cubierta</label>
              <input type="text" name="sup_cubierta" class="form-control" placeholder="Superficie cubierta" value="<?php echo $obj->sup_cubierta; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Superficie total</label>
              <input type="text" name="sup_total" class="form-control" placeholder="Superficie total" value="<?php echo $obj->sup_total; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Habitaciones (cant.)</label>
              <input type="text" name="cant_habitaciones" class="form-control" placeholder="Habitaciones (cant.)" value="<?php echo $obj->cant_habitaciones; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Baños (cant.)</label>
              <input type="text" name="cant_banos" class="form-control" placeholder="Baños (cant.)" value="<?php echo $obj->cant_banos; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Cocheras (cant.)</label>
              <input type="text" name="cant_cocheras" class="form-control" placeholder="Cocheras (cant.)" value="<?php echo $obj->cant_cocheras; ?>"/>
            </div>
            <div class="form-group col-md-3">
              <label class="label-control">Antigüedad (años)</label>
              <input type="text" name="antiguedad" class="form-control" placeholder="Antigüedad (años)" value="<?php echo $obj->antiguedad; ?>"/>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-4">
                <div class="bg bg-gl has-flag flag-ar pd-full-lg mg-lg-b">
                  <h5 class="title-xxs color-gl mg-b">Español</h5>
                  <hr class="mg-b">
                  <div class="form-group">
                    <label class="label-control">Título</label>
                    <textarea name="titulo_es" class="form-control text-large" placeholder="Título" rows="3" required><?php echo $obj->titulo_es; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="label-control">Descripción</label>
                    <textarea name="descripcion_es" class="form-control summernote" placeholder="Descripción" rows="10" required><?php echo $obj->descripcion_es; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="bg bg-gl has-flag flag-us pd-full-lg mg-lg-b">
                  <h5 class="title-xxs color-gl mg-b">Inglés</h5>
                  <hr class="mg-b">
                  <div class="form-group">
                    <label class="label-control">Título</label>
                    <textarea name="titulo_en" class="form-control text-large" placeholder="Título" rows="3" required><?php echo $obj->titulo_en; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="label-control">Descripción</label>
                    <textarea name="descripcion_en" class="form-control summernote" placeholder="Descripción" rows="10" required><?php echo $obj->descripcion_en; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="bg bg-gl has-flag flag-br pd-full-lg mg-lg-b">
                  <h5 class="title-xxs color-gl mg-b">Portugués</h5>
                  <hr class="mg-b">
                  <div class="form-group">
                    <label class="label-control">Título</label>
                    <textarea name="titulo_pt" class="form-control text-large" placeholder="Título" rows="3" required><?php echo $obj->titulo_pt; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label class="label-control">Descripción</label>
                    <textarea name="descripcion_pt" class="form-control summernote" placeholder="Descripción" rows="10" required><?php echo $obj->descripcion_pt; ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php include('inc/form_actions.php'); ?>

    </form>
    
    <?php include('inc/form_attachment.php'); ?>

  </section>

</div>

<?php include('inc/footer.php'); ?>

<script type="text/javascript">

  $(function() {

    $('#nav-main a.propiedades').addClass('active');

    $('#form').validator({ disable: false });

    $('#form-attach').validator({ disable: false });

  });

</script>

</body>
</html>