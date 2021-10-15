<?php

$permit = '';

$pathRoot = '../';

require_once($pathRoot . 'inc/common.php');

$id = $_REQUEST['id'];

echo $dbh->query("delete from clientes_favoritos where id=:id", array("id"=>$id));

?>
