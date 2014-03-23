<?php

include 'getFlights.php';
$json = new getFlights((isset($_GET['language']) ? $_GET['language'] : ''), (isset($_GET['type']) ? $_GET['type'] : ''));

header('Content-Type: application/json');
print $json->getData();

?>