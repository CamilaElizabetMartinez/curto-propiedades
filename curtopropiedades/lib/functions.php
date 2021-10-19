<?php 

/*----------------------------------------------------
UI:
-----------------------------------------------------*/

function ret_refchilds_name ($cnn, $id) {

  $ret = $cnn->single("select name from sys_refs_childs where id=:id", array("id"=>$id));

  return ($ret);

}

function ret_refchilds_afirmaciones ($cnn, $id) {

  $ret = $cnn->single("select name from sys_refs_afirmaciones where id=:id", array("id"=>$id));

  return ($ret);

}

function ret_refchilds_tipo_propiedad ($cnn, $id) {

  $ret = $cnn->single("select name from sys_refs_tipo_propiedad where id=:id", array("id"=>$id));

  return ($ret);

}


function ui_refchilds_combo ($cnn, $ref_id, $item_sel='', $use_slug=false) {
  
  $ret = $cnn->query("select * from sys_refs_childs where ref_id=:ref_id", array("ref_id"=>$ref_id));
  
  $cnt = count($ret);

  if($use_slug) {
    $value_field = 'slug';
  } else {
    $value_field = 'id';
  }

  if ($cnt !=0) {
    for ($i=0; $i != $cnt; $i++) {
      $buffer .= "<option value='" . $ret[$i][$value_field] . "'";
      if ($ret[$i][$value_field] == $item_sel) {
        $buffer .= " selected";
      }
      $buffer .= ">" . $ret[$i]['name'] . "</option>";
    }
  }
  return($buffer);
}


function ui_refchilds_afirmaciones ($cnn, $item_sel='', $use_slug=false) {
  
  $ret = $cnn->query("select * from sys_refs_afirmaciones");
  
  $cnt = count($ret);

  if($use_slug) {
    $value_field = 'slug';
  } else {
    $value_field = 'id';
  }

  if ($cnt !=0) {
    for ($i=0; $i != $cnt; $i++) {
      $buffer .= "<option value='" . $ret[$i][$value_field] . "'";
      if ($ret[$i][$value_field] == $item_sel) {
        $buffer .= " selected";
      }
      $buffer .= ">" . $ret[$i]['name'] . "</option>";
    }
  }
  return($buffer);
}


function ui_refchilds_tipo_propiedad ($cnn, $item_sel='', $use_slug=false) {
  
  $ret = $cnn->query("select * from sys_refs_tipo_propiedad");
  
  $cnt = count($ret);

  if($use_slug) {
    $value_field = 'slug';
  } else {
    $value_field = 'id';
  }

  if ($cnt !=0) {
    for ($i=0; $i != $cnt; $i++) {
      $buffer .= "<option value='" . $ret[$i][$value_field] . "'";
      if ($ret[$i][$value_field] == $item_sel) {
        $buffer .= " selected";
      }
      $buffer .= ">" . $ret[$i]['name'] . "</option>";
    }
  }
  return($buffer);
}


function ui_attachrefs_combo ($cnn, $table_name, $item_sel='') {

  $ret = $cnn->query("select * from sys_attach_refs where table_name=:table_name", array("table_name"=>$table_name));

  $cnt = count($ret);

  if ($cnt !=0) {
    for ($i=0; $i != $cnt; $i++) {
      $buffer .= "<option value='" . $ret[$i]['id'] . "'";
      if ($ret[$i]['id'] == $item_sel) {
        $buffer .= " selected";
      }
      $buffer .= ">" . $ret[$i]['name'] . "</option>";
    }
  }
  return($buffer);
}

/*----------------------------------------------------
UI: Attachments
-----------------------------------------------------*/

function ret_attach_refs_name ($cnn, $id) {
  $ret = $cnn->single("select name from sys_attach_refs where id=:id", array("id"=>$id));
  return ($ret);
}


