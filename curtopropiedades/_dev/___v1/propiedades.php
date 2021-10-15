<?php

    $url = 'propiedades';

    $permit = '';

    $pathRoot = '';

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

    /*--------------------------------------------------------------*/
    // SEARCH:
    /*--------------------------------------------------------------*/

    $count = 0;

    $data = '{"current_localization_id":1,"current_localization_type":"country","price_from":1,"price_to":999999999999,"operation_types":['. $_REQUEST['operation_types'] .'],"property_types":['. $_REQUEST['property_types'] .'],"currency":"USD","filters":[]}';

    $search = new TokkoSearch($auth, $data);

    $search->do_search();

    foreach ($search->get_properties() as $property) {

        $buffer .= '
            <div class="item mg-lg-b">
                <div class="row">
                    <div class="col-md-4">
                        <a href="propiedad.php?id='. $property->get_field("reference_code") .'&lang='. $lang .'">
                            <div class="item-thumb fh1 mg-lg-b" style="background:url('. $property->get_cover_picture()->thumb .') center center no-repeat;"></div>
                        </a>
                    </div>
                    <div class="col-md-5">
                        <div class="item-caption mg-lg-b fh1">
                            <a href="propiedad.php?id='. $property->get_field("reference_code") .'&lang='. $lang .'">
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
                                <a href="propiedad.php?id='. $property->get_field("reference_code") .'&lang='. $lang .'" class="btn btn-color2-bg small full mg-b">'. $t['gui']['2'] .'</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
            </div>';

        $count++;

    }

    $operationType = $search->search_data['operation_types'][0];

    $propertyTypes = $search->search_data['property_types'][0];

?>
<!DOCTYPE html>
<html lang="es">
 <head>
    <title>Propiedades | Curto Propiedades</title>

    <?php include($pathRoot.'inc/head.php'); ?>

    <?php include($pathRoot.'inc/head_seo1.php'); ?>

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
                                                    <option value=""><?php echo $t['prp']['2']; ?></option>
                                                    <option value="1">Venta</option>
                                                    <option value="2">Alquiler</option>
                                                    <option value="3">Alquiler temporario</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select id="propertyTypes" class="form-control" required>
                                                    <option value=""><?php echo $t['prp']['3']; ?></option>
                                                    <option value="1" >Terreno</option>
                                                    <option value="2" >Departamento</option>
                                                    <option value="3" >Casa</option>
                                                    <option value="4" >Casa de fin de semana</option>
                                                    <option value="5" >Oficina</option>
                                                    <option value="6" >Amarradero</option>
                                                    <option value="7" >Local</option>
                                                    <option value="8" >Edficios comerciales</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-secondary full">
                                                <i class="fa fa-search fa-fw fa-lg"></i> <?php echo $t['gui']['1']; ?>
                                            </button>
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
                                                <p>Mostrando <?php echo  $search->get_result_count(); ?> resultado/s</p>
                                            </div>
                                            <!--<div class="col-sm-4 text-right">
                                                <?php  //$search->deploy_reorder_selects('reorder', ["Ordenado por", "Orden"], ['price'=>'Precio', 'room_amount'=>'Ambientes'], "campos_ordenar", [$search->get_search_order_by(),$search->get_search_order()]); ?>
                                            </div>-->
                                        </div>
                                    </div>

                                    <?php if($count>0) { echo $buffer; } else { ?>

                                    <div class="pd-v-xlg">
                                        <p class="title-sm text-center">
                                            <i class="fa fa-exclamation-triangle fa-fw fa-4x mg-b color-2"></i><br>
                                            No existen propiedades <br>para la búsqueda realizada.
                                        </p>
                                    </div>

                                    <?php } ?>

                                    <?php if($count>0) { ?>
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
                                    <?php } ?>

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

            if( $("#operationType").val()!=''){
                operation_types = $("#operationType").val();
            } else {
                operation_types = '1,2,3';
            }

            if( $("#propertyTypes").val()!=''){
                property_types = $("#propertyTypes").val();
            } else {
                property_types = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25';
            }

            window.location='propiedades.php?order_by=price&limit=6&order=desc&page=1&operation_types='+operation_types+'&property_types='+property_types;
        }

        $(function(){

            $('#form-propiedades-search').validator().on('submit', function(e){
                if (e.isDefaultPrevented()) {
                } else {
                    doSearch();
                }
                return false;
            });

            $('#operationType').val('<?php echo $operationType; ?>');

            $('#propertyTypes').val('<?php echo $propertyTypes; ?>');

        });

    </script>

</body>
</html>