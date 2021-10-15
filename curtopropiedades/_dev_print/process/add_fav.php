<?php

$permit = '';

$pathRoot = '../';

require_once($pathRoot . 'inc/common.php');

$cliente_id = $_REQUEST['cliente_id'];
$propiedad_id = $_REQUEST['propiedad_id'];

$count = count($dbh->query("select id from clientes_favoritos where propiedad_id=:propiedad_id and cliente_id=:cliente_id", array("propiedad_id"=>$propiedad_id, "cliente_id"=>$cliente_id)));

if ($count==0) {
	echo $dbh->query("insert into clientes_favoritos (cliente_id, propiedad_id) values (:cliente_id, :propiedad_id)", array("cliente_id"=>$cliente_id,"propiedad_id"=>$propiedad_id));
}

?>
