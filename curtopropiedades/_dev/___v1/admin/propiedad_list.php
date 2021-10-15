<?php

$permit = 'admin';

$pathRoot = '../';

require_once('inc/common_admin.php');

require_once($pathRoot . 'lib/cls/cls.propiedad.php');

$objs = $dbh->query("select * from propiedades order by id desc");

$obj = new clsPropiedad();

for ($i=0; $i < count($objs); $i++) { 

  $obj = new clsPropiedad();

  $obj->find($objs[$i]['id']);

  if($obj->activo!='S') {
    $status = '
      <a class="btn btn-set-on" title="Activar" data-table="'. $obj->_table .'" data-id="'. $obj->id .'">
        <i class="glyph-icon flaticon-filled-circle color-gl"></i>
      </a>';
  } else {
    $status = '
      <a class="btn btn-set-off" title="Desactivar" data-table="'. $obj->_table .'" data-id="'. $obj->id .'">
        <i class="glyph-icon flaticon-filled-circle color-gd"></i>
      </a>';

  }

  $buffer .= '
    <tr>
      <td class="td-sm td-center">
        <label class="block control checkbox">
          <input type="checkbox"/>
          <span class="control-indicator"></span>
        </label>
      </td>
      <td class="td-sm td-center">'. $objs[$i]['id'] .'</td>
      <td class="td-main">
        <h4 class="title-md font-2 mg-sm-b">'. substr($objs[$i]['titulo_es'], 0, 100) .'</h4>
        <p class="mg-sm-b">'. substr(strip_tags($objs[$i]['descripcion_es']), 0, 100) .'</p>
        <small class="text-muted font-3">Creado: '. $objs[$i]['fecha_creado'] .' / Modificado: '. $objs[$i]['fecha_modificado'] .'</small>
      </td>
      <td class="td-md td-center">'. ret_refchilds_name($dbh, $objs[$i]['tipo_propiedad']) .'</td>
      <td class="td-sm td-center">'. ret_refchilds_afirmaciones($dbh, $objs[$i]['en_venta']) .'</td>
      <td class="td-sm td-center">'. ret_refchilds_afirmaciones($dbh, $objs[$i]['en_alquiler']) .'</td>
      <td class="td-sm td-center">'. ret_refchilds_afirmaciones($dbh, $objs[$i]['activo']) .'</td>
      <td class="td-md text-center">
        <div class="td-actions btn-group">
          <a href="'. $obj->_metadata['form_page'] .'?id='. $objs[$i]['id'] .'" class="btn" title="Editar"><i class="glyph-icon flaticon-underline-button"></i></a>
          '. $status .'
        </div>
      </td>
    </tr>';
}

?>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $obj->_metadata['title']; ?> | Administrador</title>
    <?php include('inc/head.php'); ?>
</head>
<body>
  
  <?php include('inc/header.php'); ?>

  <div class="wrapper">

  	<section class="admin-list">

      <?php include('inc/form_actions.php'); ?>
		
  		<div class="container">
        <h2 class="title-lg mg-b mg-lg-t">Listado: <?php echo $obj->_metadata['title']; ?></h2>
        <hr class="mg-lg-b">
        <div class="table-responsive mg-xlg-b">
          <table id="table" class="table">
            <thead>
              <tr>
                <th><i class="fa fa-check fa-fw"></i></th>
                <th>ID</th>
                <th>Titulo</th>
                <th>Propiedad</th>
                <th>Venta?</th>
                <th>Alquiler?</th>
                <th class="td-sm">Activo?</th>
                <th class="td-md">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php echo $buffer; ?>
            </tbody>
          </table>
        </div>
  		</div>

  	</section>
    
  </div>

  <?php include('inc/footer.php'); ?>

  <script type="text/javascript">

    $(function() {

        $('#nav-main a.propiedades').addClass('active');

        $('.btn-save').hide();

    });

  </script>

</body>
</html>