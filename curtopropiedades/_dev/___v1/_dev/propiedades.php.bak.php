<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">google.load('jquery', '1.7.1');</script>
<script type="text/javascript">google.load('jqueryui', '1.8.13');</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php 

    error_reporting(0);

    include "api.inc";

    $auth = new TokkoAuth('4fbfb1318c148749d76fa87803fcb5ed83620e7f');

    /*$example_data = '{"current_localization_id":1,"current_localization_type":"country","price_from":1,"price_to":999999999999,"operation_types":[1],
    "property_types":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],"currency":"ARS","filters":[]}';

    $search = new TokkoSearch($auth, $example_data);*/

    $search = new TokkoSearch($auth);

    $search->do_search();

    //echo "Data =>". json_encode($search->search_data);

    //print_r($search->get_properties()); die;

    /*
    
    order_by=price&
    limit=20&
    order=desc&
    page=1&
    data={
        "current_localization_id": 0,
        "current_localization_type": "country",
        "price_from": 0,
        "price_to": 999999999,
        "operation_types": [1,2,3],
        "property_types": [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25],
        "currency": "ARS",
        "filters": [
            ["room_amount",">",0],["room_amount","<",99999999]
        ]
    }

    */

?>

<section style="padding: 100px 0;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <p class="tit_prop">PROPIEDADES EN <?php echo strtoupper(implode(" / ", $search->get_search_operations()));?></p>

                <p class="sub_tit_resultados">MOSTRANDO <?php echo  $search->get_result_count();?> RESULTADOS</p>

                <p class="txt_input_ordenar">ORDENAR POR</p>
                <?php  $search->deploy_reorder_selects('reorder', ["Ordenado por", "Orden"], ['price'=>'Precio', 'room_amount'=>'Ambientes'], "campos_ordenar", [$search->get_search_order_by(),$search->get_search_order()]); ?></p>

                <p class="tit_prop">
                Pagina <?php  echo $search->get_current_page();?> de <?php  echo $search->get_result_page_count();?>
                </p>

                <p class="tit_prop">
                <?php if ($search->get_previous_page_or_null()){?><a href='<?php echo $search->get_url_for_page($search->get_previous_page_or_null());?>'><-Pagina anterior</a><?php }?> <?php if ($search->get_next_page_or_null()){?><a href='<?php echo $search->get_url_for_page($search->get_next_page_or_null());?>'>Pagina siguiente -></a><?php }?></p>

                <div id="lista_resultados">
                    <div class="row">
                        <?php  foreach ($search->get_properties() as $property){?>
                        <div class="col-sm-3">
                            <div class="data_resultados panel">
                                <?php  if($property->get_cover_picture()){ ?>
                                <img src="<?php  echo $property->get_cover_picture()->original;?>" style="width: 100%;"/>
                                <?php }?>
                                <br><br>
                                <p class="tit_prop div_ellipsis"><?php  echo strtoupper($property->get_field("type")->name);?> EN <?php  echo strtoupper($property->get_field("location")->short_location);?></p>
                                <p class="txt_res2">
                                    Codigo de Propiedad: <?php echo $property->get_field("reference_code");?><br />
                                    Precio: <?php  echo $property->get_field("web_price") ? implode(" | ",$property->get_available_operations()): "Consulte precio;"?><br/>
                                    Ambientes: <?php echo $property->get_field("room_amount");?><br/>
                                    Banos: <?php echo $property->get_field("bathroom_amount");?><br />
                                    Metros lote: <?php echo $property->get_field("surface");?> m2<br />
                                    Metros construidos: <?php echo $property->get_field("roofed_surface");?>
                                </p>
                                <small>
                                    <p class="txt_res text-muted">
                                        <?php  echo strlen($property->get_field("description")) > 1500 ? substr($property->get_field("description"),0,1500) : $property->get_field("description");?></p>
                                </small>
                                <a href="ejemplo_propiedad/<?php echo $property->get_field("id");?>-<?php echo $property->get_field("type")->name;?>_en_<?php echo implode(",", $property->get_available_operations_names());?>_en_<?php echo $property->get_field("location")->short_location;?>" class="ver_mas_res btn btn-primary">VER MAS</a>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>