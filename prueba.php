<?php

include("class.oracle.php");


$cupon = $cms_oracle->getCupon(Array('rut' => '16241992','dv' => '7'));

print_r($cupon);


?>