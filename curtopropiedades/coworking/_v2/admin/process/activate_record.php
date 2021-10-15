<?php

$permit = 'admin';

$pathRoot = '../../';

require_once('../inc/common_admin.php');

$table = $_REQUEST['table'];
$id = $_REQUEST['id'];

echo $dbh->query("update ". $table ." set activo = 'S' where id = :id", array("id"=>$id));

?>