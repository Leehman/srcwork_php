<?php

include "apache_log_parser.php";

$data = new apache_log_parser($d->path.'/'."access.log"); // Create an apache log parser
$data->filters = array(
	'path' => array('regex' => '/^.*\.(FLV|flv)$/') //pull only flv files
);
 
$data = $data->getData();
?>