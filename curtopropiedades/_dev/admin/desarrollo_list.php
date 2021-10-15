<?php

$permit = 'admin';

$pathRoot = '../';

require_once('inc/common_admin.php');

require_once($pathRoot . 'lib/cls/cls.desarrollo.php');

$objs = $dbh->query("select * from desarrollos order by id desc");

$obj = new clsDesarrollo();

for ($i=0; $i < count($objs); $i++) { 

  $obj = new clsDesarrollo();

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
      <td class="td-sm td-center">'. $obj->id .'</td>
      <td class="td-main">
        <h4 class="title-md font-2 mg-sm-b">'. substr($obj->titulo, 0, 100) .'</h4>
        <p class="mg-sm-b">'. strip_tags($obj->descripcion_corta) .'</p>
        <small class="text-muted font-3">Creado: '. $obj->fecha_creado .' / Modificado: '. $obj->fecha_modificado .'</small>
      </td>
      <td class="td-sm td-center">'. ret_refchilds_afirmaciones($dbh,$obj->fijo) .'</td>
      <td class="td-sm td-center">'. $obj->orden .'</td>
      <td class="td-sm td-center">'. ret_refchilds_afirmaciones($dbh,$obj->activo) .'</td>
      <td class="td-md text-center">
        <div class="td-actions btn-group">
          <a href="'. $obj->_metadata['form_page'] .'?id='. $obj->id .'" class="btn" title="Editar"><i class="glyph-icon flaticon-underline-button"></i></a>
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
                <th>Es fijo?</th>
                <th>Orden</th>
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

        $('#nav-main a.desarrollos').addClass('active');

        $('.btn-save').hide();

    });

  </script>

</body>
</html>