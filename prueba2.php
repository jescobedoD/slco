<?php
include("class.oracle.php");

$cms_oracle = new cms_oracle();
$user = $cms_oracle->consulta_cli(Array(
	'rut' => '16122704',
	'dv' => '8'
));
var_dump($user);
?>