<?php

$permit = 'admin';

$pathRoot = '../';

require_once('inc/common_admin.php');

require_once($pathRoot . 'lib/cls/cls.cliente.php');

$objs = $dbh->query("select * from clientes order by id desc");

for ($i=0; $i < count($objs); $i++) { 
  
  $obj = new clsCliente();

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
        <h4 class="title-md font-2 mg-sm-b">'. substr($obj->cliente_name, 0, 100) .'</h4>
        <input type="hidden" name="cliente_user" class="cliente-user" value="'. strip_tags($obj->cliente_user) .'">
        <p class="mg-sm-b">
          '. strip_tags($obj->cliente_user) .'<br>
          <small>Subscripto: '. ret_refchilds_afirmaciones($dbh,$obj->cliente_suscrip) .'</small>
        </p>
        <small class="text-muted font-3">Creado: '. $obj->fecha_creado .' / Modificado: '. $obj->fecha_modificado .'</small>
      </td>
      <td class="td-sm td-center">'. ret_refchilds_afirmaciones($dbh,$obj->activo) .'</td>
      <td class="td-md text-center">
        <div class="td-actions btn-group">
          <a href="'. $obj->_metadata['form_page'] .'?id='. $obj->id .'" class="btn" title="Editar"><i class="glyph-icon flaticon-underline-button"></i></a>
          '. $status .'
        </div>
      </td>
    </tr>';
}

/*--------------------------------------------------------------

EXPORTAR SUSCRIPTOS A CSV:

--------------------------------------------------------------*/

if ($_REQUEST['action']=='export') {

  $objsCSV = $dbh->query("select * from clientes where cliente_suscrip='S' and activo='S' order by id desc");

  for ($i=0; $i < count($objsCSV); $i++) {

    $objCSV = new clsCliente();

    $objCSV->find($objs[$i]['id']);

    $buffer_suscrip .= $objCSV->cliente_user .', ';

  }

  $_REQUEST['action'] = '';
  
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

        <?php if ($buffer_suscrip!='') { ?>
        <div class="alert alert-dismissible bg bg-gl pd-full-lg mg-lg-b">
          <button type="button" class="btn-close-alert close" style="top: -17px;">
            <i class="flaticon-clear-button"></i>
          </button>
          <div class="form-group">
            <label class="label-control">Listado de suscriptos:</label>
            <textarea rows="10" class="suscrip-list form-control" style="resize: vertical;"><?php echo $buffer_suscrip; ?></textarea>
          </div>
          <a href="#" class="btn-copy btn btn-primary pull-right"><i class="flaticon-copy-content"></i> Copiar listado al portapapeles</a>
          <div class="clearfix"></div>
        </div>
        <?php } ?>

        <div class="table-responsive mg-xlg-b">
          <table id="table" class="table">
            <thead>
              <tr>
                <th><i class="fa fa-check fa-fw"></i></th>
                <th>ID</th>
                <th>Suscripto</th>
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

    var editor;

    $(function() {

        $('#nav-main a.clientes').addClass('active');

        $('.btn-save').hide();

        $('.btn-export').removeClass('hidden');

        $('.btn-close-alert').click(function(){
          window.location = "<?php echo $obj->_metadata['list_page']; ?>";
          return false;
        });

        $('.btn-copy').click(function(){
          copyToClipboard('.suscrip-list');
          return false;
        });

        function copyToClipboard(element) {
          var $temp = $("<input>");
          $("body").append($temp);
          $temp.val($(element).text()).select();
          document.execCommand("copy");
          $temp.remove();
          alert('Listado copiado al portapapeles con éxito!')
        }

    });

  </script>

</body>
</html>