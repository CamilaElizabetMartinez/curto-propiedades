<?php

class TokkoWebContact
{
   var $auth = null;
   var $BASE_SEND_URL = "http://tokkobroker.com/api/v1/webcontact/?key=";
   var $data = null;

   function TokkoWebContact($auth = null, $data=array()){
       $this->auth = $auth;
       $this->data = $data;
   }

   function send(){
       $content = json_encode($this->data);
       $curl = curl_init($this->BASE_SEND_URL . $this->auth->key);
       curl_setopt($curl, CURLOPT_HEADER, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

       $json_response = curl_exec($curl);

       $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
       curl_close($curl);
       if ( $status != 201 ) {
         die($json_response);
       }

       return json_decode($json_response, true);
   }
}

class TokkoSearchForm
{
   var $auth = null;
   var $selectors=array();
   var $filters = array();

   function TokkoSearchForm($auth = null){
       $this->auth = $auth;
   }

   function get_operation_name($id){
       if ($this->auth->get_language() == 'en'){
           switch ($id) {
           case 1:
               return "Sale";
           case 2:
               return "Rent";
           case 3:
               return "Temporary Rent";
           }
       }else{
           switch ($id) {
           case 1:
               return "Venta";
           case 2:
               return "Alquiler";
           case 3:
               return "Alquiler Temporario";
           }
       }
   }

   function deploy_price_range_selection($id, $selection_text=array('', ''), $ranges=array(30000,50000,100000,150000,200000,250000,300000,350000,400000,450000,500000,1000000,2000000,3000000,4000000,5000000), $classes="", $default=null){
       $this->selectors['price_range'] = array('min'=>array(), 'max'=>array());
       $this->selectors['price_range']['min']['id'] = $id.'-min';
       $this->selectors['price_range']['max']['id'] = $id.'-max';
       echo '<SELECT id="'.$id.'-min" name="'.$id.'-min" class="'.$classes.'">';
       echo "<OPTION value='0'>". $selection_text[0]."</OPTION>";
       foreach ($ranges as $price){
           $selected = "";
           if ( $default[0] == $price){
               $selected = "selected";
           }
           echo "<OPTION value='". $price ."' ". $selected .">". number_format($price,0,',','.') ."</OPTION>";
       }
       echo '</SELECT>&nbsp;&nbsp;';
       echo '<SELECT id="'.$id.'-max" name="'.$id.'-max" class="'.$classes.'">';
       echo "<OPTION value='999999999'>". $selection_text[1]."</OPTION>";
       foreach ($ranges as $price){
           $selected = "";
           if ( $default[1] == $price){
               $selected = "selected";
           }
           echo "<OPTION value='". $price ."' ". $selected .">". number_format($price,0,',','.') ."</OPTION>";
       }
       echo '</SELECT>';

   }

   function deploy_range_filter_selection($id, $field, $selection_text=array('', ''), $ranges=array(1,2,3,4,5,6,7,8,9,10), $classes="", $default=null, $include_bounds=true){
       $this->filters[$field] = array('>'=>array(), '<'=>array());
       $this->filters[$field]['>']['id'] = $id.'-min';
       $this->filters[$field]['<']['id'] = $id.'-max';

       $modifier = $include_bounds ? 1: 0;
       echo '<SELECT id="'.$id.'-min" name="'.$id.'-min" class="'.$classes.'">';
       echo "<OPTION value='0'>". $selection_text[0]."</OPTION>";
       foreach ($ranges as $range){
           $selected = "";
           if ( $default[0] == $range){
               $selected = "selected";
           }
           echo "<OPTION value='". ($range-$modifier) ."' ". $selected .">". $range ."</OPTION>";
       }
       echo '</SELECT>&nbsp;&nbsp;';
       echo '<SELECT id="'.$id.'-max" name="'.$id.'-max" class="'.$classes.'">';
       echo "<OPTION value='99999999'>". $selection_text[1]."</OPTION>";
       foreach ($ranges as $range){
           $selected = "";
           if ( $default[1] == $range){
               $selected = "selected";
           }
           echo "<OPTION value='". ($range+$modifier) ."' ". $selected .">". $range ."</OPTION>";
       }
       echo '</SELECT>';

   }

   function deploy_currency_selection($id, $selection_text='', $availables=array("USD", "ARS"), $classes="", $default=null, $type="select", $container=null){
       $this->selectors['currency'] = array();
       $this->selectors['currency']['id'] = $id;
       $this->selectors['currency']['type'] = $type;
       switch ($type) {
       case "select":
           if ($container){echo "<".$container.">";}
           echo '<SELECT id="'.$id.'" name="'.$id.'" class="'.$classes.'">';
           echo "<OPTION value='0'>". $selection_text."</OPTION>";
           foreach ($availables as $currency){
               $selected = "";
               if ( $default == $currency){
                   $selected = "selected";
               }
               echo "<OPTION value='". $currency ."' ". $selected .">". $currency ."</OPTION>";
           }
           echo '</SELECT>';
           if ($container){echo "</".$container.">";}
           break;
       case "radiobutton":
           echo $selection_text;
           foreach ($availables as $currency){
               $selected = "";
               if ( $default == $currency){
                   $selected = "checked";
               }
               if ($container){echo "<".$container.">";}
               echo '<input type="radio" name="'.$id.'" value="'.$currency.'" '.$selected.'> ' .$currency . '&nbsp;&nbsp;';
               if ($container){echo "</".$container.">";}
           }
           break;
       }
   }

   function deploy_operation_types_selection($id, $selection_text='', $availables=array(1,2,3), $classes="", $default=null, $type="select"){
       $this->selectors['operations'] = array();
       $this->selectors['operations']['id'] = $id;
       $this->selectors['operations']['type'] = $type;
       switch ($type) {
       case "select":
           echo '<SELECT id="'.$id.'" name="'.$id.'" class="'.$classes.'">';
           echo "<OPTION value='0'>". $selection_text."</OPTION>";
           foreach ($availables as $operation){
               $selected = "";
               if ( $default == $operation){
                   $selected = "selected";
               }
               echo "<OPTION value='". $operation ."' ". $selected .">". $this->get_operation_name($operation) ."</OPTION>";
           }
           echo '</SELECT>';
           break;
       case "radiobutton":
           echo $selection_text;
           foreach ($availables as $operation){
               $selected = "";
               if ( $default == $operation){
                   $selected = "checked";
               }
               echo '<input type="radio" name="'.$id.'" value="'.$operation.'" '.$selected.'> ' .$this->get_operation_name($operation) . '&nbsp;&nbsp;';
           }
           break;
       case "checkbox":
           echo $selection_text;
           foreach ($availables as $operation){
               $selected = "";
               if (in_array($operation, $default)){
                   $selected = "checked";
               }
               echo '<input type="checkbox" id="'.$id.'" name="'.$id.'" value="'.$operation.'" '.$selected.'> ' .$this->get_operation_name($operation) . '&nbsp;&nbsp;';
           }
           break;
       }
   }

