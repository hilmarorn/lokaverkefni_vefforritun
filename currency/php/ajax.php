<?php

include 'getCurrency.php';
$json = new getCurrency();

header('Content-Type: application/json');
print $json->getData();

?>