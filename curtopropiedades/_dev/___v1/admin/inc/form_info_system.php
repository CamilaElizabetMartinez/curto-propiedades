<div class="form-system bg bg-gl pd-v mg-lg-b">
  <div class="container">
    <a data-toggle="collapse" href="#form-system-collapse"><h3 class="title-xs">Información de sistema <i class="fa fa-angle-down fa-fw"></i></h3></a>
    <div id="form-system-collapse" class="collapse fade">
      <hr class="mg-lg-b mg-t">
      <div class="row">
        <div class="form-group col-md-3">
          <label class="label-control">ID</label>
          <input type="text" name="id" class="form-control" placeholder="ID" value="<?php echo $obj->id; ?>" disabled/>
        </div>
        <div class="form-group col-md-3">
          <label class="label-control">Creado</label>
          <input type="text" name="fecha_creado" class="form-control" placeholder="Creado" value="<?php echo $obj->fecha_creado; ?>" disabled/>
        </div>
        <div class="form-group col-md-3">
          <label class="label-control">Modificado</label>
          <input type="text" name="fecha_modificado" class="form-control" placeholder="Modificado" value="<?php echo $obj->fecha_modificado; ?>" disabled/>
        </div>  
        <div class="form-group col-md-3">
          <label class="label-control">Activo?</label>
          <select name="activo" class="form-control" required>
            <?php echo ui_refchilds_afirmaciones($dbh,$obj->activo); ?>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>