   function deploy_location_tree($id, $default_select_text, $input_id_for_type=null, $input_id_for_id=null, $starting_id=null, $starting_box='country', $depth=10, $container_type='div', $hide_childs=true, $labels=null){
       $this->selectors['location'] = array();
       $this->selectors['location']['id'] = $input_id_for_id;
       $this->selectors['location']['type'] = $input_id_for_type;

       $selects = array();
       $next_box = $starting_box;
       $_starting_id = $starting_id;
       for ($i = 1; $i <= $depth; $i++) {
           if ($i > 1 && $_starting_id){
               $_starting_id = null;
           }
           $__starting_id = null;
           if ($i == 2 && $starting_id){
               $__starting_id = $starting_id;
           }
           if ($next_box == 'country'){
               $item =  new TokkoCountries();
               $next_box = 'state';
           }else{
               if ($next_box == 'state'){
                   $item =  new TokkoStates($__starting_id);
                   $next_box = 'division';
               }else{
                   $item =  new TokkoDivisions($__starting_id);
               }
           }
           array_push($selects, $item);
       }
       for ($i = $depth-1; $i > 0; $i--){
           $selects[$i]->connect($selects[$i-1]);
       }
       $_starting_id = $starting_id;
       for ($i = 0; $i < $depth; $i++) {
           if ($i > 0 && $_starting_id){
               $_starting_id = null;
           }
           $style="";
           if (($hide_childs && $i > 0 && !$starting_id) || ($hide_childs && $i > 1 && $starting_id)){
               $style="style='display:none'";
           }
           echo "<". $container_type ." ". $style .">";
           if($labels){
               try{
                   echo '<p>'. $labels[$i].'</p>';
               }catch (Exception $e) {
                   echo '<p>'. $labels[count($labels)-1].'</p>';
               }
           }
           if($_starting_id){$if_is_starting_id=$_starting_id;}
           $selects[$i]->deploy_select_box($id.'-'.$i, $id.'-'.$i, '', $if_is_starting_id, $default_select_text);
           echo "</". $container_type .">";
       }
       if ($input_id_for_type){
           echo "<input type='hidden' id='". $input_id_for_type ."' value='". $starting_box."'>";
       }
       if ($input_id_for_id){
           if ($starting_id){
               $val = "0";
           }
           echo "<input type='hidden' id='". $input_id_for_id ."' value=". $val.">";
       }
       for ($i = $depth-1; $i > 0; $i--){
           $selects[$i]->ajax_deploy($hide_childs, $input_id_for_type, $input_id_for_id);
       }
   }
   
   function deploy_property_types_selection($id, $selection_text='', $classes="", $default=null, $type="select"){
       $this->selectors['property_type'] = array();
       $this->selectors['property_type']['id'] = $id;
       $this->selectors['property_type']['type'] = $type;

       $property_types = new TokkoPropertyTypes($this->auth);
       $property_types->deploy_selection($id, $selection_text, $classes, $default, $type);
   }

   function deploy_search_button($id, $text, $classes=""){
       $this->selectors['search_button'] = array();
       $this->selectors['search_button']['id'] = $id;
       echo '<input type="button" id="'.$id.'" class="'.$classes.'" value="'.$text.'" />';
   }
   
