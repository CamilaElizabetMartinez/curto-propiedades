<?php

    $url = 'home';

    $permit = '';

    $pathRoot = '../';

    require_once($pathRoot . 'inc/common.php');

    /*--------------------------------------------------------------*/
    // LANG:
    /*--------------------------------------------------------------*/

    if (!isset($_REQUEST['lang']) or $_REQUEST['lang']=='') {
        $lang = 'es';
    } else {
        $lang = $_REQUEST['lang'];
    }

    require_once($pathRoot.'lang/'. $lang .'/lang.php');

    if ($_SESSION['cliente_id']!='') {
        $client_fav = '
            <div class="col-md-12 col-sm-4">
                <a href="#" class="add-fav btn btn-color2-bg small full" data-propiedad-id="'. $obj->id .'">'. $t['gui']['3'] .'</a>
            </div>';
    } else {
        $client_fav = '
            <div class="col-md-12 col-sm-4">
                <a href="#" class="btn btn-color2-bg small full" data-toggle="modal" data-target="#modal-login">'. $t['gui']['3'] .'</a>
            </div>';
    }

    //error_reporting(0);

    include 'api.inc';

    $auth = new TokkoAuth('4fbfb1318c148749d76fa87803fcb5ed83620e7f');

    $search = new TokkoSearch($auth);

    $search->do_search();

    foreach ($search->get_properties() as $property) {

        $buffer .= '
            <div class="item mg-lg-b">
                <div class="row">
                    <div class="col-md-4">
                        <a href="_dev/propiedad.php?id='. $property->get_field("reference_code") .'&lang='. $lang .'">
                            <div class="item-thumb fh1 mg-lg-b" style="background:url('. $property->get_cover_picture()->thumb .') center center no-repeat;"></div>
                        </a>
                    </div>
                    <div class="col-md-5">
                        <div class="item-caption mg-lg-b fh1">
                            <a href="_dev/propiedad.php?id='. $property->get_field("reference_code") .'&lang='. $lang .'">
                                <h3 class="item-title mg-sm-b">'. $property->get_field("type")->name .' en '. $property->get_field("location")->short_location .'</h3>
                            </a>
                            <div class="item-desc"><p>'. substr(strip_tags($property->get_field("description")), 0, 300) .'...</p></div>
                            <p class="small text-muted mg-t">
                                <strong>Código:</strong> '. $property->get_field("reference_code") .'&nbsp;|&nbsp;
                                <strong>Ambientes:</strong> '. $property->get_field("room_amount") .'&nbsp;|&nbsp;
                                <strong>Baños:</strong> '. $property->get_field("bathroom_amount") .'<br>
                                <strong>Metros lote:</strong> '. $property->get_field("surface") .' m2&nbsp;|&nbsp;
                                <strong>Metros construidos:</strong> '. $property->get_field("roofed_surface") .' m2
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-12 col-sm-4">
                                <p class="price font-3 color-5 text-left mg-lg-b">'. implode('<br>', $property->get_available_operations()) .'</p>
                            </div>
                            <div class="col-md-12 col-sm-4">
                                <a href="_dev/propiedad.php?id='. $property->get_field("reference_code") .'&lang='. $lang .'" class="btn btn-color2-bg small full mg-b">'. $t['gui']['2'] .'</a>
                            </div>
                            '. $client_fav .'
                        </div>
                    </div>
                </div>
                <hr/>
            </div>';

    }

    //print_r($search->search_data); die;

    $operationType = $search->search_data['operation_types'][0];

    $propertyTypes = $search->search_data['property_types'][0];

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Propiedades | Curto Propiedades</title>

    <?php include($pathRoot.'inc/head.php'); ?>

    <?php include($pathRoot.'inc/head_seo1.php'); ?>

    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">google.load('jquery', '1.7.1');</script>
    <script type="text/javascript">google.load('jqueryui', '1.8.13');</script>

