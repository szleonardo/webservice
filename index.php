<?php

include_once('controle.php'); 
$objControle = new Controle();

$url = '10.1.1.21/8082/U_COMSWR01.APW'; 
$objControle->getRequest($url);
?>