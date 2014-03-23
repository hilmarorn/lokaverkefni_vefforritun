<?php

include 'getEarth.php';
$json = new getEarth();

header('Content-Type: application/json');
print $json->getData();

?>