function ret_attachments_admin_grid($cnn, $ref_id, $ref_table, $root_folder) {
  $tmpl_ui_attach = '
    <tr id="item-[[ID]]">
      <td class="text-center">[[ID]]</td>
      <td class="text-center">[[REF_ATTACH_ID]]</td>
      <td class="text-center"><a href="[[FILE]]" class="color-1" target="_blank">[[FILE]] <i class="fa fa-external-link fa-fw"></i></a></td>
      <td class="td-md text-center">
        <div class="td-actions btn-group">
          <a class="btn btn-del-attach" title="Eliminar" data-table="[[RECORD_TABLE]]" data-id="[[RECORD_ID]]"><i class="glyph-icon flaticon-rubbish-bin-delete-button"></i></a>
        </div>
      </td>
    </tr>';

    $ret = $cnn->query("select * from sys_attach where activo='S' and ref_table=:ref_table and ref_id=:ref_id", array("ref_table"=>$ref_table, "ref_id"=>$ref_id));
    $cnt = count($ret);

    if ($cnt !=0) {
      for ($i=0; $i != $cnt; $i++) {
        $buffer .= str_replace(
          array(
            '[[ID]]',
            '[[REF_ATTACH_ID]]',
            '[[FILE]]',
            '[[RECORD_TABLE]]',
            '[[RECORD_ID]]'),
          array(
            $ret[$i]['id'],
            ret_attach_refs_name($cnn,$ret[$i]['ref_attach_id']),
            $root_folder . $ret[$i]['file'],
            'sys_attach',
            $ret[$i]['id']),
          $tmpl_ui_attach);
      }
    }
    return($buffer);
}


function ret_attachment_by_id($cnn, $ref_id, $ref_attach_id) {
  $ret = $cnn->single("select file from sys_attach where activo='S' and ref_id=:ref_id and ref_attach_id=:ref_attach_id  limit 1", array("ref_id"=>$ref_id, "ref_attach_id"=>$ref_attach_id));
  //return 'admin/'. $ret;
  return $ret;
}


function ret_attachment_array_by_id($cnn, $ref_id, $ref_attach_id) {
  $ret = $cnn->query("select distinct(file) from sys_attach where activo='S' and ref_id=:ref_id and ref_attach_id=:ref_attach_id ", array("ref_id"=>$ref_id, "ref_attach_id"=>$ref_attach_id));
  return $ret;
}


function assign_attachment($cnn, $ref_id, $ref_table, $ref_attach_id, $file) {
  $arr_values = array("ref_id"=>$ref_id, "ref_table"=>$ref_table, "ref_attach_id"=>$ref_attach_id, "file"=>$file, "activo"=>'S');
  return $cnn->query("insert into sys_attach(ref_id, ref_table, ref_attach_id, file, activo) values(:ref_id, :ref_table, :ref_attach_id, :file, :activo)",  $arr_values);
}

/*----------------------------------------------------
DESARROLLO
-----------------------------------------------------*/

function print_r_html($r) {
  echo ('<font size="2">');
  foreach ($r as $key => $val) {
    if (is_array($val)) {
      echo "[$key] = An Array:<BLOCKQUOTE>";
      print_r_html($val);
      echo "</BLOCKQUOTE></P>";
    } else {
      echo "[$key] = '$val'<BR>";
    }
  }
  echo ('</font>');
}

/*----------------------------------------------------
URL
-----------------------------------------------------*/

function friendlyUrl($str='', $charset='ISO-8859-1') {
  $friendlyURL = htmlentities($str, ENT_COMPAT, $charset, false);
  $friendlyURL = preg_replace('/&([a-z]{1,2})(?:acute|lig|grave|ring|tilde|uml|cedil|caron);/i','\1',$friendlyURL);
  $friendlyURL = html_entity_decode($friendlyURL,ENT_COMPAT, $charset); 
  $friendlyURL = preg_replace('/[^a-z0-9-]+/i', '-', $friendlyURL);
  $friendlyURL = preg_replace('/-+/', '-', $friendlyURL);
  $friendlyURL = trim($friendlyURL, '-');
  $friendlyURL = strtolower($friendlyURL);
  return $friendlyURL;
}

/*----------------------------------------------------
VIDEO YOUTUBE / VIMEO
-----------------------------------------------------*/

function get_youtube_id_from_url($url) {
  $url_string = parse_url($url, PHP_URL_QUERY);
  parse_str($url_string, $args);
  return isset($args['v']) ? $args['v'] : false;
}

function get_vimeo_id_from_url($url) {
        $regs = array();
    
        $id = '';
    
        if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
            $id = $regs[3];
        }
    
        return $id;
}

?>