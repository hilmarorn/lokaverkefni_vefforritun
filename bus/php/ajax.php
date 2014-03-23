<?php

include 'getBus.php';
$bus = (isset($_GET['busses'])) ? $_GET['busses'] : null;
$json = new getBus($bus);

header('Content-Type: application/json');
print $json->getData();

?>