<?php

  // dir:

  $table_name = $obj->_table;
  $attach_path = $pathRoot .'images/'. $table_name .'/';
  $target_dir = $attach_path;

  if ($_POST['mode']=='process-attach') {

      // filename:

      $key = md5(microtime().rand());

      $filename = trim(addslashes($_FILES["file_to_upload"]["name"]));
      $filename = str_replace(' ', '_', $filename);
      
      $target_file = $target_dir . $_POST['ref_id'] .'_'. $_POST['ref_attach_id'] .'_'. $key .'_'. basename($filename);
      
      $target_file_name = $_POST['ref_id'] .'_'. $_POST['ref_attach_id'] .'_'. $key .'_'. basename($filename);

      //$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);

      $uploadOk = 1;

      // check:

      if (file_exists($target_file)) {
          $msg .= "El archivo con ese nombre ya existe.<br>";
          $uploadOk = 0;
      }

      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          $msg .= "Solo JPG, JPEG, PNG y GIF son los formatos permitidos.<br>";
          $uploadOk = 0;
      }

      if ($uploadOk == 0) {
          $msg .= "<strong>Error:</strong> El archivo no fue asignado.";
      } else {
          if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
              /*assign_attachment($dbh, $_POST['ref_id'], $_POST['ref_table'], $_POST['ref_attach_id'], basename($_FILES["file_to_upload"]["name"]));*/
              assign_attachment($dbh, $_POST['ref_id'], $_POST['ref_table'], $_POST['ref_attach_id'], $target_file_name);
          } else {
              $msg .= "<strong>Error:</strong> El archivo no fue asignado.";
          }
      }
  }

?>

<div class="form-attachment pd-v-lg bg bg-gl">
  <div class="container">
  <?php if ($obj->id!='') { ?>
  <form id="form-attach" action="#" method="POST" enctype="multipart/form-data" data-toggle="validator">
    <input type="hidden" name="mode" value="process-attach">
    <input type="hidden" name="ref_id" value="<?php echo $obj->id; ?>">
    <input type="hidden" name="ref_table" value="<?php echo $obj->_table; ?>">
    <h3 class="title-md mg-b"><i class="fa fa-paperclip fa-fw fa-lg"></i> Recursos:</h3>
    <hr class="mg-b">
    <p class="mg-lg-b">Formatos aceptados <strong>.jpg, .png, .jpeg, .gif</strong>, de hasta <strong>2MB</strong>.</p>

    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <select name="ref_attach_id" class="form-control" required>
            <option value="">Tipo de archivo</option>
            <?php echo ui_attachrefs_combo($dbh, $obj->_table); ?>
          </select>            
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label class="file">
            <input type="file" id="file-to-upload" name="file_to_upload" required/>
            <span class="file-custom" data-content="Seleccionar archivo"></span>
          </label>          
        </div>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary full" title="Subir archivo"><i class="fa glyph-icon flaticon-upload-button fa-lg"></i></button>
      </div>
    </div>
    <h3 class="title-xs mg-b mg-t">Recursos asignados:</h3>
    <hr class="mg-b">
    <div class="table-responsive">
      <table id="table" class="table table-attach">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tipo de archivo</th>
            <th>Ubicación</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          <?php echo ret_attachments_admin_grid($dbh, $obj->id, $obj->_table,$attach_path); ?>
        </tbody>
      </table>
    </div>
  </form>
  <?php } else { ?>
  <div class="pd-v-lg text-center blink">
    <i class="glyph-icon flaticon-warning-sign title-lg"></i>
    <p class="title-xs mg-t">Para asignar recursos como imágenes o documentos es necesario guardar el registro antes</p>
  </div>
  <?php } ?>
  </div>
</div>

<script type="text/javascript">
  
  $(function(){

    <?php if ($msg!='') { ?>
    alert("<?php echo $msg; ?>");
    <?php } ?>

    $('#file-to-upload').change(function(){

      var vFilesize = (this.files[0].size/1024/1024).toFixed(0);

      if (vFilesize>2) {
        alert("El archivo que intenta subir supera el tamaño máximo de 2MB");
        $(this).val('');
        $('.file-custom').attr('data-content','Seleccionar archivo');
      } else {
        $('.file-custom').attr('data-content',$('#file-to-upload').val());
      }

    });

  });

</script>