</head>
<body>
  
    <?php include($pathRoot.'inc/header.php'); ?>

    <div class="wrapper wrapper-pd-t">

        <section id="propiedades">
            <div class="pd-v-xlg">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-sm-offset-2">
                            <div class="row">
                                <div class="col-sm-4 col-md-3">
                                    <div class="sidebar mg-lg-b-xs-xs">
                                        <form id="form-propiedades-search" action="#" method="POST" enctype="multipart/form-data" data-toggle="validator" data-focus="false">
                                            <input type="hidden" name="mode" value="propiedades-search">
                                            <input type="hidden" name="lang" value="<?php echo $lang; ?>">
                                            <div class="form-group">
                                                <select id="operationType" class="form-control" required>
                                                    <option value='-1'><?php echo $t['prp']['2']; ?></option>
                                                    <option value='1'>Venta</option>
                                                    <option value='2'>Alquiler</option>
                                                    <option value='3'>Alquiler temporario</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select id="propertyTypes" class="form-control">
                                                    <option value='-1'><?php echo $t['prp']['3']; ?></option>
                                                    <option value='1' >Terreno</option>
                                                    <option value='2' >Departamento</option>
                                                    <option value='3' >Casa</option>
                                                    <option value='4' >Casa de fin de semana</option>
                                                    <option value='5' >Oficina</option>
                                                    <option value='6' >Amarradero</option>
                                                    <option value='7' >Local</option>
                                                    <option value='8' >Edficios comerciales</option>
                                                </select>
                                            </div>
                                            <input type="button" class="btn btn-color4 full" onclick="doSearch()" value="<?php echo $t['gui']['1']; ?>" />
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-8 col-md-9">
                                    <div class="mg-b">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p>Propiedades en <?php echo implode(" / ", $search->get_search_operations()); ?></p>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <p>Mostrando <?php echo  $search->get_result_count(); ?> resultados</p>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <?php  $search->deploy_reorder_selects('reorder', ["Ordenado por", "Orden"], ['price'=>'Precio', 'room_amount'=>'Ambientes'], "campos_ordenar", [$search->get_search_order_by(),$search->get_search_order()]); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo $buffer; ?>
                                    <div class="mg-lg-t">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <?php if ($search->get_previous_page_or_null()){ ?>
                                                <a class="color-3" href='<?php echo $search->get_url_for_page($search->get_previous_page_or_null());?>'>
                                                    <i class="fa fa-angle-left fa-fw"></i> Pagina anterior</a>
                                                <?php } ?> 
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <p>Pagina <?php  echo $search->get_current_page();?> de <?php  echo $search->get_result_page_count(); ?></p>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <?php if ($search->get_next_page_or_null()){ ?>
                                                <a class="color-3" href='<?php echo $search->get_url_for_page($search->get_next_page_or_null());?>'>Pagina siguiente <i class="fa fa-angle-right fa-fw"></i></a>
                                                <?php } ?>                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>

        </section>
        
    </div>

    <?php include($pathRoot.'inc/footer.php'); ?>

    <script>

        function doSearch(){
            //Init data dictionary with general parameters
            var data = {"current_localization_id":0,"current_localization_type":"country","price_from":0,"price_to":999999999,"operation_types":[1,2,3],"property_types":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],"currency":"ANY","filters":[]}
            //Set operation type value
            if( $("#operationType").val() != -1 ){
                data['operation_types'] = [$("#operationType").val()];
            }
            // Set property type value
            if( $("#propertyTypes").val() != -1 ){
                data['property_types'] = [$("#propertyTypes").val()];
            }
            // Send data by GET to properties result page
            window.location='_dev/propiedades.php?order_by=price&limit=10&order=desc&page=1&data='+JSON.stringify(data);
        }

        $(function(){

            $('#operationType').val('3');

            /*$('#operationType').val('<?php echo $operationType; ?>');

            $('#propertyTypes').val('<?php echo $propertyTypes; ?>');*/

        });

    </script>

</body>
</html>