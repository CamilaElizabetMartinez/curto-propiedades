<div class="admin-form-actions">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4">
        <ul class="nav nav-justified">
          <li><a class="btn btn-default" href="<?php echo $obj->_metadata['list_page']; ?>" title="Listado"><i class="glyph-icon flaticon-view-list-button"></i></a></li>
          <li><a class="btn btn-default" href="<?php echo $obj->_metadata['form_page']; ?>" title="Nuevo"><i class="glyph-icon flaticon-add-plus-button"></i></a></li>
          <li><a class="btn-export btn btn-default hidden" href="<?php echo $obj->_metadata['list_page']; ?>?action=export" title="Exportar a CSV"><i class="glyph-icon flaticon-download-button"></i></a></li>
          <!--<li><a class="btn btn-default" href="<?php //echo $obj->_metadata['title']; ?>" title="Eliminar"><i class="glyph-icon flaticon-rubbish-bin-delete-button"></i></a></li>
          <li><a class="btn btn-default" href="<?php //echo $obj->_metadata['title']; ?>" title="Exportar"><i class="glyph-icon flaticon-download-button"></i></a></li>-->
        </ul>
      </div>
      <div class="col-sm-6 col-md-3 col-md-offset-5">
        <ul id="record-actions" class="nav nav-justified">
          <li><button type="submit" class="btn-save btn btn-primary full" title="Guardar">Guardar</button></li>
          <!--<li><button type="submit" class="btn btn-default full" title="Previsualizar">Previsualizar</button></li>
          <li><button type="button" class="btn btn-default full" title="Cancelar">Cancelar</button></li>-->
        </ul>
      </div>
    </div>
  </div>
</div>