   function deploy_search_function($url, $order_by="price", $order="desc", $override_selectors=null, $default_values_if_zero=array('location_id'=>0, 'location_type'=>'country', 'currency'=>'ARS', 'property_types'=>"[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]", 'price_from'=>'0', 'price_to'=>"999999999", "operations"=>"[1,2,3]"), $filter_gen_function=null, $limit=20){

       if ($override_selectors){
           foreach(array_keys($override_selectors) as $override_key){
               $this->selectors[$override_key] = $override_selectors[$override_key];
           }
       }

       try{
           $search_button_selector = $this->selectors['search_button']['id'];
       }catch (Exception $e) {
           echo "Missing search button selector";
           return null;
       }

       try{
           $location_id_selector = $this->selectors['location']['id'];
       }catch (Exception $e) {
           $location_id_selector = null;
           try{
               $location_hard_id = $default_values_if_zero['location_id'];
           }catch (Exception $e) {
               echo "Must have a location id selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $location_type_selector = $this->selectors['location']['type'];
       }catch (Exception $e) {
           $location_type_selector = null;
           try{
               $location_hard_type = $default_values_if_zero['location_type'];
           }catch (Exception $e) {
               echo "Must have a location type selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $currency_selector = $this->selectors['currency']['id'];
           $currency_selector_type = $this->selectors['currency']['type'];
       }catch (Exception $e) {
           $currency_selector = null;
           try{
               $currency_hard = $default_values_if_zero['currency'];
           }catch (Exception $e) {
               echo "Must have a currrency selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $operations_selector = $this->selectors['operations']['id'];
           $operations_selector_type = $this->selectors['operations']['type'];
       }catch (Exception $e) {
           $operations_selector = null;
           try{
               $operations_hard = $default_values_if_zero['operations'];
           }catch (Exception $e) {
               echo "Must have an operations selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $property_types_selector = $this->selectors['property_type']['id'];
           $property_types_selector_type = $this->selectors['property_type']['type'];
       }catch (Exception $e) {
           $property_types_selector = null;
           try{
               $property_types_hard = $default_values_if_zero['property_types'];
           }catch (Exception $e) {
               echo "Must have a property types selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $price_from_selector = $this->selectors['price_range']['min']['id'];
       }catch (Exception $e) {
           $price_from_selector = null;
           try{
               $price_from_hard = $default_values_if_zero['price_from'];
           }catch (Exception $e) {
               echo "Must have a price_from selector or a value_if_zero defined ";
               return null;
           }
       }

       try{
           $price_to_selector = $this->selectors['price_range']['max']['id'];
       }catch (Exception $e) {
           $price_to_selector = null;
           try{
               $price_to_hard = $default_values_if_zero['price_to'];
           }catch (Exception $e) {
               echo "Must have a price_to selector or a value_if_zero defined ";
               return null;
           }
       }

       echo '<script>';
       echo '$("#'. $search_button_selector  .'").on("click", function(event) {';
       if ($location_id_selector){
           echo "current_localization_id = $('#".$location_id_selector."').val();";
       }else{
           echo "current_localization_id = '".$location_hard_id."';";
       }
       if ($location_type_selector){
           echo "current_localization_type = $('#".$location_type_selector."').val();";
       }else{
           echo "current_localization_type = '".$location_hard_type."';";
       }

       echo 'if(current_localization_id == "0"){';
       echo '    current_localization_id = "'. $default_values_if_zero['location_id'] .'";';
       echo '    current_localization_type = "'. $default_values_if_zero['location_type'] .'";';
       echo '}';

       echo 'if(current_localization_type == "division"){';       
       echo '    current_localization_id = [parseInt(current_localization_id)];';
       echo '}else{';
       echo '    current_localization_id = parseInt(current_localization_id);';
       echo '}';

       if ($currency_selector){
           if ($currency_selector_type =='select'){
               echo "currency = $('#".$currency_selector."').val();";
           }else{
               echo "currency = $(\"input[name='".$currency_selector."']:checked\").val();";
           }
       }else{
           echo "currency = '".$currency_hard."';";
       }

       echo 'if(currency == ""){';
       echo '    currency = "'. $default_values_if_zero['currency'] .'";';
       echo '}';

       if ($operations_selector){
           if ($operations_selector_type =='select'){
               echo "operations = [parseInt($('#".$operations_selector."').val())];";
           }else{
               if ($operations_selector_type =='radiobutton'){
                   echo "operations = [parseInt($(\"input[name='".$operations_selector."']:checked\").val())];";
               }else{
                   echo "operations = jQuery.map($(\"input[name='.$operations_selector.']:checked\"), function(element) { return parseInt(jQuery(element).val()); });";
               }
           }
       }else{
           echo "operations = '".$operations_hard."';";
       }

       echo 'if(operations[0] == 0 || !operations){';
       echo '    operations = '. $default_values_if_zero['operations'] .';';
       echo '}';

       if ($property_types_selector){
           if ($property_types_selector_type =='select'){
               echo "property_types = [parseInt($('#".$property_types_selector."').val())];";
           }else{
               echo "property_types = jQuery.map($(\"input[name='.$property_types_selector.']:checked\"), function(element) { return parseInt(jQuery(element).val()); });";
           }
       }else{
           echo "property_types = '".$property_types_hard."';";
       }

       echo 'if(property_types[0] == 0 || !property_types){';
       echo '    property_types = '. $default_values_if_zero['property_types'] .';';
       echo '}';

       if ($price_from_selector){
           echo "price_from = parseInt($('#".$price_from_selector."').val());";
       }else{
           echo "price_from = ".$price_from_hard.";";
       }

       echo 'if(price_from == 0){';
       echo '    price_from = '. $default_values_if_zero['price_from'] .';';
       echo '}';

       if ($price_to_selector){
           echo "price_to = parseInt($('#".$price_to_selector."').val());";
       }else{
           echo "price_to = ".$price_to_hard.";";
       }

       echo 'if(price_to == 0){';
       echo '    price_to = '. $default_values_if_zero['price_to'] .';';
       echo '}';

       echo 'filters = [];';
       foreach(array_keys($this->filters) as $field){
           foreach(array_keys($this->filters[$field]) as $op){
               echo 'filters.push(["'.$field.'", "'.$op.'", parseInt($("#'.$this->filters[$field][$op]["id"].'").val())]);';
           }
       }

       if ($filter_gen_function){
           echo "filters.push.apply(filters, ".$filter_gen_function.");";
       }

       echo "var data = {'current_localization_id': current_localization_id,";
       echo "            'current_localization_type': current_localization_type,";
       echo "            'price_from': price_from,";
       echo "            'price_to': price_to,";
       echo "            'operation_types': operations,";
       echo "            'property_types': property_types,";
       echo "            'currency': currency,";
       echo "            'filters': filters,";
       echo '};';
       echo "window.location = '". $url ."?order_by=".$order_by."&limit=".$limit."&order=".$order."&page=1&data=' + JSON.stringify(data);";
       echo '     } );';
       echo "</script>";
   }
}

class TokkoPropertyTypes
{
   var $BASE_URL = "http://tokkobroker.com/api/v1/property_type/";
   var $auth = null;
   var $property_types = array();
   
   function TokkoPropertyTypes($auth, $filter=null){
       try {
           $this->auth = $auth;
           $data = json_decode(file_get_contents($this->BASE_URL . "?lang=". $this->auth->get_language() . "&key=". $this->auth->key))->objects;
           
           if ($filter){
               foreach ($data as $property_type){
                   if (in_array($property_type->id, $filter)){
                       array_push($this->property_types, $property_type);
                   }
               }
           }else{
               $this->property_types = $data;
           }
       }catch (Exception $e) {
           $this->property_types = null;
       }
   }

   function deploy_selection($id, $selection_text='', $classes="", $default=null, $type="select"){
       switch ($type) {
       case "select":
           echo '<SELECT id="'.$id.'" name="'.$id.'" class="'.$classes.'">';
           echo "<OPTION value='0'>". $selection_text."</OPTION>";
           foreach ($this->property_types as $property_type){
               $selected = "";
               if ( $default == $property_type->id){
                   $selected = "selected";
               }
               echo "<OPTION value='". $property_type->id ."' ". $selected .">". $property_type->name ."</OPTION>";
           }
           echo '</SELECT>';
           break;
       case "checkbox":
           echo $selection_text;
           foreach ($this->property_types as $property_type){
               $selected = "";
               if (in_array($property_type->id, $default)){
                   $selected = "checked";
               }
               echo '<input type="checkbox" id="'.$id.'" name="'.$id.'" value="'.$property_type->id.'" '.$selected.'> ' .$property_type->name . '&nbsp;&nbsp;';
           }
           break;
       }
   }

}

class TokkoCountries
{
   var $BASE_URL = "http://tokkobroker.com/api/v1/countries/";
   var $countries = null;
   var $select_box_id = '';
   var $child = null;
   var $type='country';
   function TokkoCountries(){
       try {
           $this->countries = json_decode(file_get_contents($this->BASE_URL))->objects;
       }catch (Exception $e) {
           $this->countries = null;
       }
   }

   function deploy_select_box($id, $name, $classes, $default=null, $head_choice=''){
       $this->select_box_id = $id;
       echo '<SELECT id="'.$id.'" name="'.$name.'" class="'.$classes.'" >';
       echo "<OPTION value='0'>". $head_choice."</OPTION>";
       foreach ( $this->countries as $country){
           $selected = "";
           if ( $default == $country->id){
               $selected = "selected";
           }
           echo "<OPTION value='". $country->id ."' ". $selected .">". $country->name  ."</OPTION>";
       }
       echo '</SELECT>';
   }

}
 
class TokkoStates
{
   var $BASE_URL = "http://tokkobroker.com/api/v1/country/";
   var $AJAX_URL = "http://tokkobroker.com/api/v1/state/?format=jsonp&lang=es_ar&limit=100&country=";
   var $states = null;
   var $select_box_id = '';
   var $country_id = null;
   var $select_box_head_choice = '';
   var $parent = null;
   var $type="state";
   var $child = null;

   function load_states(){
       try {
           $this->states = json_decode(file_get_contents($this->BASE_URL . $this->country_id ."/"))->states;
       }catch (Exception $e) {
           $this->states = null;
       }
   }

   function TokkoStates($country_id=null){
       if ($country_id){
           $this->country_id = $country_id;
           $this->load_states();
       }
   }

   function deploy_select_box($id, $name, $classes, $default=null, $head_choice=''){
       $this->select_box_id = $id;
       $this->select_box_head_choice = $head_choice;
       if($default && !$this->states && $this->country_id){
           $this->load_states();
       }
       echo '<SELECT id="'.$id.'" name="'.$name.'" class="'.$classes.'" >';
       echo "<OPTION value='0'>". $head_choice ."</OPTION>";
       if ($this->states){
           foreach ( $this->states as $state){
               $selected = "";
               if ( $default == $state->id){
                   $selected = "selected";
               }
               echo "<OPTION value='". $state->id ."' ". $selected .">". $state->name  ."</OPTION>";
           }
       }
       echo '</SELECT>';
   }

   function connect($parent){
       $this->parent = &$parent;
       $this->parent->child = &$this;
   }

   function ajax_deploy($hide_childs=false, $input_id_for_type=null, $input_id_for_id=null){
       if ($this->parent->select_box_id){
           echo '<script>';
           echo '$("#'. $this->parent->select_box_id  .'").on("change", function(event) {';
           if ($input_id_for_id){
               echo '$("#'. $input_id_for_id . '").val($("#'. $this->parent->select_box_id . '").val());';
           }
           if ($input_id_for_type){
               echo '$("#'. $input_id_for_type . '").val("country");';
           }
           echo '    var jqxhr = $.ajax({';
           echo '        url: "'. $this->AJAX_URL .'"+$("#'. $this->parent->select_box_id . '").val(),';
           echo '        dataType: "jsonp",';
           echo '        type: "GET",';
           echo '        success:function(json){';
           echo '            states = json.objects;';
           echo '            $("#'.$this->select_box_id.'").html("");';
           echo '            $("#'.$this->select_box_id.'").append("<option selected value=\'0\'>'.$this->select_box_head_choice.'</option>");';
           echo '            for (i in states){';
           echo '                $("#'.$this->select_box_id.'").append("<option value=\'" + states[i].id + "\'>"+ states[i].name+"</option>");';
           echo '            }';
           if ($hide_childs){
               echo '        if ($("#'. $this->parent->select_box_id . '").val() != "0" && states.length > 0){$("#'.$this->select_box_id.'").parent().show();}else{$("#'.$this->select_box_id.'").parent().hide();}';
               $child = $this->child;
               while ($child){
                  echo '     $("#'.$child->select_box_id.'").parent().hide();';
                  $child = $child->child;
               }
           }
           echo '        }})';
           echo '        .fail(function(){';
           if ($hide_childs){
               $child = $this->child;
               while ($child){
                  echo '     $("#'.$child->select_box_id.'").parent().hide();';
                  $child = $child->child;
               }
           }
           echo '        })';
           echo '     } );';
           echo "</script>";
       }else{
           echo "No countries select box was deployed";
       }
   }
}

class TokkoDivisions
{
   var $BASE_URL_STATE = "http://tokkobroker.com/api/v1/state/";
   var $BASE_URL_DIVISION = "http://tokkobroker.com/api/v1/location/";
   var $AJAX_URL_STATE = "http://tokkobroker.com/api/v1/location/?format=jsonp&lang=es_ar&limit=100&state=";
   var $AJAX_URL_DIVISION = "http://tokkobroker.com/api/v1/location/?format=jsonp&lang=es_ar&limit=100&parent_division=";
   var $divisions = null;
   var $select_box_id = '';
   var $select_box_head_choice = '';
   var $parent=null;
   var $child = null;
   var $state_id = null;
   var $division_id = null;
   var $grandparent_id = null;
   var $parent_type = null;
   var $name = null;
   function load_divisions(){
       try {
           $data = json_decode(file_get_contents(($this->state_id ? $this->BASE_URL_STATE . $this->state_id : $this->BASE_URL_DIVISION . $this->division_id) ."/"));
           $this->divisions = $data->divisions;
           $this->name = $data->name;
           if ($this->state_id){
               $urlsplitted = split("/", $data->country);
           }else{
               if ($data->state){
                   $urlsplitted = split("/", $data->state);
               }else{
                   $parent_type = "division";
                   $urlsplitted = split("/", $data->parent_division);
               }
           }
           $this->grandparent_id = $urlsplitted[count($urlsplitted)-2];
       }catch (Exception $e) {
           $this->divisions = null;
       }
   }

   function TokkoDivisions($state_id=null, $division_id=null){
       if ($state_id){
           $this->state_id = $state_id;
           $this->load_divisions();
       }
       if ($division_id){
           $this->divisions_id = $divisions_id;
           $this->load_divisions();
       }
   }

   function deploy_select_box($id, $name, $classes, $default=null, $head_choice=''){
       $this->select_box_id = $id;
       $this->select_box_head_choice = $head_choice;
       echo '<SELECT id="'.$id.'" name="'.$name.'" class="'.$classes.'" >';
       echo "<OPTION value='0'>". $head_choice ."</OPTION>";
       if ($this->divisions){
           foreach ( $this->divisions as $division){
               $selected = "";
               if ( $default == $division->id){
                   $selected = "selected";
               }
               echo "<OPTION value='". $division->id ."' ". $selected .">". $division->name  ."</OPTION>";
           }
       }
       echo '</SELECT>';
   }

   function connect($parent){
       $this->parent = &$parent;
       $this->parent->child = &$this;
       if ($this->grandparent_id){
           if ($this->state_id){
               $this->parent->country_id = $this->grandparent_id;
           }else{
               if ($this->parent_type == 'division'){
                   $this->parent->division_id = $this->grandparent_id;
               }else{
                   $this->parent->state_id = $this->grandparent_id;
               }
           }
       }
   }

   function ajax_deploy($hide_childs=false, $input_id_for_type=null, $input_id_for_id=null ){
       if ($this->parent->select_box_id){
           echo '<script>';
           echo '$("#'. $this->parent->select_box_id .'").on("change", function(event) {';
           if ($input_id_for_id){
               echo '    if($("#'. $this->parent->select_box_id . '").val() == "0"){';
               if ($this->parent->parent){
               echo '        $("#'. $input_id_for_id . '").val($("#'. $this->parent->parent->select_box_id . '").val());';
               }else{
               echo '        $("#'. $input_id_for_id . '").val("0");';
               }
               echo '    }else{';
               echo '        $("#'. $input_id_for_id . '").val($("#'. $this->parent->select_box_id . '").val());';
               echo '    }';
           }
           if ($input_id_for_type){
               if ($this->parent->type){
                   echo '$("#'. $input_id_for_type . '").val("state");';
               }else{
                   echo '$("#'. $input_id_for_type . '").val("division");';
               }
           }
           echo '    var jqxhr = $.ajax({';
           echo '        url: "'. ($this->parent->type ? $this->AJAX_URL_STATE : $this->AJAX_URL_DIVISION) .'"+$("#'. $this->parent->select_box_id . '").val(),';
           echo '        dataType: "jsonp",';
           echo '        type: "GET",';
           echo '        success:function(json){';
           echo '            divisions = json.objects;';
           echo '            $("#'.$this->select_box_id.'").html("");';
           echo '            $("#'.$this->select_box_id.'").append("<option selected value=\'0\'>'.$this->select_box_head_choice.'</option>");';
           echo '            for (i in divisions){';
           echo '                $("#'.$this->select_box_id.'").append("<option value=\'" + divisions[i].id + "\'>"+ divisions[i].name+"</option>");';
           echo '            }';
           if ($hide_childs){
               echo '        if ($("#'. $this->parent->select_box_id . '").val() != "0" && divisions.length > 0){$("#'.$this->select_box_id.'").parent().show();}else{$("#'.$this->select_box_id.'").parent().hide();}';
               $child = $this->child;
               while ($child){
                  echo '     $("#'.$child->select_box_id.'").parent().hide();';
                  $child = $child->child;
               }
           }
           echo '        }})';
           echo '        .fail(function(){';
           if ($hide_childs){
               $child = $this->child;
               while ($child){
                  echo '     $("#'.$child->select_box_id.'").parent().hide();';
                  $child = $child->child;
               }
           }
           echo '        })';
           echo '   ';
           echo '     } );';
           echo "</script>";
       }else{
           echo "No state/division select box was deployed";
       }
   }
}


class TokkoDevelopmentList
{
  var $data = null;
  var $summary= null;
  var $auth;
  var $querystring_page_key = "page";
  var $default_page_limit = 20;
  var $querystring_page_limit_key = "limit";
  var $BASE_URL = "http://www.tokkobroker.com/api/v1/development/";
  var $SUMMARY_URL = "http://www.tokkobroker.com/api/v1/development/summary/";

  function TokkoDevelopmentList($auth=null, $status=null, $type=null, $custom_tags=null){
      try {
          if ($status){
              $url = $this->BASE_URL . "?format=json&construction_status=". $status ."&key=". $auth->key ."&lang=".$auth->get_language();

          }elseif($type){
              $url = $this->BASE_URL . "?format=json&type=". $type ."&key=". $auth->key ."&lang=".$auth->get_language();
          }else{
              $url = $this->BASE_URL . "?format=json&key=". $auth->key ."&lang=".$auth->get_language();
          }

          if($custom_tags){
            $url = $url."&custom_tags=".$custom_tags;
          }

          $url = $url."&limit=".$this->get_current_page_limit()."&offset=".$this->get_offset();

          $cp = curl_init();
          curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($cp, CURLOPT_URL, $url);
          curl_setopt($cp, CURLOPT_TIMEOUT, 60);
          $this->data = json_decode(curl_exec($cp));
          curl_close($cp);
          $this->auth = $auth;
      } catch (Exception $e) {
              $this->data = null;
       }
  }

  function get_result_count(){
      if ($this->data == null){
          return 0;
      }else{
          return $this->data->meta->total_count;
      }
  }


  function get_developments(){
        $developments = array();
        if ($this->data == null){
            return $developments;
        }else{
            foreach ($this->data->objects as $devel) {
                array_push($developments, new TokkoDevelopment('object', $devel));
            }
            return $developments;
        }
  }

    function get_result_page_count(){
        if ($this->data == null){
            return 0;
        }else{
            return ceil($this->data->meta->total_count/$this->data->meta->limit);
        }
    }

  function get_current_page_limit(){
      if ($_REQUEST[$this->querystring_page_limit_key]){
          return intval($_REQUEST[$this->querystring_page_limit_key]);
      }else{
          return $this->default_page_limit;
      }
  }

  function get_offset(){
    return ($this->get_current_page()-1) * $this->get_current_page_limit();
  }

  function get_current_page(){
      if ($_REQUEST[$this->querystring_page_key]){
          return intval($_REQUEST[$this->querystring_page_key]);
      }else{
          return 1;
      }
  }

  function get_previous_page_or_null(){
      return $this->get_current_page() > 1 ? $this->get_current_page()-1 : null;
  }

  function get_next_page_or_null(){
      return $this->get_current_page() < $this->get_result_page_count() ? $this->get_current_page()+1 : null;
  }

  function get_url_for_page($page){
      $url_for_page = strtok($_SERVER["REQUEST_URI"],'?')."?page=".$page."&limit=".$this->get_current_page_limit();

      if($_REQUEST['type']){
        $url_for_page = $url_for_page."&type=".$_REQUEST['type'];
      }

      if($_REQUEST['custom_tags']){
        $url_for_page = $url_for_page ."&custom_tags=".$_REQUEST['custom_tags'];
      }
      return $url_for_page;
  }

  function deploy_google_map($api_google='AIzaSyCTyr98mlkJl0GLTVc8WmBI5X0UZJshOm4', $container_id='map',$icon_url=null, $classes="", $must_deploy_js=true, $must_deploy_container=true, $infowindow_url=null, $infoowindow_method='click', $locations=null){

      if($must_deploy_js){
        echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='.$api_google.'&sensor=false"></script>';
      }

      if($must_deploy_container){
        echo '<div id="'.$container_id.'"';
        if($classes != "" && $classes != null){
          echo 'class="'.$classes.'"';
        }
        echo ' ></div>';
      }

      echo '<script>';
      echo 'var mapOptions = {';
      echo 'center: new google.maps.LatLng(-34.610, -58.44),';
      echo 'zoom: 12';
      echo '};';

      echo 'var map = new google.maps.Map(document.getElementById("'.$container_id.'"), mapOptions);';

      echo 'var markers = {};';
      echo 'var open_window = null;';
      echo 'var current_id = null;';

      echo 'var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",';
      echo 'new google.maps.Size(40, 37),';
      echo 'new google.maps.Point(0, 0),';
      echo 'new google.maps.Point(12, 35));';

      if($icon_url){
        echo 'var pinImage_red = new google.maps.MarkerImage("'.$icon_url.'",';
        echo 'new google.maps.Size(21, 34),';
        echo 'new google.maps.Point(0,0),';
        echo 'new google.maps.Point(10, 34));';
      }

      echo 'function add_new_marker(id, lat,lng){';
      echo 'var latLng = new google.maps.LatLng(lat, lng);';
      echo 'marker = new google.maps.Marker({';
        echo 'position: latLng,';
        echo 'animation: google.maps.Animation.DROP,';
        echo 'shadow: pinShadow,';
        if($icon_url){
          echo 'icon: pinImage_red,';
        }
   	echo 'map: map,';
        echo 'draggable: false,';
        echo 'visible: true';
        echo '});';

      echo 'markers[id] = {"marker": marker, "info": null};';

      if($infowindow_url){
        echo 'google.maps.event.addListener(markers[id].marker, "'.$infoowindow_method.'", function() {';
          echo 'if (open_window) { open_window.close();}';
          echo 'if (!markers[id].info) {';
          echo 'infoWindow = new google.maps.InfoWindow({';
          echo 'content:"<div style=\'width:130px; height:25px; text-align:center\' id=\'development_tooltip_"+id+"\' class=\'infowindow-main-div\'><span>Cargando...</span></div>"';
          echo '});';
          echo 'var jqxhr = $.ajax("'.$infowindow_url.'?id="+id)';
            echo '.done(function(result) {';
            echo '$("#development_tooltip_"+id).html(result);';
            echo 'markers[id]["info"] = new google.maps.InfoWindow({';
              echo 'content:"<div id=\'development_tooltip_"+id+"\' class=\'infowindow-main-div\'>"+result+"</div>"';
            echo '});';
          echo '});';
    
          echo 'markers[id]["info"] = infoWindow;';
          echo '}';
          echo 'markers[id].info.open(map,markers[id].marker);';
          echo 'open_window = markers[id].info;';
        echo '});';
      }
    echo '}';

    foreach($locations as $location){
      if($location["lat"] && $location["long"]){
        echo 'add_new_marker("'.$location["id"].'", "'.$location["lat"].'", "'.$location["long"].'");';
      }
    }
    echo '</script>';
  }

  function fill_summary(){
    $url = $this->SUMMARY_URL . "?format=json&key=". $this->auth->key ."&lang=".$this->auth->get_language();

    $cp = curl_init();
    curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cp, CURLOPT_URL, $url);
    curl_setopt($cp, CURLOPT_TIMEOUT, 60);
    $this->summary = json_decode(curl_exec($cp));
    curl_close($cp);
  }

}


class TokkoDevelopment
{
   var $data = null;
   var $BASE_URL = "http://www.tokkobroker.com/api/v1/development/";
   function TokkoDevelopment($get_type, $data, $auth=null){
       if ($get_type == 'object'){
           $this->data = $data;
       }
       try {
           if ($get_type == 'id'){
               $url = $this->BASE_URL . $data . "/?format=json&key=". $auth->key ."&lang=".$auth->get_language();

               $cp = curl_init();
               curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
               curl_setopt($cp, CURLOPT_URL, $url);
               curl_setopt($cp, CURLOPT_TIMEOUT, 60);
               $this->data = json_decode(curl_exec($cp));
               curl_close($cp);
           }
        } catch (Exception $e) {
               $this->data = null;
        }
   }

   function get_field($field){
       if ($this->data == null){
           return "No development";
       }else{
           try{
               return $this->data->$field;
           }catch (Exception $e) {
               echo "Invalid field";
           }
       }
   }

   function get_cover_picture(){
       $cover_picture = null;
       if ($this->data == null){
           echo "No development";
       }else{
           foreach ( $this->data->photos as $photo){
               if ($photo->is_front_cover){
                   $cover_picture = $photo;
               }
           }
       }
       return $cover_picture;
   }

   function get_tags_by_type($type){
       $tag_list = array();
       foreach ( $this->data->tags as $tag){
           if ($tag->type == $type){
               array_push($tag_list, $tag);
           }
       }
       return $tag_list;
   }

}

class TokkoProperty
{
   var $data = null;
   var $BASE_URL = "http://www.tokkobroker.com/api/v1/property/";
   function TokkoProperty($get_type, $data, $auth=null){
       if ($get_type == 'object'){
           $this->data = $data;
       }
       try {
           if ($get_type == 'id'){
               $url = $this->BASE_URL . $data . "/?format=json&key=". $auth->key ."&lang=".$auth->get_language(); 

               $cp = curl_init();
               curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
               curl_setopt($cp, CURLOPT_URL, $url);
               curl_setopt($cp, CURLOPT_TIMEOUT, 60);
               $this->data = json_decode(curl_exec($cp));
               curl_close($cp);
           }
           if ($get_type == 'reference_code'){
               $url = $this->BASE_URL . "?format=json&reference_code=". urlencode($data) ."&key=". $auth->key ."&lang=".$auth->get_language();

               $cp = curl_init();
               curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
               curl_setopt($cp, CURLOPT_URL, $url);
               curl_setopt($cp, CURLOPT_TIMEOUT, 60);
               $this->data = json_decode(curl_exec($cp))->objects[0];
               curl_close($cp);
           }
        } catch (Exception $e) {
               $this->data = null;
        }
   }

   function get_field($field){
       if ($this->data == null){
           return "No property";
       }else{
           try{
               return $this->data->$field;
           }catch (Exception $e) {
               echo "Invalid field";
           }
       }
   }

   function has_tag_by_id($tag_id){
       $has_tag = false;
       if ($this->data == null){
           echo "No property";
       }else{
           foreach ( $this->data->tags as $tag){
               if ($tag->id == $tag_id){
                   $has_tag = true;
                   break;
               }
           }
       }
       return $has_tag;
   }

   function get_tags_by_type($type){
       $tag_list = array();
       foreach ( $this->data->tags as $tag){
           if ($tag->type == $type){
               array_push($tag_list, $tag);
           }
       }
       return $tag_list;
   }

   function get_custom_tags(){
       $tag_list = array();
       foreach ( $this->data->custom_tags as $tag){
           array_push($tag_list, $tag);
       }
       return $tag_list;
   }

   function get_cover_picture(){
       $cover_picture = null;
       if ($this->data == null){
           echo "No property";
       }else{
           foreach ( $this->data->photos as $photo){
               if ($photo->is_front_cover){
                   $cover_picture = $photo;
               }
           }
       }
       return $cover_picture;
   }

   function get_available_operations($legally_checked=null){
       $operations = array();
       if ($this->data == null){
           echo "No property";
       }else{
           foreach ( $this->data->operations as $operation){
               if ($operation->prices){
                   $prices = array();
                   foreach ($operation->prices as $price){
                       $currency_type = "$";
                       if($price->currency == "USD"){$currency_type = 'u$s';}
                       array_push($prices, $currency_type." ".$price->price);
                   }
                   if(!$legally_checked){
                     array_push($operations, $operation->operation_type . " " . implode("/", $prices) );
                   }else{
                     if($operation->operation_type == "Venta"){
                       if($this->data->legally_checked == "Si"){
                         array_push($operations, $operation->operation_type . " " . implode("/", $prices) );
                       }
                     }else{
                       array_push($operations, $operation->operation_type . " " . implode("/", $prices));
                     }
                   }
               }
           }
       }
       return $operations;
   }

   function get_available_prices($operations=array("Sale", "Rent", "Temporary rent", "Venta", "Alquiler", "Alquiler temporario")){
       $prices = array();
       if ($this->data == null){
           echo "No property";
       }else{
           foreach ( $this->data->operations as $operation){
               if (in_array($operation->operation_type, $operations)){
                   foreach ($operation->prices as $price){
                       $currency_type = "$";
                       if($price->currency == "USD"){$currency_type = 'u$s';}
                       array_push($prices,$currency_type." ".number_format($price->price, 0, ',', '.'));
                   }
                }
           }
       }
       return $prices;
   }

   function get_available_operations_names($operations=array("Sale", "Rent", "Temporary rent", "Venta", "Alquiler", "Alquiler temporario")){ 
       $operations_ret = array();
       if ($this->data == null){
           echo "No property";
       }else{
           foreach ( $this->data->operations as $operation){
               if ($operation->prices && in_array($operation->operation_type, $operations)){
                   array_push($operations_ret, $operation->operation_type);
               }
           }
       }
       return $operations_ret;
   }

   function get_available_prices_by_operation($ope){
       $prices = array();
       if ($this->data == null){
           echo "No property";
       }else{
           foreach ( $this->data->operations as $operation){
               if($operation->operation_type == $ope){
                   foreach ($operation->prices as $price){
                       $currency_type = "$";
                       if($price->currency == "USD"){$currency_type = 'u$s';}
                       array_push($prices,$currency_type." ".number_format($price->price, 0, ',', '.'));
                   }
               }
           }
       return $prices;
       }
   }

   function get_operation($operation_type, $currency){
       $operations = array();
       if ($this->data == null){
           echo "No property";
       }else{
           foreach ( $this->data->operations as $operation){
               if ($operation->operation_type == $operation_type){
                   $prices = array();
                   foreach ($operation->prices as $price){
                       if ($price->currency == $currency){
                           array_push($prices, $price->price . " " . $price->currency);
                           break;
                       }
                   }
                   array_push($operations, $operation->operation_type . " (" . implode("/", $prices) . ")");
                   break;
               }
           }
       }
       return $operations;
   }
}

class TokkoAuth
{
    var $key=null;
    var $querystring_lang_key = "lang";
    var $default_lang = "es_ar";
    var $current_lang = "es_ar";

    function TokkoAuth($key, $lang="es_ar"){
        $this->key = $key;
        $this->default_lang = $lang;
    }

    function get_language(){
        $lang = $_REQUEST[$this->querystring_lang_key];
        if ($lang){
            $this->current_lang = $lang;
        }else{
            $this->current_lang = $this->default_lang;
        }
        return $this->current_lang;
    }
}

class TokkoSearch
{
    var $BASE_SEARCH_URL = 'http://tokkobroker.com/api/v1/property/search/?';
    var $BASE_GEO_URL = 'http://tokkobroker.com/api/v1/property/geo_data/?';
    var $BASE_BY_LOCATION_URL = 'http://tokkobroker.com/api/v1/property/by_location/?';
    var $auth = null;
    var $querystring_data_key = "data";
    var $querystring_page_key = "page";
    var $querystring_page_limit_key = "limit";
    var $default_page_limit = 20;

    var $querystring_order_key = "order";
    var $default_search_order = "desc";
    var $current_search_order = "desc";

    var $querystring_order_by_key = "order_by";
    var $default_search_order_by = "price";
    var $current_search_order_by = "price";

    var $results_format = "json";
  
    var $search_data = null;
    var $geo_data = null;
    var $search_results = null;
    var $properties_by_location = null;

    function get_geo_data(){
        if ($this->search_data == null){
            echo "No search parameters were given";
        }else{
            try {
                if ($this->geo_data){
                    return $this->geo_data->objects;
                }
                $this->geo_data = json_decode(file_get_contents($this->BASE_GEO_URL . "format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() ."&data=" . json_encode($this->search_data)));
                return $this->geo_data->objects;
            } catch (Exception $e) {
                $this->geo_data = null;
                echo "Error executing query.";
            }
        }
    }

    function get_properties_by_location(){
        if ($this->search_data == null){
            echo "No search parameters were given";
        }else{
            try {
                if ($this->properties_by_location){
                    return $this->properties_by_location->objects;
                }
                $url = $this->BASE_BY_LOCATION_URL . "format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() ."&data=" . json_encode($this->search_data);
                $cp = curl_init();
                curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($cp, CURLOPT_URL, $url);
                curl_setopt($cp, CURLOPT_TIMEOUT, 60);
                $this->properties_by_location = json_decode(curl_exec($cp));
                curl_close($cp);

                return $this->properties_by_location->objects;
            } catch (Exception $e) {
                $this->properties_by_location = null;
                echo "Error executing query.";
            }

        }
    }

    function get_total_properties_by_location(){
        if ($this->properties_by_location == null){
            return 0;
        }else{
            return $this->properties_by_location->meta->total_count;
        }
    }

    function get_operation_name($id){
        if ($this->auth->get_language() == 'en'){
            switch ($id) {
            case 1:
                return "Sale";
            case 2:
                return "Rent";
            case 3:
                return "Temporary Rent";
            }
        }else{
            switch ($id) {
            case 1:
                return "Venta";
            case 2:
                return "Alquiler";
            case 3:
                return "Alquiler Temporario";
            }
        }
    }

    function get_current_page(){
        if ($_REQUEST[$this->querystring_page_key]){
            return intval($_REQUEST[$this->querystring_page_key]);
        }else{
            return 1;
        }
    }

    function get_previous_page_or_null(){
        return $this->get_current_page() > 1 ? $this->get_current_page()-1 : null;
    }

    function get_next_page_or_null(){
        return $this->get_current_page() < $this->get_result_page_count() ? $this->get_current_page()+1 : null;
    }

    function get_url_for_page($page){
        return strtok($_SERVER["REQUEST_URI"],'?') ."?order_by=".$this->get_search_order_by()."&order=".$this->get_search_order()."&page=".$page."&limit=".$this->get_current_page_limit()."&data=".json_encode($this->search_data)."';";
    }

    function deploy_reorder_selects($id, $selection_text, $options, $classes="", $default=null){
       echo '<SELECT id="'.$id.'-by" name="'.$id.'-by" class="'.$classes.'">';
       echo "<OPTION value='0'>". $selection_text[0]."</OPTION>";
       foreach ($options as $value => $name){
           $selected = "";
           if ( $default[0] == $value){
               $selected = "selected";
           }
           echo "<OPTION value='". $value ."' ". $selected .">". $name ."</OPTION>";
       }
       echo '</SELECT>&nbsp;&nbsp;';
       echo '<SELECT id="'.$id.'" name="'.$id.'" class="'.$classes.'">';
       echo "<OPTION value='0'>". $selection_text[1]."</OPTION>";
       foreach (array('ASC', 'DESC') as $order){
           $selected = "";
           if ( strtoupper($default[1]) == $order){
               $selected = "selected";
           }
           echo "<OPTION value='". $order ."' ". $selected .">". $order ."</OPTION>";
       }
       echo '</SELECT>';

       echo '<script>';
       echo '$("#'.$id.'-by,#'.$id.'").each(function(){ $(this).on("change", function(event){ ';
       echo "window.location = '". strtok($_SERVER["REQUEST_URI"],'?') ."?order_by='+$('#".$id."-by').val()+'&order='+$('#".$id."').val()+'&page=".$this->get_current_page()."&limit=".$this->get_current_page_limit()."&data=".json_encode($this->search_data)."';";
       echo '})})';
       echo '</script>';
   }


    function get_current_page_limit(){
        if ($_REQUEST[$this->querystring_page_limit_key]){
            return intval($_REQUEST[$this->querystring_page_limit_key]);
        }else{
            return $this->default_page_limit;
        }
    }

    function get_search_offset(){
      return ($this->get_current_page()-1) * $this->get_current_page_limit();
    }


    function decode_search_data($search_data){
        return json_decode($bodytag = str_replace("\\", "", $search_data), true);
    }

    function set_search_data($search_data){
        if (gettype($search_data) == 'string'){
             try{
                $this->search_data = $this->decode_search_data($search_data);
            } catch (Exception $e) {
                $this->search_data = null;
            }
        }else{
            $this->search_data = $search_data;
        }
    }

    function get_search_order_by(){
        $order_by = $_REQUEST[$this->querystring_order_by_key];
        if ($order_by){
            $this->current_search_order_by = $order_by;
        }else{
            $this->current_search_order_by = $this->default_search_order_by;
        }
        return $this->current_search_order_by;
    }

    function get_search_operations(){
        $ops = array();
        foreach ($this->search_data['operation_types'] as $operation_type){
            array_push($ops, $this->get_operation_name($operation_type));
        }
        return $ops;
    }

    function get_search_order(){
        $order = $_REQUEST[$this->querystring_order_key];
        if ($order){
            $this->current_search_order = $order;
        }else{
            $this->current_search_order = $this->default_search_order;
        }
        return $this->current_search_order;
    }

    function TokkoSearch($auth, $search_data=null) {
        $this->auth = $auth;
        if ($search_data == null){
            try{
                $this->search_data = $this->decode_search_data($_REQUEST[$this->querystring_data_key]);
            } catch (Exception $e) {
                $this->search_data = null;
            }
        }else{
            $this->set_search_data($search_data);
        }
    }

    function do_search($limit=null, $order_by=null, $order=null){
        if ($this->search_data == null){
            echo "No search parameters were given";
        }else{
            try {
                if (!$limit){ $limit = $this->get_current_page_limit();}
                if (!$order_by){ $order_by = $this->get_search_order_by();}
                if (!$order){ $order = $this->get_search_order();}

                $url = $this->BASE_SEARCH_URL . "order_by=" . $order_by ."&order=". $order ."&format=". $this->results_format ."&key=". $this->auth->key ."&lang=". $this->auth->get_language() ."&limit=". $limit ."&offset=" . $this->get_search_offset() . "&data=" . json_encode($this->search_data);
                $cp = curl_init();
                curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($cp, CURLOPT_URL, $url);
                curl_setopt($cp, CURLOPT_TIMEOUT, 60);
                $this->search_results = json_decode(curl_exec($cp));
                curl_close($cp);
            } catch (Exception $e) {
                $this->search_results = null;
                echo "Error executing query.";
            }
        }
    }

    function get_result_page_count(){
        if ($this->search_results == null){
            return 0;
        }else{
            return ceil($this->search_results->meta->total_count/$this->search_results->meta->limit);
        }
    }

    function get_result_count(){
        if ($this->search_results == null){
            return 0;
        }else{
            return $this->search_results->meta->total_count;
        }
    }

    function get_properties(){
        $properties = array();
        if ($this->search_results == null){
            return $properties;
        }else{
            foreach ($this->search_results->objects as $prop) {
                array_push($properties, new TokkoProperty('object', $prop));
            }
            return $properties;
        }
    }

    function deploy_google_map($api_google='AIzaSyCTyr98mlkJl0GLTVc8WmBI5X0UZJshOm4', $container_id='map',$icon_url=null, $classes="", $must_deploy_js=true, $must_deploy_container=true, $infowindow_url=null, $infoowindow_method='click'){

      if($must_deploy_js){
        echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key='.$api_google.'&sensor=false"></script>';
      }

      if($must_deploy_container){
        echo '<div id="'.$container_id.'"';
        if($classes != "" && $classes != null){
          echo 'class="'.$classes.'"';
        }
        echo ' ></div>';
      }

      echo '<script>';
      echo 'var mapOptions = {';
      echo 'center: new google.maps.LatLng(-34.380, -58.71),';
      echo 'zoom: 12';
      echo '};';

      echo 'var map = new google.maps.Map(document.getElementById("'.$container_id.'"), mapOptions);';

      echo 'var markers = {};';
      echo 'var open_window = null;';
      echo 'var current_id = null;';

      echo 'var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",';
      echo 'new google.maps.Size(40, 37),';
      echo 'new google.maps.Point(0, 0),';
      echo 'new google.maps.Point(12, 35));';

      if($icon_url){
        echo 'var pinImage_red = new google.maps.MarkerImage("'.$icon_url.'",';
        echo 'new google.maps.Size(40, 37),';
        echo 'new google.maps.Point(0,0),';
        echo 'new google.maps.Point(12, 35));';
      }

      echo 'function add_new_marker(id, lat,lng){';
      echo 'var latLng = new google.maps.LatLng(lat, lng);';
      echo 'marker = new google.maps.Marker({';
        echo 'position: latLng,';
        echo 'animation: google.maps.Animation.DROP,';
        echo 'shadow: pinShadow,';
        if($icon_url){
          echo 'icon: pinImage_red,';
        }
   	echo 'map: map,';
        echo 'draggable: false,';
        echo 'visible: true';
        echo '});';

      echo 'markers[id] = {"marker": marker, "info": null};';

      if($infowindow_url){
        echo 'google.maps.event.addListener(markers[id].marker, "'.$infoowindow_method.'", function() {';
          echo 'if (open_window) { open_window.close();}';
          echo 'if (!markers[id].info) {';
          echo 'infoWindow = new google.maps.InfoWindow({';
          echo 'content:"<div style=\'width:220px;height:90px; text-align:center\' id=\'prop_tooltip_"+id+"\' class=\'infowindow-main-div\'><span>Cargando...</span></div>"';
          echo '});';
          echo 'var jqxhr = $.ajax("'.$infowindow_url.'?id="+id)';
            echo '.done(function(result) {';
            echo '$("#prop_tooltip_"+id).html(result);';
            echo 'markers[id]["info"] = new google.maps.InfoWindow({';
              echo 'content:"<div id=\'prop_tooltip_"+id+"\' class=\'infowindow-main-div\'>"+result+"</div>"';
            echo '});';
          echo '});';
    
          echo 'markers[id]["info"] = infoWindow;';
          echo '}';
          echo 'markers[id].info.open(map,markers[id].marker);';
          echo 'open_window = markers[id].info;';
        echo '});';
      }
    echo '}';

    foreach($this->get_geo_data() as $geo){
      if($geo->geo_lat && $geo->geo_long){
        echo 'add_new_marker("'.$geo->id.'", "'.$geo->geo_lat.'", "'.$geo->geo_long.'");';
      }
    }

    echo '</script>';
  }
}
?>
